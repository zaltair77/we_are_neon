<?php
include "delete.php";

$id = $_GET['id'];

if(Delete::artist($id)) {
  header("Location: http://localhost:8000/admin.php");
} else {
  echo "Something went wrong...";
}

 ?>
