<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=1;
	$sql = "select * from tb_staffreg where engkey='".$catkey."'";
	  $result = mysqli_query($conn,$sql);
	  while ($row=mysqli_fetch_array($result))
	  {
	    $staffid=$row['loginid'];
	  }

	$sql2 = "update tb_login set delstatus='".$status."' where id='".$staffid."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('Staff Deleted');window.location.replace(\"viewstaffs.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Deletion Failed');window.location.replace(\"viewstaffs.php\");</SCRIPT>";
	}

?>
