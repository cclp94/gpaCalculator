<?php
    session_start();
    require 'users.php';
    $file = "users.txt";
    if(file_exists($file)){
        $users = unserialize(file_get_contents($file));
         if($_POST['submit'] == "Sign Up"){
            foreach($users as $other){
                if($other->email == $_POST['email']){
                    $_SESSION['error'] = 'This E-mail already exists';
                    redirect("index");
                }
            }
            $user = new User($_POST['name'], $_POST['email'], $_POST['password']);
            $users[count($users)] = $user;
            $_SESSION['file'] = file_put_contents($file, serialize($users));
            $_SESSION['user'] = $user;
            redirect("home");
        }else{
             foreach($users as $other){
                if($other->email == $_POST['email']){
                    if($other->password == $_POST['password']){
                        $_SESSION['user'] = $other;
                        redirect("home");
                    }
                }
            }
            $_SESSION['error'] = 'This user doesn\'t exist';
            redirect("index");
        }
    }else{
         if($_POST['submit'] == "Sign Up"){
            $user = array(new User($_POST['name'], $_POST['email'], $_POST['password']));
            $_SESSION['file'] = file_put_contents("users.txt",serialize($user));
            $_SESSION['user'] = $user;
            redirect("home");
        }else{
            $_SESSION['error'] = 'This user doesn\'t exist';
            redirect("index");
        }
    }

    function redirect($target){
        header("Location: ../".$target.".php"); /* Redirect browser */
        exit();
    }

    f
?>