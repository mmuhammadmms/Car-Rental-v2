<?php
include('connect.php');
session_start();

	unset($_SESSION['us']);
	unset($_SESSION['pw']);
  session_destroy();
	$_SESSION = array();
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php\">";
?>
