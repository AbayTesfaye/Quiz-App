<?php
// Step 1: Establish database connection
require_once "../Database/db.php";

// Step 2: Retrieve input values from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // Step 3: Validate input values (optional)
    if(empty($username) || empty($pwd)){
      header("Location: ../Login_Signup/index_2.html");
      exit(); 
   }

    // Step 4: Query the database to check if the provided credentials match an admin record
    $query = "SELECT * FROM users WHERE username = :username AND pwd = :pwd";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':pwd', $pwd);
    $statement->execute();

    // Step 5: If a matching admin record is found and the username is 'admin', redirect to the desired HTML page
    if ($statement->rowCount() > 0 && $username == "Admin") {
        header("Location: ../Admin/adminAction.html");
    } else {
        header("Location: ../Login_Signup/index_2.html");
        exit();
    }
}
?>
