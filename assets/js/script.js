function changeSign(link) {
    var signUp = document.getElementById("sign-up");
    var form = document.getElementById("sign");
    if (signUp.className == "show") {
        signUp.className = "hide";
        document.getElementById("name").disabled = true;
        form.flag.value = "signIn";
        form.submit.value = "Sign In";
        link.innerHTML = "Don't have an Account? Sign Up!"
    } else {
        signUp.className = "show";
        form.flag.value = "signUp";
        document.getElementById("name").disabled = false;
        form.submit.value = "Sign Up";
        link.innerHTML = "Already have an Account? Sign in!";
    }
}