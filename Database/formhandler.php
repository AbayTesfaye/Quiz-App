<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username=$_POST["username"];
  $pwd=$_POST["pwd"];
  $email=$_POST["email"];

  try {
    require_once "db.php";

    $query = "INSERT INTO users(username,pwd,email) VALUES (:username,:pwd,:email);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':pwd',$pwd);
    $stmt->bindParam(':email',$email);
    $stmt->execute();

    header("Location: ../index.php");
    $pdo=null;
    $stmt=null;
    die();
  } catch (PDOException $e) {
    die("Query Failed ". $e->getMessage());
  }
 }
 else{
  header("Location: ../index.php");
 }
?>