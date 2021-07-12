<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=0;

	$sql2 = "update tb_category set catstatus='".$status."' where catkey='".$catkey."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Category Status Updated');window.location.replace(\"viewcategory.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Failed');window.location.replace(\"viewcategory.php\");</SCRIPT>";
	}

?>
