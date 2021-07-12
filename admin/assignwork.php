<?php
  session_start();
	include '../connection.php';
  $lkey = $_COOKIE['lkey'];

	$staffid = $_POST['cname'];
	$desc = $_POST['desc'];
  $bookkey = $_POST['bookkey'];
  $status=0;

  $catkey=md5(microtime());
  $categorykey=substr($catkey,0,8);

  $sql="update tb_booking set astaff='1' where bk_key='".$bookkey."'";
  $ex2=mysqli_query($conn,$sql);

	$sql2="insert into tb_assignwork(wkkey,wkstaffid,wkbkkey,wkstatus,curdate,dateonly,wkdesc) values
	('".$categorykey."','".$staffid."','".$bookkey."','".$status."','".date("Y-m-d h:i:sa")."','".date('Y-m-d')."','".$desc."')";
  $ex2=mysqli_query($conn,$sql2);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Work Assigned.');window.location.replace(\"viewassigntask.php\");</SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Failed.');window.location.replace(\"servicebookinghistory.php\");</SCRIPT>";
  }

?>
