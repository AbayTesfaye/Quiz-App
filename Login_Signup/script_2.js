// const signUpBtn = document.getElementById("signUpBtn");
const signInBtn = document.getElementById("signInBtn");
const title = document.getElementById("title");
const nameField = document.getElementById("nameField");
const userForm = document.getElementById("userForm");
const adminBtn = document.querySelector(".admin");

let signUpClickedOnce = false;
let signInClickedOnce = false;

signInBtn.addEventListener("click", function () {
  if (!signInClickedOnce) {
    nameField.style.maxHeight = "0";
    title.innerHTML = "Sign In";
    signUpBtn.classList.add("disable");
    signInBtn.classList.remove("disable");
    signInClickedOnce = true;
    signUpClickedOnce = false;
  } else {
    userForm.action = "../Php/signIn.php";
    userForm.submit();
    clearInputFields();
  }
});

signUpBtn.addEventListener("click", function () {
  if (!signUpClickedOnce) {
    nameField.style.maxHeight = "60px";
    title.innerHTML = "Sign Up";
    signInBtn.classList.add("disable");
    signUpBtn.classList.remove("disable");
    signUpClickedOnce = true;
    signInClickedOnce = false;
  } else {
    userForm.action = "../Php/signUp.php";
    userForm.submit();
    clearInputFields();
  }
});

// Clear the input values in the input fields
function clearInputFields() {
  document.querySelectorAll("input").forEach((input) => (input.value = ""));
}

adminBtn.addEventListener("click", function () {
  userForm.action = "../Admin/adminLog.html";
  userForm.submit();
});
