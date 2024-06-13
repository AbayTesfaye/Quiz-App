<?php
// Include the existing questions array
require_once "../Quiz-Part/questions.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the index of the question to delete
    $questionIndex = $_POST['question-index'];

    // Check if the index is valid
    if (isset($questions[$questionIndex])) {
        // Remove the question from the array
        unset($questions[$questionIndex]);

        // Save the updated questions array to a JSON file
        file_put_contents('questions.php', '<?php $questions = ' . var_export($questions, true) . ';');
        
        // Redirect back to the admin page
        header("Location: adminAction.html");
        exit;
    } else {
        echo "Invalid question index.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete Question</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Delete Question</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="question-index">Select question number to delete:</label><br>
                <select id="question-index" name="question-index" required>
                    <?php foreach ($questions as $index => $question) : ?>
                        <option value="<?php echo $index; ?>">Question <?php echo ($index + 1); ?></option>
                    <?php endforeach; ?>
                </select><br>

                <button type="submit" name="submit">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>
