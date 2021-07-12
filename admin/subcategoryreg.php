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
  $filename = $_FILES['aadharfile']["name"];

  $status=1;
  $flag=0;
  $sql="select * from tb_subcat where scatname='".$cname."'";//echo $sql;exit;
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
    $flag=1;
  }
  if($flag==0)
  {
    $sql = "select * from tb_category where catkey='".$catkey."'";
    $result = mysqli_query($conn,$sql);

    while ($row=mysqli_fetch_array($result))
    {
      $catid=$row['catid'];
    } 

    $catkey=md5(microtime());
    $categorykey=substr($catkey,0,8);

  	$sql2="insert into tb_subcat(scatkey,scatname,scatdesc,mfg,exp,image,scatstatus,catid,loginid,amt) values
  	('".$categorykey."','".$cname."','".$desc."','".$mfg."','".$exp."','".$filename."','".$status."','".$catid."','".$lkey."','".$price."')";

    $ex2=mysqli_query($conn,$sql2);

    if($ex2)
  	{
      $path="Uploads/".$categorykey;
      mkdir($path);
      move_uploaded_file($_FILES['aadharfile']["tmp_name"],$path."/".$_FILES['aadharfile']["name"]);
      echo "<SCRIPT type='text/javascript'>alert('Subcategory Added.');window.location.replace(\"viewcategory.php\");</SCRIPT>";
  	}
  	else
  	{
      echo "<SCRIPT type='text/javascript'>alert('Failed.');window.location.replace(\"addcategory.php\");</SCRIPT>";
    }
  }
  else
  {
     echo "<SCRIPT type='text/javascript'>alert('Product Sub Category Already Exist.');window.location.replace(\"addcategory.php\");</SCRIPT>";
  }

?>
