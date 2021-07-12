<?php
	session_start();
	include '../connection.php';

	$jobkey = $_GET['t'];
	$status=1;
	$sql2 = "update tb_jobapply set applystatus='".$status."', applyfeedback='Approved' where applykey='".$jobkey."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		$_SESSION['jobkey']=$jobkey;
		echo "<SCRIPT type='text/javascript'>window.location.replace(\"jobapprovemail.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Failed');window.location.replace(\"viewappliedjobs.php\");</SCRIPT>";
	}

?>
