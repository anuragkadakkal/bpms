<?php
	session_start();
	include '../connection.php';

	$jobkey = $_GET['t'];
	$status=2;
	$sql2 = "update tb_jobapply set applystatus='".$status."', applyfeedback='Cancelled By User' where applykey='".$jobkey."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Job Application Cancelled');window.location.replace(\"viewappliedjobs.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Cancellation Failed');window.location.replace(\"viewappliedjobs.php\");</SCRIPT>";
	}

?>
