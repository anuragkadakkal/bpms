<?php
	session_start();
	$userid=$_SESSION['lkey'];
	include '../connection.php';
	$sql="update tb_login set atstatus='".date('Y-m-d')."' where id='".$userid."'"; //echo $sql;exit;
  	$result = mysqli_query($conn,$sql);
  	setcookie("lkey",$userid);
  	$engkey=md5(microtime());
  	$atkey=substr($engkey,0,8);
  	$sql1="insert into tb_attendance(attendkey,attendstaffid,punchin,curdate) values ('".$atkey."','".$userid."','".date("Y-m-d h:i:sa")."','".date('Y-m-d')."')"; //echo $sql1;exit;
  	$ex1=mysqli_query($conn,$sql1);
  	if($ex1)
	{
		$_SESSION["logined"] = 1;
   		echo "<SCRIPT type='text/javascript'>alert('Punch In Successfull.');window.location.replace(\"../staff/index.php\");</SCRIPT>";
	}
	

?>
