


function myFunction() {
    var x = document.getElementById("myDIV");
    var loginBtn = document.getElementById("login-btn");
  if (x.style.display === "none") {
    x.style.display = "block";
   // x.style.top = (loginBtn.offsetTop + loginBtn.offsetHeight) + "px";
   // x.style.left = loginBtn.offsetLeft + "px";
  } else {
    x.style.display = "none";
    }
  }