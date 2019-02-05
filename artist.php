<?php
  include 'select.php';

  $artist = Select::artistById($_GET['id']);
  $title = $artist[0]['fullName'];
  if ($artist==null) {
    header("Location: http://localhost:8000/404.php");
  }

  include "header.php";
  include "top.php";

  if (!is_int($_GET['id'])) {
    $posts = Select::postsByArtist($_GET['id']);
  }
?>

<div class="main-body">
  <h1 class="page-name" style="padding-bottom: 10px"><?php echo $artist[0]['fullName'] ?></h1>
  <div class="artistpage-img-container">
    <img src="artist-photo.php?id=<?php echo $artist[0]['id'] ?>" alt="" />
  </div>
  <div class="artistpage-body">
    <h2 style="padding-bottom: 10px; margin: 0px">Info</h2>
    <div class="age-artist">
      Age: <?php echo $artist[0]['age'] ?>
    </div>
    <br>
    <div class="loc-artist">
      Location: <?php echo $artist[0]['location'] ?>
    </div>
    <br>
    <div class="about-artist">
      About: <?php echo $artist[0]['about'] ?>
    </div>
  </div>
  <div class="artist-posts">
    <h2 style="padding-bottom: 8px; margin: 0px">Posts</h2>
    <div class="posts" style="padding-left: 10px">
      <?php
        if($posts->num_rows > 0) {
          while($row = $posts->fetch_assoc()) {
          ?>
            -<a href="post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
            <br>
          <?php
          }
        } else {
          echo "0 Posts";
        }
      ?>
    </div>
  </div>
</div>


<?php include "footer.php" ?>
