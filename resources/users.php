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
        }
    }
?>