<?php
    session_start();
    require 'users.php';
    $file = "users.txt";
    if(file_exists($file)){
        $users = unserialize(file_get_contents($file));
        if(isset($_GET['submit'])){
            $user = unserialize($_SESSION['user']);
            $user->addCourse($_GET['courseName'], $_GET['credits'], $_GET['grade']);
            updateUser($user);
            $_SESSION['user'] = serialize($user);
            redirect("home");
        }elseif($_POST['submit'] == "Sign Up"){
            if(hasEmail($_POST['email'])){
                $_SESSION['error'] = 'This E-mail already exists';
                redirect("index");
            }else{
                $user = new User($_POST['name'], $_POST['email'], $_POST['password']);
                addUser($user);
                $_SESSION['user'] = serialize($user);
                redirect("home");
            }
        }else{
            $user = signIn();
            if($user){
                $_SESSION['user'] = serialize($user);
                redirect("home");
            }else{
                $_SESSION['error'] = 'This user doesn\'t exist';
                redirect("index");
            }
        }
    }else{
         if($_POST['submit'] == "Sign Up"){
            $user = array(new User($_POST['name'], $_POST['email'], $_POST['password']));
            createFile($user);
            $_SESSION['user'] = serialize($user);
            redirect("home");
        }else{
            $_SESSION['error'] = 'This user doesn\'t exist';
            redirect("index");
        }
    }

    function createFile($user){
        file_put_contents("users.txt",serialize($user));
    }

    function addUser($user){
        $users[count($users)] = $user;
        $_SESSION['file'] = file_put_contents($file, serialize($users));
    }

    function hasEmail($email){
        global $users;
        foreach($users as $other){
            if($other->email = $email){
                return true;
            }
        }
        return false;
    }
    function updateUser($user){
        global $users;
        foreach($users as &$other){
            if($user->equals($other)){
                $other = $user;
            }
        }
        file_put_contents($file, serialize($users));
    }

    function signIn(){
        global $users;
        foreach($users as $other){
            if($other->email == $_POST['email']){
                if($other->password == $_POST['password']){
                  return $other;
                }
            }
        }
        return false;
    }


    function redirect($target){
        header("Location: ../".$target.".php"); /* Redirect browser */
        exit();
    }

    f
?>