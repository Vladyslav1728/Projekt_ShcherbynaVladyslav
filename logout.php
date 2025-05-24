<?php
  require_once('_inc/autoload.php');
?>

<?php
  $db = new database();
  $auth = new Authenticate($db);
  $auth->logout();
  header("Location: login.php");
  exit;
?>