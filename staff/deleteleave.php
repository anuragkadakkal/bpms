<?php
  session_start();
  include '../connection.php';

  $fkey = $_GET['t'];
  $sql = "update tb_leave set status='3' where lvkey='".$fkey."'";
  $ex2=mysqli_query($conn,$sql);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Leave Application Deleted');window.location.replace(\"viewleave.php\"); </SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Deletion Failed');window.location.replace(\"viewleave.php\");</SCRIPT>";
  }

?>
