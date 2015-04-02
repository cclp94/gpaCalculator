<?php
    require 'users.php';
    $user = hasUser();
    if($user != false) {
        if($_POST['submit'] == "Sign Up"){
            //ERROR
        }else{
            if($_POST['password'] == $user->getPassword()){
                header("Location: ../home);
die();   
            }
        }
    }else{
        
    }


    function hasUser(){
        if(file_exists("users.txt"))
           $file = fopen("users.txt","r");
        else
           $file = fopen("user.tx", "w+");
        while(!feof($file)){
            $user = unserialize(fgets($file));
            if($_POST['email'] == $user->getEmail()){
                return $user;
            }
        }
        fclose($file);
        return false;
    }
?>