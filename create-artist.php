<?php
session_start();
include "insert.php";



$fullName = $_POST['fullName'];
$location = $_POST['location'];
$age = $_POST['age'];
$about = $_POST['about'];
$admin_id = $_SESSION['admin_id'];

if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
  $tmpName = $_FILES['photo']['tmp_name'];
  $photoName = $_FILES['photo']['name'];

  $fp = fopen($tmpName, 'r');
  $data = fread($fp, filesize($tmpName));
  $data = addslashes($data);
  fclose($fp);

  if(Insert::artist($fullName, $location, $age, $data, $about, $admin_id)) {
    header("Location: http://localhost:8000/admin.php");
  } else {
    echo "Something went wrong...";
  }

} else {

  echo "<script>
    function myFunction() {
      alert('No image selected/uploaded OR Image was too large');
    }
    myFunction();
    history.go(-1);
  </script>";

}
?>
