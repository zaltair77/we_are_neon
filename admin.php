<?php
  session_start();
  $title = "Admin";
  include "header.php";
  include "top.php";
  include "select.php";

  $posts = Select::posts();
  $artists = Select::artists();
  ?>

<div class="main-body">
  <h1 class="page-name">Admin</h1>
  <br>

  <div class="table-container" style="">
    <div class="table-heading">
      <a></a>
      <h2 class="table-name">Posts</h2>
      <a href="/add-post.php" style="padding-top: 10px; padding-left: 20px; float: left;"><div class="" style="padding: 1px; padding-right: 2px; border:1px solid white">Add Post</div></a>
      <a></a>
    </div>
    <table style="clear:left; float:left;" class="table">
      <thead>
        <th>Title</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <?php
          foreach($posts as $singlePost) {
            echo "
              <tr>
                <td>$singlePost[title]</td>
                <td class='cell-links'>
                    <a></a>
                    <a class='' href='/edit-post.php?id=$singlePost[id]''>Edit</a>
                    <a class='' href='/delete-post.php?id=$singlePost[id]''>Delete</a>
                    <a></a>
                </td>
              </tr>
            ";
          }
         ?>
      </tbody>
    </table>
  </div>
  <div class="table-container" style="">
    <div class="table-heading">
      <a></a>
      <h2 class="table-name">Artists</h2>
      <a href="/add-artist.php" style="padding-top: 10px; padding-left: 20px; float: left;"><div class="" style="padding: 1px; padding-right: 2px; border:1px solid white">Add Artist</div></a>
      <a></a>
    </div>
    <table style="clear:left; float: left;" class="table">
      <thead>
        <th>Name</th>
        <th>Actions</th>
      </thead>
      <tbody>
        <?php
          foreach($artists as $singleArtist) {
            echo "
              <tr>
                <td>$singleArtist[fullName]</td>
                <td class='cell-links'>
                    <a></a>
                    <a class='' href='/edit-artist.php?id=$singleArtist[id]''>Edit</a>
                    <a class='' href='/delete-artist.php?id=$singleArtist[id]''>Delete</a>
                    <a></a>
                </td>
              </tr>
            ";
          }
         ?>
      </tbody>
    </table>
  </div>
</div>
