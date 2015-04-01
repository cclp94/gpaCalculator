<?php include(header.php); ?>
    <form id="sign" class="form-sign centered centered-vert" method="post" action="formHandler.php">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" required>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName">
        <label for="email">E-mail</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <a href="#" id="signin">Already have an Account? Sign in</a>
        <input type="submit" value="Sign up">
    </form>
<?php include(footer.php); ?>