function changeView(){
    var signInBOx = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBOx.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp(){
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var xhr = new XMLHttpRequest();

    xhr.onload = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var response = xhr.responseText;
            if(response == "Successfully Registered!" ){
                document.getElementById("msg").innerHTML = "Successfully Registered!";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            }else{
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    xhr.open("POST", "signUpProcess.php", true);
    xhr.send(form);
}