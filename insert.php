<?php
include "select.php";
class Insert {

  // public static function admin($firstName, $lastName, $email, $role, $password) {
  //   $connection = Select::connect();
  //   //prepare
  //   if(!$statement = $connection->prepare("INSERT INTO Authors (firstName, lastName, email, role, password) VALUES (?,?,?,?,?)")) {
  //     die("Author prepare failed: " . $connection->error);
  //   }
  //   //Bind
  //   if(!$statement->bind_param("sssss", $firstName, $lastName, $email, $role, md5($password))) {
  //     die("Author bind failed: " . $statement->error);
  //   }
  //   //execute
  //   if(!$statement->execute()) {
  //     die("Author execute failed: " . $statement->error);
  //   }
  //   return true;
  // }

  public static function artist($fullName, $location, $age, $photo, $about, $admin_id) {
    $connection = Select::connect();
    //prepare
    if(!$statement = $connection->prepare("INSERT INTO Artists (fullName, location, age, photo, about, admin_id) VALUES (?,?,?,'$photo',?,?)")) {
      die("Author prepare failed: " . $connection->error);
    }
    //Bind
    if(!$statement->bind_param("ssisi", $fullName, $location, $age, $about, $admin_id)) {
      die("Author bind failed: " . $statement->error);
    }
    //execute
    if(!$statement->execute()) {
      die("Author execute failed: " . $statement->error);
    }

    $connection->close();
    return true;
  }

  public static function post($artist_id, $title, $featured, $photo, $about, $admin_id) {
    // get a connection
    $connection = Select::connect();

    // Prepare statement
    if(($statement = $connection->prepare("INSERT INTO Posts (artist_id, title, featured, photo, about, admin_id) VALUES (?,?,?,'$photo',?,?)")) == false) {
      die("Prepare failed: " . $connection->error);
    }

    // Bind Parameters to Statement
    // First argument = datatypes of VALUES
    // s = string, i = integer, d = double, b = blob
    if($statement->bind_param("isisi", $artist_id, $title, $featured, $about, $admin_id) == false) {
      die("Bind failed: " . $statement->error);
    }


    // Execute Statement
    if($statement->execute() == false) {
      die("Execute failed: " . $statement->error);
    }

    $connection->close();
    // all good? return true
    return true;
  }
}

?>
