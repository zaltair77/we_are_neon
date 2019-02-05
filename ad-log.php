<?php
  session_start();
  include "select.php";

  $username = $_POST["username"];
  $password = $_POST["pass"];
  //$password = md5($password);

  if(Select::loginAdmin($username, $password)) {
    $_SESSION['admin_id'] = Select::adminId($username);
    header('Location: http://localhost:8000/admin.php');
  } else {
    header('Location: http://localhost:8000/login.php?f=1');
  }
 ?>
