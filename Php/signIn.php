<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = htmlspecialchars($_POST['pwd']);
    $email = htmlspecialchars($_POST['email']);

    echo "<h1>Sign In Information</h1>";
    echo "Password: " . $password . "<br>";
    echo "Email: " . $email . "<br>";
}
?>
