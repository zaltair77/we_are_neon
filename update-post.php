<?php
session_start();
include "update.php";

$title = $_POST['title'];
$artist_id = Select::artistId($_POST['artist']);
$about = $_POST['about'];

if ($_POST['featured']=='on') {
  $featured = 1;
}

if(Update::post($_GET['id'], $title, $artist_id, $featured, $about)) {
  header("Location: http://localhost:8000/admin.php");
} else {
  echo "Something went wrong...";
}
?>
