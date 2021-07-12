<?php
	session_start();
	include '../connection.php';

	$jobkey = $_GET['t'];
	$status=1;
	$sql2 = "update tb_jobs set jstatus='".$status."' where jkey='".$jobkey."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Job Activated');window.location.replace(\"viewjobs.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Job Activation Failed');window.location.replace(\"viewjobs.php\");</SCRIPT>";
	}

?>
