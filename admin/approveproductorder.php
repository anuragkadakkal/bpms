<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=1;

	$sql2 = "update tb_productbookings set pbstatus='".$status."',pb_feedback='Item Available in Stock' where pbkey='".$catkey."'";//echo $sql2;exit;
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Product Approved');window.location.replace(\"productbookinghistory.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Failed');window.location.replace(\"productbookinghistory.php\");</SCRIPT>";
	}

?>
