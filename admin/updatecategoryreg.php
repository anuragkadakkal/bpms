<?php
  session_start();
	include '../connection.php';
  $lkey = $_COOKIE['lkey'];

	$cname = $_POST['cname'];
	$desc = $_POST['desc'];
  $status=1;


	$sql2="update tb_category set catname='".$cname."',catdesc='".$desc."' where catkey='".$_POST['catkey']."'";

  $ex2=mysqli_query($conn,$sql2);

  if($ex2)
	{
    echo "<SCRIPT type='text/javascript'>alert('Category Updated.');window.location.replace(\"viewcategory.php\");</SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Registration Failed.');window.location.replace(\"addcategory.php\");</SCRIPT>";
  }

?>
