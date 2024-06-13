<?php
// Include the existing questions array
require_once "../Quiz-Part/questions.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the new question and correct answer from the form
    $newQuestion = $_POST['new-question'];
    $correctAnswerIndex = $_POST['correct-answer'];

    // Create an array to store the new question and its answers
    $newQuestionData = [
        "question" => $newQuestion,
        "answers" => []
    ];

    // Iterate through answer options and mark the correct one
    for ($i = 1; $i <= 4; $i++) {
        $answerText = $_POST["answer-$i"];
        $isCorrect = ($i == $correctAnswerIndex); // Check if this answer is correct

        // Add the answer to the new question data
        $newQuestionData["answers"][] = ["text" => $answerText, "correct" => $isCorrect];
    }

    // Add the new question to the existing questions array
    $questions[] = $newQuestionData;

    // Save the updated questions array to a JSON file
    file_put_contents('questions.php', '<?php $questions = ' . var_export($questions, true) . ';');

    // Redirect back to the admin page
    header("Location: adminAction.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Question</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Add New Question</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="new-question">New Question:</label><br>
                <input type="text" id="new-question" name="new-question" required><br>

                <?php for ($i = 1; $i <= 4; $i++) : ?>
                    <label for="answer-<?php echo $i; ?>">Answer <?php echo $i; ?>:</label><br>
                    <input type="text" id="answer-<?php echo $i; ?>" name="answer-<?php echo $i; ?>" required><br>
                <?php endfor; ?>

                <label for="correct-answer">Correct Answer:</label><br>
                <select id="correct-answer" name="correct-answer" required>
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <option value="<?php echo $i; ?>">Answer <?php echo $i; ?></option>
                    <?php endfor; ?>
                </select><br>

                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
