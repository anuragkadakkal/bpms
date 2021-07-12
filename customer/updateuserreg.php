<?php
	session_start();
	include '../connection.php';

	$engkey = $_GET['t'];
	$firstname = $_POST['fname'];

	$userid = $_POST['userid'];

	$address = $_POST['address'];
	$phno = $_POST['phno'];
	$username = $_POST['emails'];//echo $username;exit;

	$sql="update tb_login set username='".$username."' where id='".$userid."'";
	$result = mysqli_query($conn,$sql);

	$sql1="update tb_customer set fname='".$firstname."' ,address='".$address."',phone='".$phno."' where loginid='".$_COOKIE['lkey']."'";//echo $sql1;exit;
	$res = mysqli_query($conn,$sql1); 

	
	if($result && $res)
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Successfull');window.location.replace(\"index.php\"); </SCRIPT>";
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Updation Failed.');window.location.replace(\"index.php\");</SCRIPT>";
	}
?>
