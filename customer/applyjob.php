<?php
	session_start();
	include '../connection.php';
	$lkey = $_COOKIE['lkey'];
	$filename = $_FILES['aadharfile']["name"];
	$jid=$_POST['jid'];
  $engkey=md5(microtime());
  $ekey=substr($engkey,0,8);
  $status=0;

	$sql3="insert into tb_jobapply(applykey,applyresume,applyloginid,applydate,applyjobid,applystatus) values 
	('".$ekey."','".$filename."','".$lkey."','".date('d-m-y')."','".$jid."','".$status."')";
  //echo $sql3;exit;
    
	$ex2=mysqli_query($conn,$sql3);

  if($ex2)
	{
	 $path="Uploads/".$ekey;
   mkdir($path,0777);
   move_uploaded_file($_FILES['aadharfile']["tmp_name"],$path."/".$_FILES['aadharfile']["name"]);
   echo "<SCRIPT type='text/javascript'>alert('Job Applied Successfully');
   window.location.replace(\"viewappliedjobs.php\");
   </SCRIPT>";
	}
	else
	{
   echo "<SCRIPT type='text/javascript'>alert('Job Application Submission Failed');
   window.location.replace(\"viewjobs.php\");
   </SCRIPT>";
  }  
?>
