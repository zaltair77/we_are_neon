<?php
  session_start();
  $title = 'Edit Artist';

  include 'select.php';

  $artist = Select::artistById($_GET['id']);
  if ($artist==null) {
    header("Location: http://localhost:8000/404.php");
  }
  
  include "header.php";
  include "top.php";

 ?>

<div class="main-body">
 <h1 class="page-name">Edit Artist</h1>
 <br>
 <div class="img-container" style="float:left; clear:left;">
   <img src="artist-photo.php?id=<?php echo $artist[0]['id']?>" width="175" height="200"/>
 </div>
 <div class="" style="float:left; clear:left; padding: 10px;">
   (Photo cannot be changed)
 </div>
 <div class="container" style=" clear:left; float: left; display: flex; justify-content: space-between;">
    <form class="form" action="update-artist.php?id=<?php echo $artist[0]["id"] ?>" enctype="multipart/form-data" method="POST">
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="fullName">Full Name:</label>
        <input type="text" name="fullName" class="form-control" value="<?php echo $artist[0]["fullName"] ?>">
      </div>
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="location">Location:</label>
        <input type="text" name="location" class="form-control" value="<?php echo $artist[0]["location"] ?>">
      </div>
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="age">Age:</label>
        <input style="width: 30px;" type="number" name="age" class="form-control" value="<?php echo $artist[0]['age']?>">
      </div>
      <div class="form-group" style="clear:left; float: left; padding: 10px;">
        <label for="about" style="clear:left; float: left;">About:</label>
        <textarea name="about" class="form-control" style="clear:left; float:left; min-height:100px; min-width:250px;"><?php echo $artist[0]["about"]?></textarea>
      </div>
      <input type="submit" name="submit" value="Update" style="margin: 10px; clear:left; float: left; color: #FFF; background-color:#000; border: 1px solid #FFF;">
    </form>
 </div>



</div>
