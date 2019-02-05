<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <?php
      if (isset($title)) {
        $title = ' | ' . $title;
      } else {
        $title = '';
      }
    ?>
    <title>We Are Neon <?php echo $title ?></title>
    <link rel="shortcut icon" href="title.jpg" />
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
