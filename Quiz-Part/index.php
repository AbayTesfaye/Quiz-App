<?php
// $questions = [
//   [
//     "question" => "Which is largest animal in the world?",
//     "answers" => [
//       ["text" => "Shark", "correct" => false],
//       ["text" => "Blue whale", "correct" => true],
//       ["text" => "Elephant", "correct" => false],
//       ["text" => "Giraffe", "correct" => false],
//     ],
//   ],
//   [
//     "question" => "Which is the smallest country in the world?",
//     "answers" => [
//       ["text" => "Vatican city", "correct" => true],
//       ["text" => "Nepal", "correct" => false],
//       ["text" => "Shanghai", "correct" => false],
//       ["text" => "Chicago", "correct" => false],
//     ],
//   ],
//   [
//     "question" => "Which is largest desert in the world?",
//     "answers" => [
//       ["text" => "Kalahari", "correct" => false],
//       ["text" => "Gobi", "correct" => false],
//       ["text" => "Sahara", "correct" => true],
//       ["text" => "Antarctica", "correct" => false],
//     ],
//   ],
//   [
//     "question" => "Which is the smallest continent in the world?",
//     "answers" => [
//       ["text" => "Asia", "correct" => false],
//       ["text" => "Australia", "correct" => true],
//       ["text" => "Africa", "correct" => false],
//       ["text" => "Europe", "correct" => false],
//     ],
//   ],
// ];
require_once "questions.php";
$questionsJson = json_encode($questions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>QUIZ APP</title>
</head>
<body>
    <div class="app">
        <div class="time-field">
            <div class="time-left">Time left</div>
            <div class="time-seconds">20</div>
        </div>
        <h1>Simple Quiz</h1>
        <div class="quiz">
            <h2 id="question">Question goes here!</h2>
            <div id="answer-buttons">
                <button class="btn">Answer 1</button>
                <button class="btn">Answer 2</button>
                <button class="btn">Answer 3</button>
                <button class="btn">Answer 4</button>
            </div>
            <button id="next-btn">Next</button>
        </div>
    </div>
    <script>
        const questions = <?php echo $questionsJson; ?>;
        
        const questionElement = document.getElementById("question");
        const answerButtons = document.getElementById("answer-buttons");
        const nextButton = document.getElementById("next-btn");

        let currentQuestionIndex = 0;
        let score = 0;

        function startQuiz() {
            currentQuestionIndex = 0;
            score = 0;
            nextButton.innerHTML = "Next";
            showQuestion();
        }

        function showQuestion() {
            resetState();
            let currentQuestion = questions[currentQuestionIndex];
            let questionNo = currentQuestionIndex + 1;
            questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

            currentQuestion.answers.forEach((answer) => {
                const button = document.createElement("button");
                button.innerHTML = answer.text;
                button.classList.add("btn");
                answerButtons.appendChild(button);

                if (answer.correct) {
                    button.dataset.correct = answer.correct;
                }
                button.addEventListener("click", selectAnswer);
            });
        }

        function resetState() {
            nextButton.style.display = "none";
            while (answerButtons.firstChild) {
                answerButtons.removeChild(answerButtons.firstChild);
            }
        }

        function selectAnswer(e) {
            const selectedBtn = e.target;
            const isCorrect = selectedBtn.dataset.correct === "true";

            if (isCorrect) {
                selectedBtn.classList.add("correct");
                score++;
            } else {
                selectedBtn.classList.add("incorrect");
            }
            Array.from(answerButtons.children).forEach((button) => {
                if (button.dataset.correct === "true") {
                    button.classList.add("correct");
                }
                button.disabled = true;
            });
            nextButton.style.display = "block";
        }

        function showScore() {
            resetState();
            questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
            nextButton.innerHTML = "Play Again";
            nextButton.style.display = "block";
        }

        function handleNextButton() {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion();
            } else {
                showScore();
            }
        }

        nextButton.addEventListener("click", () => {
            if (currentQuestionIndex < questions.length) {
                handleNextButton();
            } else {
                startQuiz();
            }
        });

        const timeSeconds = document.querySelector(".time-seconds");
        let second = 20;

        timeSeconds.innerHTML = second;

        const countDown = setInterval(() => {
            second--;
            timeSeconds.innerHTML = second;
            if (second <= 0 || second < 1) {
                clearInterval(countDown);
                showScore();
            }
        }, 1000);

        startQuiz();
    </script>
</body>
</html>
