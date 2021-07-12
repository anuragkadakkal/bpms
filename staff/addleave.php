<?php
    session_start();
    include '../connection.php';

    $loginid = $_COOKIE['lkey'];
    $desc = $_POST['desc'];
    $tdate = $_POST['tdate'];
    $rdate = $_POST['rdate'];

    $status = 0;
    $delstatus = 0;
    $curdate = date("Y-m-d h:i:s A");
    $times=date('Y-m-d');

    $fkey = md5(microtime());
    $key = substr($fkey,0,8);
  
    $sql3 = "insert into tb_leave (lvkey,lvuserid,lvpurpose,lvstartdate,lvenddate,curdate,status,applydate,lvfeedback) values ('".$key."','".$loginid."','".$desc."','".$tdate."','".$rdate."','".$times."','".$status  ."','".$curdate."','Not Viewed')";//echo $sql3;exit;
    $ex2 = mysqli_query($conn,$sql3);
 
    if($ex2)
    {
        echo "<SCRIPT type='text/javascript'>alert('Leave Applied Successfully');window.location.replace(\"viewleave.php\");</SCRIPT>"; 
    }
    else
    {
      echo "<SCRIPT type='text/javascript'>alert('Failed');
       window.location.replace(\"applyleave.php\");
       </SCRIPT>";
    }

?>