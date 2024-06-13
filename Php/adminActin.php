<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    // Include the quiz questions
    require_once "../Quiz-Part/index.php";
   
    switch ($action) {
        case 'view':
            // Output questions and answers in a formatted way
            echo "<div class='questions'>";
            foreach ($questions as $index => $question) {
                echo "<p><strong>Question " . ($index + 1) . ": </strong>" . $question['question'] . "</p>";
                echo "<ul>";
                foreach ($question['answers'] as $answer) {
                    echo "<li>" . $answer['text'] . "</li>";
                }
                echo "</ul>";
            }
            echo "</div>";
            break;
        case 'add':
            // Display a form to add a new question
            echo "<form method='post' action='addQuestion.php'>";
            echo "<label for='new-question'>New Question:</label><br>";
            echo "<input type='text' id='new-question' name='new-question'><br>";
            echo "<label for='answer-1'>Answer 1:</label><br>";
            echo "<input type='text' id='answer-1' name='answer-1'><br>";
            echo "<label for='answer-2'>Answer 2:</label><br>";
            echo "<input type='text' id='answer-2' name='answer-2'><br>";
            echo "<label for='answer-3'>Answer 3:</label><br>";
            echo "<input type='text' id='answer-3' name='answer-3'><br>";
            echo "<label for='answer-4'>Answer 4:</label><br>";
            echo "<input type='text' id='answer-4' name='answer-4'><br>";
            echo "<input type='submit' value='Submit'>";
            echo "</form>";
            $newQuestion = $_POST['new-question'];
            $answers = [
                ["text" => $_POST['answer-1'], "correct" => false], // Assuming answer 1 is incorrect
                ["text" => $_POST['answer-2'], "correct" => false],
                ["text" => $_POST['answer-3'], "correct" => false],
                ["text" => $_POST['answer-4'], "correct" => false]
            ];
        
            // Add the new question to the $questions array
            $questions[] = [
                "question" => $newQuestion,
                "answers" => $answers
            ];
            break;
        case 'delete':
            // Display a form to delete a question
            echo "<form method='post' action='deleteQuestion.php'>";
            echo "<label for='question-number'>Select question number to delete:</label><br>";
            echo "<select id='question-number' name='question-number'>";
            foreach ($questions as $index => $question) {
                echo "<option value='" . $index . "'>Question " . ($index + 1) . "</option>";
            }
            echo "</select><br>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            break;
        default:
            echo "Unknown action";
    }
} else {
    echo "No action received";
} 

