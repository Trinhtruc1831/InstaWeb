/*The code for password match is from
  https://www.geeksforgeeks.org/how-to-validate-confirm-password-using-javascript/--> */
function check_password() {
    var pass = document.getElementById("passw").value;
    var confirm_pass = document.getElementById("re-passw").value;
    if (pass != confirm_pass) {
      document.getElementById("wrong_pass_alert").style.color = "red";
      document.getElementById("wrong_pass_alert").innerHTML =
        "☒ Use same password";
      document.getElementById("create").disabled = true;
      document.getElementById("create").style.opacity = 0.4;
    } else {
      document.getElementById("wrong_pass_alert").style.color = "green";
      document.getElementById("wrong_pass_alert").innerHTML =
        "🗹 Password Matched";
      document.getElementById("create").disabled = false;
      document.getElementById("create").style.opacity = 1;
    }
  }