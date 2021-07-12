<?php
  session_start();
  include '../connection.php';

  $fkey = $_GET['t'];
  $sql = "update tb_attendance set punchout='".date("Y-m-d h:i:sa")."' where attendkey='".$fkey."'";
  $ex2=mysqli_query($conn,$sql);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Punch Out Successfully');window.location.replace(\"viewattendance.php\"); </SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Punch Out Failed');window.location.replace(\"viewattendance.php\");</SCRIPT>";
  }

?>
