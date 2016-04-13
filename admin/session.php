


<?php
 session_start(); // Start the session.
 
 
  //In case that there is no cookie has been not set or have been deleted it will return to the log in index page
 if (!isset($_SESSION['user_name'])) {
  require_once ('login_functions.inc');
  $url = absolute_url('index.php');
  header("Location: $url");
  exit();
 }

 //If it is not an admin require admin login which go back to logginIndex.php
  if ($_SESSION['user_type'] != "admin") {
  require_once ('login_functions.inc');
  $url = absolute_url('indexAdmin.php');
  header("Location: $url");
  exit();
 }
 
 
?>