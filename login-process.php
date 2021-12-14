<?php
session_start();
include ('db/connect.php');

$error = "";

if (isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  if (!$email){
    $error = "Enter your email!";
  } else if (!$password){
    $error = "Enter set password!";
  } else {
    $select = $db->prepare('SELECT * FROM use_data WHERE email = :email');
    $select->execute([
      'email' => $email,
    ]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
    
    if ($row){
      $pass_verify = password_verify($password, $row['password']);
      
      if ($pass_verify){
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        
        header('Location:index.php');
      } else {
        $error = "Password error!";
      }
    } else {
      $error = "There is no such user account!";
    }
  }
}