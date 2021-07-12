<?php
	session_start();
	include '../connection.php';

	$catkey = $_GET['t'];
	$status=2;

	$sql = "select * from tb_customer  where custkey='".$catkey."'";
    $result = mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result))
    {
    	$userid=$row['loginid'];
    }

	$sql2 = "update tb_login set status='".$status."' where id='".$userid."'";
	$ex2=mysqli_query($conn,$sql2);

	if($ex2)
	{
		echo "<SCRIPT type='text/javascript'>alert('User Rejected');window.location.replace(\"viewcustomer.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Verification Failed');window.location.replace(\"viewcustomer.php\");</SCRIPT>";
	}

?>
