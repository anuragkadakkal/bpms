<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=1;

	$sql2 = "update tb_servicecat set delstatus='".$status."' where catkey='".$catkey."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Service Category Deleted');window.location.replace(\"viewservice.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Deletion Failed');window.location.replace(\"viewservice.php\");</SCRIPT>";
	}

?>
