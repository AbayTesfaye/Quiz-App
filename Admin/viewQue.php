<?php 
// Include the quiz questions
require_once "../Quiz-Part/questions.php";
    
// Output questions and answers in a formatted way
foreach ($questions as $index => $question) {
    echo "<p><strong>Question " . ($index + 1) . ": </strong>" . $question['question'] . "</p>";
    echo "<ul>";
    foreach ($question['answers'] as $answer) {
        echo "<li>" . $answer['text'] . "</li>";
    }
    echo "</ul>";
}
?>
