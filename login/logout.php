<?php
	session_start();
	/*setcookie("logined",0);*/
	unset($_SESSION["cart_item"]);
	header("location:../index.php");
?>
