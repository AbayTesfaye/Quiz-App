<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['name']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $email = htmlspecialchars($_POST['email']);

    // here handling the error that may happen
    $error=false;
    if(empty($pwd) || empty($email) ||  empty($username)){
       $error=true;
       header("Location: ../Login_Signup/index_2.html");
       exit(); 
    }

    // display information if the input is fine
        if (!$error) {
         try {
          require_once "../Database/db.php";
                    
     // Check if the user already exists
            $checkQuery = "SELECT * FROM users WHERE username = :username OR email = :email";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->bindParam(':username', $username);
            $checkStmt->bindParam(':email', $email);
            $checkStmt->execute();
        
            if ($checkStmt->rowCount() > 0) {
 // User already exists, redirect to an error page or handle the error
         header("Location: ../Login_Signup/index_2.html");
            exit();
          } else {
 // Insert the new user into the database
            $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':pwd', $pwd);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        
    // Redirect to the Quiz-Part page
            header("Location: ../Quiz-Part/index.php");
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
