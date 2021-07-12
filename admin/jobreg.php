<?php
  session_start();
	include '../connection.php';
  $lkey = $_COOKIE['lkey'];

	$title = $_POST['title'];
	$qual = $_POST['qual'];
	$exp = $_POST['exp'];
	$jobtype = $_POST['jobtype'];
	$skil = $_POST['skil'];
	$ctc = $_POST['ctc'];
	$vac = $_POST['vac'];
	$ldate = $_POST['ldate'];
	$desc = mysqli_real_escape_string($conn,$_POST['desc']);

	$status = 1;

  $engkey=md5(microtime());
  $engineerkey=substr($engkey,0,8);

  $sql2="insert into tb_jobs(jkey,jtitle,jqual,jexp,jtype,jskills,jsalary,jnovacancy,jdate,jlastdate,jdesc,jstatus,loginid) values
		('".$engineerkey."','".$title."','".$qual."','".$exp."','".$jobtype."','".$skil."','".$ctc."','".$vac."','".date('d-m-y')."','".$ldate."','".$desc."','".$status."','".$lkey."')";
 //echo $sql2;exit;
 	$ex2=mysqli_query($conn,$sql2);


  if($ex2)
	{

    echo "<SCRIPT type='text/javascript'>alert('Job Posted Successfully.');window.location.replace(\"viewjobs.php\");</SCRIPT>";
	}
	else
	{
    echo "<SCRIPT type='text/javascript'>alert('Posting Job Failed.');window.location.replace(\"addjob.php\");</SCRIPT>";
  }

?>