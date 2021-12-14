<?php

include_once ('db/connect.php');

$error = "";

//Deyerlerin geldiyini yoxlamaq
if (isset($_POST['register'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  
  //formlari yoxlamaq
  if (!$firstname){
    $error = "Enter a name!";
  } else if (!$lastname){
    $error = "Enter your last name!";
  } else if (!$email){
    $error = "Enter your email!";
  } else if (!$password1 || !$password2){
    $error = "Enter a password";
  } else if ($password1 != $password2){
    $error = "Password duplication is incorrect!";
  }else {
    //istifadeci qeydiyyatda varsa yoxlamaq                     //val => key
    $register = $db->prepare('SELECT * FROM use_data WHERE email = :email');
    $register->execute([
      'email' => $email
    ]);
    $row = $register->fetch(PDO::FETCH_ASSOC);
    
    if ($row){
      $error = "Email was used!";
    } else {
      //istifadeci yoxdusa yaratmaq
      $register = $db->prepare('INSERT INTO use_data SET firstname = :firstname, lastname = :lastname, email = :email, password = :password');
      $result = $register->execute([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        //wifrelemek
        'password' => password_hash($password1, PASSWORD_DEFAULT)
      ]);
      if ($result){
        header('Location:login.php');
      } else{
        $error = "You did not register";
      }
    }
  }
}


















