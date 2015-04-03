<!DOCTYPE html>
<html>
    <head>
        <title>GPA Calculator</title>
        <meta charset="utf-8">
        <meta name="author" content="Caio Paiva">
        <meta name="description" content="GPA calculator for Concordia students">
        <meta name="keywords" content="Concordia University, GPA Calculator, GPA">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/script.js"></script>
    </head>
    <body lang="en">
        <header class="centered">
            <img class="logo" alt="GPA Calculator" src="assets/img/logo.png">
            <?php
                if(isset($_SESSION['user'])){
            ?>
                    <a class="float-right sign-out" href="index.php">Sign out</a>       
        <?php  }
            ?>
        </header>