const signUpBtn = document.getElementById("signUpBtn");
const signInBtn = document.getElementById("signInBtn");
const title = document.getElementById("title");
const nameField = document.getElementById("nameField");

// This code for sign In button
signInBtn.addEventListener("click", function () {
  nameField.style.maxHeight = "0";
  title.innerHTML = "Sign In";
  signUpBtn.classList.add("disable");
  signInBtn.classList.remove("disable");
});

// This code for sign Up button
signUpBtn.addEventListener("click", function () {
  nameField.style.maxHeight = "60px";
  title.innerHTML = "Sign Up";
  signInBtn.classList.add("disable");
  signUpBtn.classList.remove("disable");
});
