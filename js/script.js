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

    xhr.onreadystatechange = function(){
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

function signIn(){
    var email = document.getElementById("email1");
    var password = document.getElementById("password1");
    var remember = document.getElementById("remember");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("remember", remember.checked);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange =  function(){
        if(xhr.status == 200 && xhr.readyState == 4){
            var response = xhr.responseText;
            if(response == "Successfully Logged In!" ){
                window.location = "home.php";
            }else{
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgdiv1").className = "d-block";
            }
        }
    }

    xhr.open("POST", "signInProcess.php", true);
    xhr.send(form);
}

var forgotPasswordModel;
function forgotPassword(){
    var model = document.getElementById("fogotPasswordModal");
    forgotPasswordModel = new bootstrap.Modal(model);
    forgotPasswordModel.show();
}

function showPassword1(){
    var textField = document.getElementById("newPassword");
    var button = document.getElementById("showNewPassword");

    if(textField.type == "password"){
        textField.type = "text";
        button.innerHTML = "Hide";
    }else{
        textField.type = "password";
        button.innerHTML = "Show";
    }
}

function showPassword2(){
    var textField = document.getElementById("rePassword");
    var button = document.getElementById("showRePassword");

    if(textField.type == "password"){
        textField.type = "text";
        button.innerHTML = "Hide";
    }else{
        textField.type = "password";
        button.innerHTML = "Show";
    }
}