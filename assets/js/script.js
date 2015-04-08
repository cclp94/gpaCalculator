function changeSign(link) {
    var signUp = document.getElementById("sign-up");
    var form = document.getElementById("sign");
    if (signUp.className == "show") {
        signUp.className = "hide";
        document.getElementById("name").disabled = true;
        form.flag.value = "signIn";
        form.submit.value = "Sign In";
        link.innerHTML = "Don't have an Account? Sign Up!";
    } else {
        signUp.className = "show";
        form.flag.value = "signUp";
        document.getElementById("name").disabled = false;
        form.submit.value = "Sign Up";
        link.innerHTML = "Already have an Account? Sign in!";
    }
}

function deleteCourse(link){
    var rowNumber = link.parentNode.rowIndex - 1;     
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("courses-table").deleteRow(parseInt(rowNumber)+1);
                var jsonString = xhr.responseText;
                var jsonVariable = JSON.parse(jsonString);
                document.getElementById("gpa").innerHTML = jsonVariable['gpa'];
                document.getElementById("numCourses").innerHTML = jsonVariable['numCourses'];
                document.getElementById("numCredits").innerHTML = jsonVariable['numCredits'];
      }     
    }
    xhr.open("GET", "resources/coursesAjax.php?row="+rowNumber, true);
    xhr.send();
}