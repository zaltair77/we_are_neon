<?php
  include "select.php";

  //$result = Select::postPhoto($_GET['id']);

  if (!is_int($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    header("Location: http://localhost:8000/404.php");
  }

  $conn = mysqli_connect('localhost:8889', 'root', 'root', 'Neon');
  $sql = "SELECT photo FROM Posts WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $photo = $result->fetch_assoc();

  header("Content-Type: image/jpeg");
  header("Content-Length: " . strlen($photo["photo"]));
  echo $photo["photo"];

  $conn->close();
 ?>
