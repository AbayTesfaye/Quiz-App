<?php 
$dsn = "mysql:host=localhost;dbname=mydb";
$dbusername="root";
$password="";
try {
  $pdo = new PDO($dsn,$dbusername,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection Failed ". $e->getMessage();
}

?>