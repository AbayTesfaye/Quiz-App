<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = htmlspecialchars($_POST['pwd']);
    $email = htmlspecialchars($_POST['email']);
    
    // here handling the error that may happen
     $error=false;
     if(empty($password) || empty($email)){
        $error=true;
        header("Location: ../Login_Signup/index_2.html");
        exit();
     }

     // display information if the input is fine
     if(!$error){
    header("Location: ../Quiz-Part/index.html");
  }
    
}
?>
