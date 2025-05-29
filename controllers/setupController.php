<?php

include_once "../config/Database.php";
$db = new Database();
$conn = $db->connection();


if(isset($_POST['setup_admin'])){
  $fname = filter_input(INPUT_POST, 'sfname', FILTER_SANITIZE_STRING);
  $lname = filter_input(INPUT_POST, 'slname', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'rpassword', FILTER_SANITIZE_STRING);
  $usertype = "admin";

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email || firstname = :firstname && lastname = :lastname");
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':firstname', $fname, PDO::PARAM_STR);
  $stmt->bindParam(':lastname', $lname, PDO::PARAM_STR);
  $stmt->execute(['email' => $email, 'firstname' => $fname, 'lastname'=> $lname]);
  if($stmt->rowCount() > 0){
      echo "exist";
  } else {
      $param = [
          'firstname' => strtolower($fname),
          'lastname' => strtolower($lname) ,
          'email' => strtolower($email) ,
          'password' => md5($password),
          'usertype' => strtolower($usertype)
      ];
     
      $result = $db->query("INSERT INTO users (firstname, lastname,email, password,usertype, status) VALUES (:firstname,:lastname, :email , :password, :usertype, 'granted')",$param);
      if($result){
       echo "ok";
      }
      
    
  }
}
?>