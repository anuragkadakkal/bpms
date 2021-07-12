<?php
session_start();
 include('../connection.php');
	$fname=$_POST['fname'];
	$bkamt=$_POST['amount'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$apdate=$_POST['apdate'];
	$slot=$_POST['slot'];
	$phone=$_POST['phone'];
	$userid=$_POST['userid'];
	$catid=$_POST['catid'];
	$subcatid=$_POST['subcatid'];

	$k1=md5(microtime());
 	$k2=substr($k1,0,8);

 	$status=0;// 0=not viewed by admin, 1 - approved by admin, 2-rejected by admin

	$sql3="insert into tb_booking(bk_key,bk_fullname,bk_email,bk_address,bk_apdate,bk_timeslot,bk_phone,bk_catid,bk_subcatid,bk_amt,bk_status,bk_userid) values ('".$k2."','".$fname."','".$email."','".$address."','".$apdate."','".$slot."','".$phone."','".$catid."','".$subcatid."','".$bkamt."','".$status."','".$userid."')";//echo $sql3;exit;
$ex2=mysqli_query($conn,$sql3);

if($ex2)
	{
		$_SESSION['email'] = $email;
  		$_SESSION['bkkey'] = $k2;
        echo "<SCRIPT type='text/javascript'>window.location.replace(\"bookingmail.php\");</SCRIPT>";
	}
	else
	{
  echo "<SCRIPT type='text/javascript'>alert('Registration Failed');
   window.location.replace(\"viewcategory.php\");
   </SCRIPT>";
}