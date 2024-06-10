<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pwd = htmlspecialchars($_POST['pwd']);
    $email = htmlspecialchars($_POST['email']);
    
   // here handling the error that may happen
   $error=false;
   if(empty($pwd) || empty($email)){
      $error=true;
      header("Location: ../Login_Signup/index_2.html");
      exit(); 
   }

   // display information if the input is fine
       if (!$error) {
        try {
         require_once "../Database/db.php";
                   
    // Check if the user already exists
           $checkQuery = "SELECT * FROM users WHERE pwd = :pwd AND email = :email";
           $checkStmt = $pdo->prepare($checkQuery);
           $checkStmt->bindParam(':pwd', $pwd);
           $checkStmt->bindParam(':email', $email);
           $checkStmt->execute();
       
           if ($checkStmt->rowCount() == 0) {
// User already exists, redirect to an error page or handle the error
        header("Location: ../Login_Signup/index_2.html");
           exit();
         } 
         else {
   // Redirect to the Quiz-Part page
           header("Location: ../Quiz-Part/index.html");
           $pdo = null;
            $stmt = null;
            exit();
                   }
         } catch (PDOException $e) {
           die("Query Failed ". $e->getMessage());
         }
       // end
       
       }
   }
?>
