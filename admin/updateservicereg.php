<?php
  session_start();
	include '../connection.php';
  $lkey = $_COOKIE['lkey'];

	$cname = $_POST['cname'];
	$desc = $_POST['desc'];
  $price = $_POST['amt'];
  $scatkey=$_POST['scatkey'];

  $filename = $_FILES['aadharfile']["name"];

	$sql2="update tb_servicesubcat set scatname='".$cname."',scatdesc='".$desc."',image='".$filename."',amt='".$price."' where scatkey='".$scatkey."'"; //echo $sql2;exit;
  $ex2=mysqli_query($conn,$sql2);

  if($ex2)
	{
    $path="Uploads/".$scatkey."/".$_POST['image'];
    unlink($path);
    $path="Uploads/".$scatkey;
    rmdir($path);
    $path="Uploads/".$scatkey;
    mkdir($path);
    move_uploaded_file($_FILES['aadharfile']["tmp_name"],$path."/".$_FILES['aadharfile']["name"]);
    echo "<SCRIPT type='text/javascript'>alert('Subcategory Updated.');window.location.replace(\"viewservice.php\");</SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Failed.');window.location.replace(\"viewservice.php\");</SCRIPT>";
  }

?>
