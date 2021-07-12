<?php
  session_start();
  include '../connection.php';

  $fkey = $_GET['t'];
  $sql = "update tb_leave set status='1',lvfeedback='Approved' where lvkey='".$fkey."'";
  $ex2=mysqli_query($conn,$sql);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Leave Application Approved');window.location.replace(\"viewleave.php\"); </SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Approval Failed');window.location.replace(\"viewleave.php\");</SCRIPT>";
  }

?>
