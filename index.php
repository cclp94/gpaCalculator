<?php
session_start();
    if(isset($_SESSION)){
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
        }
    session_unset();
    session_destroy();
    }
?>
<?php include 'resources/templates/header.php'; ?>
<section class="centered">
    <span id="error">
        <?php
            if(isset($error)){
                echo $error;   
            }
        ?>
    </span>
    <form id="sign" class="form-sign centered-block centered-vert" method="post" action="resources/formHandler.php">
        <span id="sign-up" class="show">
            <label for="firstName">Full Name</label>
            <input type="text" name="name" id="name" required><br />
        </span>
        <label for="email">E-mail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="email" name="email" required><br />
        <label for="password">Password&nbsp</label>
        <input type="password" name="password" required><br />
        <a href="#" id="changeSignLink" onclick="changeSign(this)">Already have an Account? Sign in</a><br />
        <input type="hidden" name = "flag" value="signUp">
        <input type="submit" name="submit" value="Sign Up">
    </form>
</section>
<?php
    if(isset($_COOKIE['hasAccount'])){
        echo '<script> changeSign(document.getElementById("changeSignLink")); </script>';   
    }
?>
</body>
</html>