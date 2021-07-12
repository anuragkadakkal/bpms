<?php
  session_start();
include '../connection.php';

  $fkey = $_GET['t'];
  $status = 3;
  $sql = "update tb_productbookings set pbstatus='".$status."',pb_feedback='Order Canclled By User' where pbkey='".$fkey."'";//echo $sql;exit;
  $ex2=mysqli_query($conn,$sql);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Product Order Cancelled');window.location.replace(\"productbookings.php\"); </SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Request Failed');window.location.replace(\"productbookings.php\");</SCRIPT>";
  }

?>
