<?php
  include "select.php";
  class Update {

    public static function artist($id, $fullName, $location, $age, $about) {
      $connection = Select::connect();

      if(!$statement = $connection->prepare("UPDATE Artists SET fullName = ?, location = ?, age = ?, about = ? WHERE id=?")) {
        die("Artist prepare failed: " . $connection->error);
      }

      //Bind
      if(!$statement->bind_param("ssisi", $fullName, $location, $age, $about, $id)) {
        die("Artist bind failed: " . $statement->error);
      }
      //execute
      if(!$statement->execute()) {
        die("Artist execute failed: " . $statement->error);
      }

      $connection->close();
      return true;
    }

    public static function post($id, $title, $artist_id, $featured, $about) {
      $connection = Select::connect();

      if(!$statement = $connection->prepare("UPDATE Posts SET title = ?, artist_id = ?, featured = ?, about = ? WHERE id=?")) {
        die("Post prepare failed: " . $connection->error);
      }

      //Bind
      if(!$statement->bind_param("siisi", $title, $artist_id, $featured, $about, $id)) {
        die("Post bind failed: " . $statement->error);
      }
      //execute
      if(!$statement->execute()) {
        die("Post execute failed: " . $statement->error);
      }

      $connection->close();
      return true;
    }
  }

 ?>
