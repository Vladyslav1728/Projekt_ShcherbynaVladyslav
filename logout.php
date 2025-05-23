<?php
require_once('_int/autoload.php');

$db = new database();
$auth = new Authenticate($db);
$auth->logout();

header("Location: login.php");
exit;
?>