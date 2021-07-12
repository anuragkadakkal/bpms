<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=1;

	$sql2 = "update tb_subcat set delstatus='".$status."' where scatkey='".$catkey."'";//echo $sql2;exit;
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Product Sub Category Deleted');window.location.replace(\"viewcategory.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Deletion Failed');window.location.replace(\"viewcategory.php\");</SCRIPT>";
	}

?>
