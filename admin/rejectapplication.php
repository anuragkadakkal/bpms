<?php
	session_start();
	include '../connection.php';

	$jobkey = $_GET['t'];
	$status=3;
	$sql2 = "update tb_jobapply set applystatus='".$status."', applyfeedback='Rejected' where applykey='".$jobkey."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Job Application Rejected');window.location.replace(\"viewappliedjobs.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Failed');window.location.replace(\"viewappliedjobs.php\");</SCRIPT>";
	}

?>
