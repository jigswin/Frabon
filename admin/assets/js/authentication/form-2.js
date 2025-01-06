const loading = document.querySelector(".GmWow");
const layer = document.querySelector(".Mykq7");

var togglePassword = document.getElementById("toggle-password");
var formContent = document.getElementsByClassName("form-content")[0];
var getFormContentHeight = formContent.clientHeight;

var formImage = document.getElementsByClassName("form-image")[0];
if (formImage) {
  var setFormImageHeight = (formImage.style.height =
    getFormContentHeight + "px");
}
if (togglePassword) {
  togglePassword.addEventListener("click", function () {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });
}

$("form").submit(function (e) {
  e.preventDefault();
});

$(document).on("click", "#vL3fW", function () {
  const name = document.querySelector("#username");
  const pass = document.querySelector("#password");

  if (!name.value) {
    alert("Please Enter Email");
    name.focus();
    return false;
  } else {
    loading.classList.remove("d-none");
    $.ajax({
      type: "POST",
      url: "ajax/signin.php",
      data: { flag: "signin", username: name.value },
      success: function (res) {
        loading.classList.add("d-none");

        if (res == 1) {
          name.focus();
          // alert("Invalid Email or Mobile");
          alert("Invalid Email");
        } else if (res == 3) {
          window.location.href = "login-otp";
        } else if (res == 4) {
          window.location.href = "tfa-otp";
        } else if (res == 13 || res == 23 || res == 4) {
          alert(
            "Wrong Password Account Blocked Kindly Login After Two Minutes!"
          );
        }
      },
    });
  }
});

$(document).on("click", "#mL", function () {
  const name = document.querySelector("#username");

  if (!name.value) {
    alert("Please enter mobile");
    name.focus();
    return false;
  } else {
    loading.classList.remove("d-none");
    $.ajax({
      type: "POST",
      url: "ajax/signin.php",
      data: { flag: "signinml", username: name.value },
      success: function (res) {
        loading.classList.add("d-none");

        if (res == 1) {
          window.location.href = "tfa-otp";
        } else if (res == 2) {
          name.focus();
          alert("Invalid Mobile");
        } else if (res == 23 || res == 3) {
          alert(
            "Wrong Password Account Blocked Kindly Login After Two Minutes!"
          );
        }
      },
    });
  }
});

$(document).on("click", "#tTfaCodeSubmit", function () {
  const code = document.querySelector("#tTFA-code");
  if (code.value == "") {
    $(".tTFA-code-err").html("Please enter Code");
    code.focus();
    return false;
  } else {
    $(".tTFA-code-err").html("");
    loading.classList.remove("d-none");

    $.ajax({
      type: "POST",
      url: "ajax/signin.php",
      data: { flag: "saveCode2fa", code: code.value },
      success: function (res) {
        loading.classList.add("d-none");

        if (res == 1) {
        //   location.href = location.href;
        window.location.href = "tfa-otp";
        } else {
          alert("Something went wrong");
        }
      },
    });
  }
});

$(document).on("click", "#tTfaCodeCheck", function () {
  const code = document.querySelector("#tTFA-code");
  if (code.value == "") {
    $(".tTFA-code-err").html("Please enter Code");
    code.focus();
    return false;
  } else {
    $(".tTFA-code-err").html("");
    loading.classList.remove("d-none");

    $.ajax({
      type: "POST",
      url: "ajax/signin.php",
      data: { flag: "checkCode2fa", code: code.value },
      success: function (res) {
        loading.classList.add("d-none");
        if (res) {
          let data = jQuery.parseJSON(res);
          if (data.status == 1) {
            location.href = `tfa-qr?code=${data.code}`;
          } else if (data.status == 2) {
            $(".tTFA-code-err").html("Invalid Code");
          }
        } else {
          alert("Something went wrong");
        }
      },
    });
  }
});

$(document).on("click", "#tTfaSendCode", function () {
  loading.classList.remove("d-none");

  $.ajax({
    type: "POST",
    url: "ajax/signin.php",
    data: { flag: "sendCode2fa" },
    success: function (res) {
      loading.classList.add("d-none");

      if (res == 1) {
        alert("Code send in your register email");
      } else {
        alert("Something went wrong");
      }
    },
  });
});

// Two Factor Authentication

$(document).on("click", "#tTfaSubmit", function () {
  const otp = document.querySelector("#tTFA-otp");
  if (!otp.value) {
    $(".tTFA-otp-err").html("Please enter OTP");
    otp.focus();
    return false;
  } else {
    $(".tTFA-otp-err").html("");
    loading.classList.remove("d-none");

    $.ajax({
      type: "POST",
      url: "ajax/signin.php",
      data: { flag: "checkotp2fa", otp: otp.value },
      success: function (res) {
        loading.classList.add("d-none");

        if (res == 1) {
          otp.focus();
          $(".tTFA-otp-err").html("Invalid OTP");
        } else if (res == 2) {
          let d = new Date();
          localStorage.setItem("LastActive", d.getTime());
          localStorage.setItem("LoginTime", d.getTime());
          window.location.href = "./";
        }
      },
    });
  }
});

$(document).on("click", "#iepm4", function () {
  const otp = document.querySelector("#otp");
  if (!otp.value) {
    alert("Please enter OTP");
    otp.focus();
    return false;
  } else {
    loading.classList.remove("d-none");

    $.ajax({
      type: "POST",
      url: "ajax/signin.php",
      data: { otp: otp.value, flag: "checkotp" },
      success: function (res) {
        loading.classList.add("d-none");

        if (res == 1) {
          otp.focus();
          alert("Invalid OTP");
        } else if (res == 2) {
          let d = new Date();
          localStorage.setItem("LastActive", d.getTime());
          localStorage.setItem("LoginTime", d.getTime());
          window.location.href = "./";
        }
      },
    });
  }
});

/* forgot password */

$(document).on("click", ".H2bft", function () {
  const email = document.querySelector("#FMW5T");

  if (!email.value) {
    alert("Please enter email");
    email.focus();
    return false;
  }

  loading.classList.remove("d-none");
  $.ajax({
    type: "POST",
    url: "ajax/forgot.php",
    data: { flag: "sendotp", email: email.value },
    success: function (res) {
      loading.classList.add("d-none");

      if (res == 1) {
        email.focus();
        alert("Invalid Email");
      } else if (res == 2) {
        window.location.href = "forgot-otp";
      }
    },
  });
});

$(document).on("click", ".xb0cm", function () {
  const otp = document.querySelector("#bS0f0");

  if (!otp.value) {
    alert("Please enter otp");
    otp.focus();
    return false;
  }

  $.ajax({
    type: "POST",
    url: "ajax/forgot.php",
    data: { flag: "checkOTP", otp: otp.value },
    success: function (res) {
      if (res == 1) {
        otp.focus();
        alert("Invalid OTP");
      } else if (res == 2) {
        window.location.href = "forgot-new-pass";
      }
    },
  });
});

$(document).on("click", ".LuF0Z", function () {
  const pass = document.querySelector("#TQnHe");
  const cpass = document.querySelector("#m3ODO");

  if (!pass.value) {
    alert("Please enter new Password");
    pass.focus();
    return false;
  }
  if (!cpass.value) {
    alert("Please enter confirm password");
    cpass.focus();
    return false;
  }

  if (pass.value != cpass.value) {
    alert("Password not match");
    cpass.focus();
    return false;
  }

  $.ajax({
    type: "POST",
    url: "ajax/forgot.php",
    data: { flag: "setPassword", pass: pass.value },
    success: function (res) {
      if (res == 1) {
        alert("Forgot successfully");
        window.location.href = "login";
      } else if (res == 2) {
        alert("Something went wrong please try again letter.");
        window.location.href = "forgot";
      }
    },
  });
});
