<?php
  session_start();
  $title = 'Add Post';
  include "header.php";
  include "top.php";
  include "select.php";

  $artists = Select::artistNames();
 ?>

<div class="main-body">
 <h1 class="page-name">Add Post</h1>
 <br>

 <div class="container" style="padding-top: 20px; clear:left; float: left; display: flex; justify-content: space-between;">

    <form class="form" action="create-post.php" enctype="multipart/form-data" method="POST">
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="artist">Artist:</label>
        <select class="dropdown" name="artist">
          <option value="null">-----</option>
          <?php
            if($artists->num_rows > 0) {
              while($row = $artists->fetch_assoc()) {
          ?>
          <option value="<?php echo $row["fullName"] ?>"><?php echo $row["fullName"] ?></option>
          <?php
              }
            } else {
              echo "0 results";
            }
          ?>
        </select>
      </div>
      <div class="form-group" style="clear:left; float: left; padding: 10px;">
        <label for="photo">Photo:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <input type="file" accept="image/jpeg" name="photo">
      </div>
      <div class="form-group" style="clear:left; float: left; padding: 10px;">
        <label for="featured">Featured:</label>
        <input type="checkbox" name="featured" class="form-control" value="on">
      </div>
      <div class="form-group" style="clear:left; float: left; padding: 10px;">
        <label for="about" style="clear:left; float: left;">About:</label>
        <textarea name="about" class="form-control" style="clear:left; float:left; min-height:100px; min-width:250px;"></textarea>
      </div>
      <input type="submit" name="submit" value="Submit" style="margin: 10px; clear:left; float: left; color: #FFF; background-color:#000; border: 1px solid #FFF;">
    </form>

 </div>



</div>
