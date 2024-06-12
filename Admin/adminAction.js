document.addEventListener("DOMContentLoaded", function () {
  const viewBtn = document.querySelector("[name='action'][value='view']");
  const addBtn = document.querySelector("[name='action'][value='add']");
  const deleteBtn = document.querySelector("[name='action'][value='delete']");
  const quizComponents = document.querySelector(".quiz");

  viewBtn.addEventListener("click", function () {
    quizComponents.style.display = "none";
  });

  addBtn.addEventListener("click", function () {
    quizComponents.style.display = "none";
  });

  deleteBtn.addEventListener("click", function () {
    quizComponents.style.display = "none";
  });
});
