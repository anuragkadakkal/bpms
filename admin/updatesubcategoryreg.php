<?php
  session_start();
	include '../connection.php';
  $lkey = $_COOKIE['lkey'];

	$cname = $_POST['cname'];
	$desc = $_POST['desc'];
  $catkey = $_POST['catid'];
  $mfg = $_POST['mfg'];
  $exp= $_POST['exp'];
  $price = $_POST['amt'];
  $scatkey=$_POST['scatkey'];
  $filename = $_FILES['aadharfile']["name"];

	$sql2="update tb_subcat set scatname='".$cname."',scatdesc='".$desc."',mfg='".$mfg
  ."',exp='".$exp."',image='".$filename."',amt='".$price."' where scatkey='".$scatkey."'";
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
    echo "<SCRIPT type='text/javascript'>alert('Subcategory Updated.');window.location.replace(\"viewcategory.php\");</SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Failed.');window.location.replace(\"viewcategory.php\");</SCRIPT>";
  }

?>
