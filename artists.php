<?php
  $title = "Artists";
  include "header.php";
  include "top.php";
  include "select.php";

  $artists = Select::artists();
?>
<div class="main-body">
  <h1 class="page-name">Artists</h1>

  <div class="artist-list">
  <?php
    if($artists->num_rows > 0) {
      $post = 0;
      while($row = $artists->fetch_assoc()) {
        $post++;

      ?>
        <div style="<?php if ($post%3==1) { echo "clear: left;"; } ?>" class="artist-link">

          <a href="artist.php?id=<?php echo $row["id"]?>"><div class="artist-name">
            <?php echo $row['fullName'] ?>
          </div></a>
          <a href="artist.php?id=<?php echo $row["id"]?>"><img src="artist-photo.php?id=<?php echo $row['id'] ?>" alt=""/></a>
        </div>
      <?php
      }
    } else {
      echo "0 results";
    }
  ?>
  </div>
</div>


<?php include "footer.php" ?>
