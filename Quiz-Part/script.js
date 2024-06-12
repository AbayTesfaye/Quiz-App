// const questions = [
//   {
//     question: "Which is largest animal in the world?",
//     answers: [
//       {
//         text: "Shark",
//         correct: false,
//       },
//       {
//         text: "Blue whale",
//         correct: true,
//       },
//       {
//         text: "Elephant",
//         correct: false,
//       },
//       {
//         text: "Giraffe",
//         correct: false,
//       },
//     ],
//   },
//   {
//     question: "Which is the smallest country in the world?",
//     answers: [
//       {
//         text: "Vatican city",
//         correct: true,
//       },
//       {
//         text: "Nepal",
//         correct: false,
//       },
//       {
//         text: "Shangai",
//         correct: false,
//       },
//       {
//         text: "Chicago",
//         correct: false,
//       },
//     ],
//   },
//   {
//     question: "Which is largest desert in the world?",
//     answers: [
//       {
//         text: "Kalhari",
//         correct: false,
//       },
//       {
//         text: "Gobi",
//         correct: false,
//       },
//       {
//         text: "Sahara",
//         correct: true,
//       },
//       {
//         text: "Antarctica",
//         correct: false,
//       },
//     ],
//   },
//   {
//     question: "Which is the smallest continent in the world?",
//     answers: [
//       {
//         text: "Asia",
//         correct: false,
//       },
//       {
//         text: "Australia",
//         correct: true,
//       },
//       {
//         text: "Africa",
//         correct: false,
//       },
//       {
//         text: "Awuropa",
//         correct: false,
//       },
//     ],
//   },
// ];

// const questionElement = document.getElementById("question");
// const answerButtons = document.getElementById("answer-buttons");
// const nextButton = document.getElementById("next-btn");

// let currentQuestionIndex = 0;
// let score = 0;

// function startQuiz() {
//   currentQuestionIndex = 0;
//   score = 0;
//   nextButton.innerHTML = "Next";
//   showQuestion();
// }

// function showQuestion() {
//   resetState();
//   let currentQuestion = questions[currentQuestionIndex];
//   let questionNo = currentQuestionIndex + 1;
//   questionElement.innerHTML = questionNo + "." + currentQuestion.question;

//   currentQuestion.answers.forEach((answer) => {
//     const button = document.createElement("button");
//     button.innerHTML = answer.text;
//     button.classList.add("btn");
//     answerButtons.appendChild(button);

//     if (answer.correct) {
//       button.dataset.correct = answer.correct;
//     }
//     button.addEventListener("click", selectAnswer);
//   });
// }

// function resetState() {
//   nextButton.style.display = "none";
//   while (answerButtons.firstChild) {
//     answerButtons.removeChild(answerButtons.firstChild);
//   }
// }

// function selectAnswer(e) {
//   const selectedBtn = e.target;
//   const isCorrect = selectedBtn.dataset.correct === "true";

//   if (isCorrect) {
//     selectedBtn.classList.add("correct");
//     score++;
//   } else {
//     selectedBtn.classList.add("incorrect");
//   }
//   Array.from(answerButtons.children).forEach((button) => {
//     if (button.dataset.correct === "true") {
//       button.classList.add("correct");
//     }
//     button.disabled = true;
//   });
//   nextButton.style.display = "block";
// }

// function showScore() {
//   resetState();
//   questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
//   nextButton.innerHTML = "Play Again";
//   nextButton.style.display = "block";
// }

// function handleNextButton() {
//   currentQuestionIndex++;
//   if (currentQuestionIndex < questions.length) {
//     showQuestion();
//   } else {
//     showScore();
//   }
// }

// nextButton.addEventListener("click", () => {
//   if (currentQuestionIndex < questions.length) {
//     handleNextButton();
//   } else {
//     startQuiz();
//   }
// });
// const timeSeconds = document.querySelector(".time-seconds");
// let second = 20;

// timeSeconds.innerHTML = second;

// const countDown = setInterval(() => {
//   second--;
//   timeSeconds.innerHTML = second;
//   if (second <= 0 || second < 1) {
//     clearInterval(countDown);
//     showScore();
//   }
// }, 1000);

// // begin
// function displayQuestions(questionsArray) {
//   // Clear any existing questions
//   while (questionElement.firstChild) {
//     questionElement.removeChild(questionElement.firstChild);
//   }

//   // Loop through each question in the array
//   questionsArray.forEach((question, index) => {
//     const questionDiv = document.createElement("div");
//     questionDiv.classList.add("question");

//     // Create question text element
//     const questionText = document.createElement("p");
//     questionText.innerHTML = `<strong>${index + 1}. ${
//       question.question
//     }</strong>`;
//     questionDiv.appendChild(questionText);

//     // Create answer options
//     const answerList = document.createElement("ul");
//     question.answers.forEach((answer) => {
//       const answerItem = document.createElement("li");
//       answerItem.innerHTML = answer.text;
//       answerList.appendChild(answerItem);
//     });
//     questionDiv.appendChild(answerList);

//     // Append questionDiv to questionElement
//     questionElement.appendChild(questionDiv);
//   });
// }

// // end

// startQuiz();
