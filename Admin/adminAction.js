// adminAction.js
import questions from "../Login_Signup/questions.js";

// Your existing JavaScript code here

const viewBtn = document.getElementById("viewQue");
const addBtn = document.getElementById("addQue");
const deleteBtn = document.getElementById("deleteQue");
const content = document.getElementById("content");

viewBtn.addEventListener("click", viewQuestions);
addBtn.addEventListener("click", showAddQuestionForm);
deleteBtn.addEventListener("click", showDeleteQuestionForm);

function viewQuestions() {
  content.innerHTML = "";
  questions.forEach((q, index) => {
    const questionDiv = document.createElement("div");
    questionDiv.classList.add("question-item");
    questionDiv.innerHTML = `
      <h3>${index + 1}. ${q.question}</h3>
      <ul>
        ${q.answers
          .map(
            (a) => `<li>${a.text} (${a.correct ? "Correct" : "Incorrect"})</li>`
          )
          .join("")}
      </ul>
    `;
    content.appendChild(questionDiv);
  });
}

function showAddQuestionForm() {
  content.innerHTML = `
    <h2>Add a New Question</h2>
    <form id="addQuestionForm">
      <label>Question: <input type="text" id="newQuestion" required></label>
      <label>Answer 1: <input type="text" id="newAnswer1" required></label>
      <label>Correct: <input type="radio" name="correctAnswer" value="0"></label>
      <label>Answer 2: <input type="text" id="newAnswer2" required></label>
      <label>Correct: <input type="radio" name="correctAnswer" value="1"></label>
      <label>Answer 3: <input type="text" id="newAnswer3" required></label>
      <label>Correct: <input type="radio" name="correctAnswer" value="2"></label>
      <label>Answer 4: <input type="text" id="newAnswer4" required></label>
      <label>Correct: <input type="radio" name="correctAnswer" value="3"></label>
      <button type="submit">Add Question</button>
    </form>
  `;

  const addQuestionForm = document.getElementById("addQuestionForm");
  addQuestionForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const newQuestionText = document.getElementById("newQuestion").value;
    const newAnswers = [
      document.getElementById("newAnswer1").value,
      document.getElementById("newAnswer2").value,
      document.getElementById("newAnswer3").value,
      document.getElementById("newAnswer4").value,
    ];
    const correctAnswerIndex = document.querySelector(
      'input[name="correctAnswer"]:checked'
    ).value;

    const newQuestion = {
      question: newQuestionText,
      answers: newAnswers.map((text, index) => ({
        text,
        correct: index == correctAnswerIndex,
      })),
    };

    questions.push(newQuestion);
    viewQuestions();
  });
}

function showDeleteQuestionForm() {
  content.innerHTML = `
    <h2>Delete a Question</h2>
    <form id="deleteQuestionForm">
      <label>Question Number: <input type="number" id="deleteQuestionIndex" required></label>
      <button type="submit">Delete Question</button>
    </form>
  `;

  const deleteQuestionForm = document.getElementById("deleteQuestionForm");
  deleteQuestionForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const questionIndex =
      parseInt(document.getElementById("deleteQuestionIndex").value) - 1;

    if (questionIndex >= 0 && questionIndex < questions.length) {
      questions.splice(questionIndex, 1);
      viewQuestions();
    } else {
      alert("Invalid question number");
    }
  });
}
