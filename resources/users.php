<?php
    class User{
        var $name, $email, $password, $courses;
        function User($name, $email,$password){
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
        
        function addCourse($name, $credits, $grade){
            $course = new Course($name, $credits, $grade);
            print_r($this);
            if(isset($this->courses)){
                array_push($this->courses, $course);   
            }else{
                $this->courses = array($course);
            }
            print_r($this);
        }
        
        function equals($other){
            if($this->email == $other->email)
                return true;
            return false;
        }
        
    }

    class Course{
        function Course($name, $credits, $grade){
            $this->name = $name;
            $this->credits = $credits;
            $this->grade = $grade;
            $this->gpaGrade = $this->getGpaGrade();
        }
        
        function getGpaGrade(){
            switch($this->grade){      //checks if letter is valids
            case "A+":
                return 4.3;
                break;
            case "A":
                return 4.0;
                break;
            case "A-":
                return 3.7;
                break;
            case "B+":
                return 3.3;
                break;
            case "B":
                return 3.0;
                break;
            case "B-":
                return 2.7;
                break;
            case "C+":
                return 2.3;
                break;
            case "C":
                return 2.0;
                break;
            case "C-":
                return 1.7;
                break;
            case "D+":
                return 1.3;
                break;
            case "D":
                return 1.0;
                break;
            case "D-":
                return 0.7;
                break;
            case "F":
               return 0;
                break;
            default:        // If letter is not valid returns false
                return false;
            }
        }
    }

    function calculateGPA($courses){
        if(isset($courses)){
            $gpa=0;
            $credits=0;
            foreach($courses as $course){
                $gpa += ($course->gpaGrade*$course->credits);
                $credits += $course->credits;
            }
            return number_format($gpa / $credits, 2, '.', '');
        }else
            return 0.00;
    }

    function getNumCredits($courses){
        if(isset($courses)){
            $credits=0;
            foreach($courses as $course){
                $credits += $course->credits;
            }
            return $credits;
        }else
            return 0;
    }

    function getNumCourses($courses){
        if(isset($courses)){
            return count($courses);
        }else{
            return 0;   
        }
    }

?>



