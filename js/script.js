function changeView() {
  var signInBOx = document.getElementById("signInBox");
  var signUpBox = document.getElementById("signUpBox");

  signInBOx.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}

function signUp() {
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

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      if (response == "Successfully Registered!") {
        document.getElementById("msg").innerHTML = "Successfully Registered!";
        document.getElementById("msg").className = "alert alert-success";
        document.getElementById("msgdiv").className = "d-block";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  xhr.open("POST", "signUpProcess.php", true);
  xhr.send(form);
}

function signIn() {
  var email = document.getElementById("email1");
  var password = document.getElementById("password1");
  var remember = document.getElementById("remember");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);
  form.append("remember", remember.checked);

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.status == 200 && xhr.readyState == 4) {
      var response = xhr.responseText;
      if (response == "Successfully Logged In!") {
        window.location = "home.php";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgdiv1").className = "d-block";
      }
    }
  };

  xhr.open("POST", "signInProcess.php", true);
  xhr.send(form);
}

var forgotPasswordModel;
function forgotPassword() {
  var email = document.getElementById("email1");

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      if (response == "Message has been sent") {
        alert("Verification code has been sent to your email address.");
        var model = document.getElementById("fogotPasswordModal");
        forgotPasswordModel = new bootstrap.Modal(model);
        forgotPasswordModel.show();
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgdiv1").className = "d-block";
      }
    }
  };

  xhr.open("GET", "forgotPasswordProcess.php?email=" + email.value, true);
  xhr.send();
}

function showPassword1() {
  var textField = document.getElementById("newPassword");
  var button = document.getElementById("showNewPassword");

  if (textField.type == "password") {
    textField.type = "text";
    button.innerHTML = "Hide";
  } else {
    textField.type = "password";
    button.innerHTML = "Show";
  }
}

function showPassword2() {
  var textField = document.getElementById("rePassword");
  var button = document.getElementById("showRePassword");

  if (textField.type == "password") {
    textField.type = "text";
    button.innerHTML = "Hide";
  } else {
    textField.type = "password";
    button.innerHTML = "Show";
  }
}

function resetPassword() {
  var email = document.getElementById("email1");
  var verificationCode = document.getElementById("verification_code");
  var newPassword = document.getElementById("newPassword");
  var rePassword = document.getElementById("rePassword");

  var form = new FormData();
  form.append("email", email.value);
  form.append("verificationCode", verificationCode.value);
  form.append("newPassword", newPassword.value);
  form.append("rePassword", rePassword.value);

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      if (response == "Password Updated Successfully") {
        alert("Password has been changed successfully");
        forgotPasswordModel.hide();
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgdiv1").className = "d-block";
      }
    }
  };

  xhr.open("POST", "resetPasswordProcess.php", true);
  xhr.send(form);
}

function signout() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Successfully Logged Out!") {
        window.location.reload();
      }
    }
  };

  request.open("GET", "signoutProcess.php", true);
  request.send();
}

function showPassword3() {
  var textField = document.getElementById("basicPassword");
  var eye = document.getElementById("eye3");

  if (textField.type == "password") {
    textField.type = "text";
    eye.className = "bi bi-eye-slash-fill text-white";
  } else {
    textField.type = "password";
    eye.className = "bi bi-eye-fill text-white";
  }
}

function selectDistrict() {
  var province_id = document.getElementById("province").value;

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      selectCity();
    }
  };

  xhr.open("GET", "selectDistrictProcess.php?province_id=" + province_id, true);
  xhr.send();
}

function selectCity() {
  var district_id = document.getElementById("district").value;

  xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      document.getElementById("city").innerHTML = response;
    }
  };

  xhr.open("GET", "selectCityProcess.php?district_id=" + district_id, true);
  xhr.send();
}

function changeProfileImage() {
  var image = document.getElementById("profileimage");

  image.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);
    document.getElementById("image").src = url;
  };
}

function updateUserProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pCode = document.getElementById("postal_code");
  var image = document.getElementById("profileimage");

  var form = new FormData();

  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("line1", line1.value);
  form.append("line2", line2.value);
  form.append("province", province.value);
  form.append("district", district.value);
  form.append("city", city.value);
  form.append("postal_code", pCode.value);
  form.append("image", image.files[0]);

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      if (response == "Successfully Updated!") {
        window.location.reload();
      } else if (response == "You have not uploaded any image") {
        alert("You have not uploaded any image");
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  xhr.open("POST", "updateUserProfileProcess.php", true);
  xhr.send(form);
}

function addColor() {
  var color = document.getElementById("addColor");

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      if (response == "Successfully Added") {
        Swal.fire({
          title: "Success...",
          text: "Color has registed !",
          icon: "success",
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: response,
          icon: "error"
        });
      }
    }
  };

  xhr.open("GET", "addColorProcess.php?color=" + color.value, true);
  xhr.send();
}
