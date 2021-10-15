<?php
 session_start();
 session_destroy();

 include'inc/header.php';
 include'inc/slider.php';
 include'inc/gallery-home.php';

  echo 'You have been logged out. <a href="index.php">Go back</a>';
?>
