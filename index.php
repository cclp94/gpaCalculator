<?php include 'resources/templates/header.php'; ?>
<section>
    <span class="centered" id="error">
        <?php
            if(isset($error)){
                echo 'Fill out all the fields';   
            }
        ?>
    </span>
    <form id="sign" class="form-sign centered-block centered-vert" method="post" action="resources/formHandler.php">
        <span id="sign-up" class="show">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" required><br />
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName"><br />
        </span>
        <label for="email">E-mail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="email" name="email"><br />
        <label for="password">Password&nbsp&nbsp</label>
        <input type="password" name="password"><br />
        <a href="#" onclick="changeSign(this)">Already have an Account? Sign in</a><br />
        <input type="hidden" name = "flag" value="signUp">
        <input type="submit" name="submit" value="Sign Up">
    </form>
</section>
<?php require 'resources/formHandler.php' ?>
<?php include 'resources/templates/footer.php'; ?>