<?php include 'resources/templates/header.php'; ?>
    <form id="sign" class="form-sign centered-block centered-vert" method="post" action="formHandler.php">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" required><br />
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName"><br />
        <label for="email">E-mail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="email" name="email"><br />
        <label for="password">Password&nbsp&nbsp</label>
        <input type="password" name="password"><br />
        <a href="#" id="signin">Already have an Account? Sign in</a><br />
        <input type="submit" value="Sign up">
    </form>
<?php include 'resources/templates/footer.php'; ?>