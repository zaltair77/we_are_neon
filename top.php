<body>
<div class="top">
  <h1 class="title">We Are Neon</h1>
  <nav class="navbar">
    <ul>
      <li class="first"><a href="index.php">Home</a></li>
      <span class="seperator"></span>
      <li><a href="artists.php">Artists</a></li>
      <span class="seperator"></span>
      <li><a href="about.php">About</a></li>
      <span class="seperator"></span>
      <li><a href="zine.php">Zine</a></li>
      <span class="seperator"></span>
      <li><a href="mailto:weareneonmag@gmail.com?Subject=Submission" target="_top">Submit</a></li>
      <?php
        if(session_status() == PHP_SESSION_ACTIVE) {
       ?>
       <span class="seperator"></span>
       <li><a href="admin.php">Admin</a></li>
       <?php
        } else {
        ?>
       <span class="seperator"></span>
       <li><a href="login.php">Login</a></li>
       <?php
        }
          ?>
    </ul>
  </nav>
</div>
