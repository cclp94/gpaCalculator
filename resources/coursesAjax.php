<?php
    session_start();
    require 'users.php';

    //GET USER IN SESSION
    $user = unserialize($_SESSION['user']);
    $row = $_GET['row'];
    //REMOVE COURSE FROM USER
    array_splice($user->courses, $row, 1);

    //UPDATE FILE
    $file = "users.txt";
    $users = unserialize(file_get_contents($file));
    foreach($users as &$other){
        if($user->equals($other)){
            $other = $user;
        }
    }
    file_put_contents($file, serialize($users));

    //UPDATE USER IN SESSION
    $_SESSION['user'] = serialize($user);

    //GENERATE JON
    $param = array("gpa"=>calculateGPA($user->courses), "numCourses"=>getNumCourses($user->courses), "numCredits"=>getNumCredits($user->courses));
    $jsonExpression = json_encode($param);
    //SEND RESPONSE BACK
    header('Content-type: application/json');
    echo $jsonExpression;
?>