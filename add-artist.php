<?php
  session_start();
  $title = 'Add Artist';
  include "header.php";
  include "top.php";
 ?>

<div class="main-body">
 <h1 class="page-name">Add Artist</h1>
 <br>
 <div class="container" style="padding-top: 20px; clear:left; float: left; display: flex; justify-content: space-between;">
    <form class="form" action="create-artist.php" enctype="multipart/form-data" method="POST">
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="fullName">Full Name:</label>
        <input type="text" name="fullName" class="form-control">
      </div>
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="location">Location:</label>
        <input type="text" name="location" class="form-control">
      </div>
      <div class="form-group" style="float:left; clear:left; padding: 10px;">
        <label for="age">Age:</label>
        <input style="width: 30px;" type="number" name="age" class="form-control">
      </div>
      <div class="form-group" style="clear:left; float: left; padding: 10px;">
        <label for="photo">Photo:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value='1048576'>
        <input type="file" accept="image/jpeg" name="photo">
      </div>
      <div class="form-group" style="clear:left; float: left; padding: 10px;">
        <label for="about" style="clear:left; float: left;">About:</label>
        <textarea name="about" class="form-control" style="clear:left; float:left; min-height:100px; min-width:250px;"></textarea>
      </div>
      <input type="submit" name="submit" value="Submit" style="margin: 10px; clear:left; float: left; color: #FFF; background-color:#000; border: 1px solid #FFF;">
    </form>
 </div>



</div>
