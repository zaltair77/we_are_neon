<?php
session_start();
include "update.php";

$fullName = $_POST['fullName'];
$location = $_POST['location'];
$age = $_POST['age'];
$about = $_POST['about'];

if(Update::artist($_GET['id'], $fullName, $location, $age, $about)) {
  header("Location: http://localhost:8000/admin.php");
} else {
  echo "Something went wrong...";
}
?>
