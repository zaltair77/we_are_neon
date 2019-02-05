<?php
  include 'select.php';

  $post = Select::postById($_GET['id']);
  $title = $post[0]['title'];
  if ($post==null) {
    header("Location: http://localhost:8000/404.php");
  }

  include "header.php";
  include "top.php";
?>

<div class="main-body">
  <h1 class="page-name"><?php echo $post[0]['title'] ?></h1>
  <h2 style="float:left; clear:left; position: relative">by <a href="artist.php?id=<?php echo $post[0]['artist_id']?>"><?php echo Select::artistName($post[0]['artist_id'])?></a></h2>
  <div class="postpage-img-container">
    <img src="photo.php?id=<?php echo $post[0]['id'] ?>" alt="" />
  </div>
  <div class="postpage-body">
    <?php echo $post[0]['about'] ?>
  </div>
</div>


<?php include "footer.php" ?>
