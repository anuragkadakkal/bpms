<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=2;

	$sql2 = "update tb_productbookings set pbstatus='".$status."',pb_feedback='Item Not Available in Stock' where pbkey='".$catkey."'";//echo $sql2;exit;
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Product Rejected');window.location.replace(\"productbookinghistory.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Failed');window.location.replace(\"productbookinghistory.php\");</SCRIPT>";
	}

?>
