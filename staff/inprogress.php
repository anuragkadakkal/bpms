<?php
  session_start();
  include '../connection.php';

  $jobkey = $_GET['t'];
  $status = 1;

  $sql2 = "update tb_assignwork set wkstatus='".$status."' where wkkey='".$jobkey."'"; //echo $sql2;exit;
  $ex2=mysqli_query($conn,$sql2);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Status Updated');window.location.replace(\"viewservice.php\"); </SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Updation Failed');window.location.replace(\"viewservice.php\");</SCRIPT>";
  }

?>
