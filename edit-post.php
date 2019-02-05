<?php
  session_start();
  $title = 'Edit Post';
  include 'select.php';

  $post = Select::postById($_GET['id']);
  if ($post==null) {
    header("Location: http://localhost:8000/404.php");
  }
  $artists = Select::artistNames();

  include "header.php";
  include "top.php";

 ?>

<div class="main-body">
 <h1 class="page-name">Edit Post</h1>
 <br>
 <div class="img-container" style="float:left; clear:left;">
   <img src="photo.php?id=<?php echo $post[0]['id']?>" width="175" height="200"/>
 </div>
 <div class="" style="float:left; clear:left; padding: 10px;">
   (Photo cannot be changed)
 </div>
 <div class="container" style=" clear:left; float: left; display: flex; justify-content: space-between;">
   <form class="form" action="update-post.php?id=<?php echo $post[0]["id"] ?>" enctype="multipart/form-data" method="POST">
     <div class="form-group" style="float:left; clear:left; padding: 10px;">
       <label for="title">Title:</label>
       <input type="text" name="title" class="form-control" value="<?php echo $post[0]['title']?>">
     </div>
     <div class="form-group" style="float:left; clear:left; padding: 10px;">
       <label for="artist">Artist:</label>
       <select class="dropdown" name="artist">
         <option value="<?php echo Select::artistName($post[0]['artist_id'])?>"><?php echo Select::artistName($post[0]['artist_id'])?></option>
         <?php
           if($artists->num_rows > 0) {
             while($row = $artists->fetch_assoc()) {
               if (Select::artistName($post[0]['artist_id'])==$row["fullName"]) {

               } else {
         ?>
         <option value="<?php echo $row["fullName"] ?>"><?php echo $row["fullName"] ?></option>
         <?php
               }
             }
           } else {
             echo "0 results";
           }
         ?>
       </select>
     </div>
     <div class="form-group" style="clear:left; float: left; padding: 10px;">
       <label for="featured">Featured:</label>
       <input type="checkbox" name="featured" class="form-control" value="on" <?php if ($post[0]['featured']==1) { echo 'checked';} ?>>
     </div>
     <div class="form-group" style="clear:left; float: left; padding: 10px;">
       <label for="about" style="clear:left; float: left;">About:</label>
       <textarea name="about" class="form-control" style="clear:left; float:left; min-height:100px; min-width:250px;"><?php echo $post[0]['about'] ?></textarea>
     </div>
     <input type="submit" name="submit" value="Update" style="margin: 10px; clear:left; float: left; color: #FFF; background-color:#000; border: 1px solid #FFF;">
   </form>
 </div>



</div>
