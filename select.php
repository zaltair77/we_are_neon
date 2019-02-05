<?php

class Select {

  /*
    This function returns connection from the db
   */
  public static function connect() {
    $mysql_host = "localhost";
    $mysql_database = "Neon";
    $mysql_user = "root";
    $mysql_password = "root";

    $conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database, 0, '/Applications/MAMP/tmp/mysql/mysql.sock');

    if ($conn->connect_error) {
      die("CANNOT CONNECT!:" . $conn->connect_error);
    } else {
      return $conn;
    }
  }

  public static function posts() {
    $conn = Select::connect();

    $sql = "SELECT p.id, p.title, a.fullName AS artist, p.artist_id, p.about, p.featured, p.photo FROM Posts p JOIN Artists a on a.id = p.artist_id ORDER BY id DESC";
    $posts = $conn->query($sql);
    $conn->close();
    return $posts;
  }

  public static function postById($id) {
    $conn = Select::connect();

    $statement = $conn->prepare("SELECT * FROM Posts WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->bind_result($id, $title, $featured, $about, $admin_id, $photo,$artist_id);
    $post = array();

    while($statement->fetch()) {
      $post[] = array(
          "id" => $id,
          "artist_id" => $artist_id,
          "title" => $title,
          "featured" => $featured,
          "about" => $about,
          "admin_id" => $admin_id,
          "photo" => $photo
      );
    }


    $conn->close();
    return $post;
  }

  public static function postsByArtist($id) {
    $conn = Select::connect();

    $sql = "SELECT * FROM Posts WHERE artist_id = $id ORDER BY id DESC";
    $posts = $conn->query($sql);
    $conn->close();
    return $posts;
  }

  public static function artists() {
    $conn = Select::connect();

    $sql = "SELECT * FROM Artists";
    $artists = $conn->query($sql);
    $conn->close();
    return $artists;
  }

  public static function artistById($id) {
    $conn = Select::connect();

    $statement = $conn->prepare("SELECT * FROM Artists WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->bind_result($id, $fullName,$location,$age,$about,$admin_id,$photo);
    $artist = array();

    while($statement->fetch()) {
      $artist[] = array(
          "id" => $id,
          "fullName" => $fullName,
          "location" => $location,
          "age" => $age,
          "about" => $about,
          "admin_id" => $admin_id,
          "photo" => $photo
      );
    }

    $conn->close();
    return $artist;
  }

  public static function artistNames() {
    $conn = Select::connect();

    $sql = "SELECT fullName FROM Artists ORDER BY id ASC";
    $names = $conn->query($sql);
    $conn->close();
    return $names;
  }


  public static function loginAdmin($username, $password) {
    $conn = Select::connect();
    $statement = $conn->prepare("SELECT pass FROM Admin WHERE username=?");
    $statement->bind_param("s", $username);
    $statement->execute();
    $statement->bind_result($hashpass);
    $statement->fetch();

    if ($hashpass == $password) {
      return true;
    } else {
      return false;
    }
  }

  public static function adminId($username) {
    $conn = Select::connect();

    $sql = $conn->prepare("SELECT id FROM Admin WHERE username=?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $sql->bind_result($id);
    $sql->fetch();

    $conn->close();
    return $id;
  }

  public static function artistId($fullName) {
    $conn = Select::connect();

    $sql = $conn->prepare("SELECT id FROM Artists WHERE fullName=?");
    $sql->bind_param("s", $fullName);
    $sql->execute();
    $sql->bind_result($id);
    $sql->fetch();

    $conn->close();
    return $id;
  }

  public static function artistName($id) {
    $conn = Select::connect();

    $sql = $conn->prepare("SELECT fullName FROM Artists WHERE id=?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $sql->bind_result($name);
    $sql->fetch();

    $conn->close();
    return $name;
  }

  // public static function postPhoto($id){
  //   $conn = Select::connect();
  //
  //   $sql = "SELECT photo FROM Posts WHERE id=$id";
  //   $result = $conn->query($sql);
  //   $photo = mysql_fetch_assoc($result);
  //   $conn->close();
  //   return $photo;
  // }
  //
  // public static function artistPhoto($id){
  //   $conn = mysqli_connect('localhost:8889', 'root', 'root', 'Neon');
  //   $sql = "SELECT photo FROM Artists WHERE id=$id";
  //   $result = mysqli_query($conn, $sql);
  //   $photo = $result->fetch_assoc();
  //
  //   header("Content-Type: image/jpeg");
  //   header("Content-Length: " . strlen($photo["photo"]));
  //   return $photo["photo"];
  //
  //   $conn->close();
  // }



}

?>
