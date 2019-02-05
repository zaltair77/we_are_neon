<?php
  $title = "Login";
  include "header.php";
  include "top.php";

?>


<div class="main-body">
  <h1 class="page-name" style="text-align: center; transform: translate(21%,0%)">Login</h1>
  <pre>
    <div class="container" style="text-align: center; transform: translate(-2.8%,0%)">
     <form class="form" action="ad-log.php" method="POST">
      <div class="">
        <label for="username">Username:</label>
        <input type="text" name="username" class="">
      </div>
      <div class="">
        <label for="pass">Password:</label>
        <input type="password" name="pass" class="">
      </div>
      <input type="submit" name="submit" value="Login" style="color: #FFF; background-color:#000; border: 1px solid #FFF;">
     </form>
    </div>
  </pre>
</div>


<?php
  if ($_GET['f']=='1') {
    include "credAlert.js";
  }

 include "footer.php"
?>
