<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['name']);
    $pwd = htmlspecialchars($_POST['pwd']);

    // here handling the error that may happen
    $error=false;
    if(empty($pwd) || empty($username)){
       $error=true;
       header("Location: ../Login_Signup/index_2.html");
       exit(); 
    }

    // display information if the input is fine
        if (!$error) {
         try {
          require_once "../Database/db.php";
                    
     // Check if the user already exists
            $checkQuery = "SELECT * FROM users WHERE username = 'Admin' AND pwd == :pwd";
            $checkStmt = $pdo->prepare($checkQuery);
            // $checkStmt->bindParam(':username', $username);
            $checkStmt->bindParam(':pwd', $pwd);
            $checkStmt->execute();
        
            if ($checkStmt->rowCount() > 0) {
 // User already exists, redirect to an error page or handle the error
         header("Location: ../Login_Signup/index_2.html");
            exit();
          } else {
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
