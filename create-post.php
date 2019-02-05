<?php
session_start();
include "insert.php";

$title = $_POST['title'];
$artist_id = Select::artistId($_POST['artist']);
$about = $_POST['about'];
$admin_id = $_SESSION['admin_id'];

if ($_POST['featured']=='on') {
  $featured = 1;
}

if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
  $tmpName = $_FILES['photo']['tmp_name'];

  $fp = fopen($tmpName, 'r');
  $data = fread($fp, filesize($tmpName));
  $data = addslashes($data);
  fclose($fp);

  if(Insert::post($artist_id, $title, $featured, $data, $about, $admin_id)) {
    header("Location: http://localhost:8000/admin.php");
  } else {
    echo "Something went wrong...";
  }

} else {

  echo "
  <script>
    function myFunction() {
      alert('No image selected/uploaded OR Image was too large');
    }
    myFunction();
    history.go(-1);
  </script>";

}
?>
