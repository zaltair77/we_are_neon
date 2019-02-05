<?php
include "header.php";
include "top.php";
include "select.php";

$result = Select::posts();
$result2 = Select::posts();
?>

<div class="container main-body">
 <div class="page-name">New</div>
 <div class="page-name" style="width:10%; float:right; margin-right: 210px">Featured</div>
 <div class="feed">
   <?php
     if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
       ?>
       <div class="post">
         <div class="img-container">
           <img src="photo.php?id=<?php echo $row['id']?>" width="175" height="200"/>
         </div>
         <div class="post-top">
         <div class="post-title"><a href="post.php?id=<?php echo $row["id"]?>"><?php echo $row["title"]?></a></div>
         <br>
         <div class="post-artist">by <a href="artist.php?id=<?php echo $row["artist_id"]?>"><?php echo $row["artist"]?></a></div>
         </div>
         <div class="post-body"><?php echo $row["about"]?></div>
       </div>
       <hr>
       <?php
       }
     } else {
       echo "0 results";
     }
   ?>
 </div>


 <div class="featured">
   <aside class="feat-aside">
     <ul>
       <?php
         if($result2->num_rows > 0) {
           while($row = $result2->fetch_assoc()) {
             if ($row['featured']==1) {
           ?>
             <li><a href="post.php?id=<?php echo $row['id']?>">
               <div class="feat-img-container">
                 <img src="photo.php?id=<?php echo $row['id']?>" width="175" height="200"/>
               </div>
             </a></li>
           <?php
             }
           }
         } else {
           echo "0 results";
         }
       ?>
     </ul>
   </aside>
 </div>
</div>


<?php include "footer.php" ?>
