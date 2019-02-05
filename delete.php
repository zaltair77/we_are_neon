<?php
include "select.php";

class Delete {

  public static function post($id){
    $connection = Select::connect();


    //prepare
    if(!$statement = $connection->prepare("DELETE FROM Posts WHERE id = ?")) {
      die("Prepare failed: " . $connection->error);
    }

    //var_dump($statement);

    //Bind
    if(!$statement->bind_param("i", $id)) {
      die("Bind failed: " . $statement->error);
    }

    //execute

    if($statement->execute()) {

    } else {
      die("Execute failed: " . $statement->error);
    }

    return true;
  }

  public static function artist($id){
    $connection = Select::connect();


    //prepare
    if(!$statement = $connection->prepare("DELETE FROM Artists WHERE id = ?")) {
      die("Prepare failed: " . $connection->error);
    }

    //var_dump($statement);

    //Bind
    if(!$statement->bind_param("i", $id)) {
      die("Bind failed: " . $statement->error);
    }

    //execute

    if($statement->execute()) {

    } else {
      die("Execute failed: " . $statement->error);
    }

    return true;
  }

}

 ?>
