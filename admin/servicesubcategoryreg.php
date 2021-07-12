<?php
  session_start();
	include '../connection.php';
  $lkey = $_COOKIE['lkey'];

	$cname = $_POST['cname'];
	$desc = $_POST['desc'];
  $catkey = $_POST['catid'];

  $price = $_POST['amt'];
  $filename = $_FILES['aadharfile']["name"];

  $flag=0;
  $sql="select * from tb_servicesubcat where scatname='".$cname."'";//echo $sql;exit;
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
    $flag=1;
  }
  if($flag==0)
  {
    $status=1;

    $sql = "select * from tb_servicecat where catkey='".$catkey."'";
    $result = mysqli_query($conn,$sql);

    while ($row=mysqli_fetch_array($result))
    {
      $catid=$row['catid'];
    } 

    $catkey=md5(microtime());
    $categorykey=substr($catkey,0,8);
  //echo $catid;
  	$sql2="insert into tb_servicesubcat(scatkey,scatname,scatdesc,image,scatstatus,catid,loginid,amt,delstatus) values
  	('".$categorykey."','".$cname."','".$desc."','".$filename."','".$status."','".$catid."','".$lkey."','".$price."','0')";//echo $sql2;exit;

    $ex2=mysqli_query($conn,$sql2);

    if($ex2)
  	{
      $path="Uploads/".$categorykey;
      mkdir($path);
      move_uploaded_file($_FILES['aadharfile']["tmp_name"],$path."/".$_FILES['aadharfile']["name"]);
      echo "<SCRIPT type='text/javascript'>alert('Service Added.');window.location.replace(\"viewservice.php\");</SCRIPT>";
  	}
  	else
  	{
      echo "<SCRIPT type='text/javascript'>alert('Failed.');window.location.replace(\"viewservice.php\");</SCRIPT>";
    }
  }
  else
  {
     echo "<SCRIPT type='text/javascript'>alert('Service Sub Category Already Exist.');window.location.replace(\"addcategory.php\");</SCRIPT>";
  }

?>
