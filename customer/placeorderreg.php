<?php
    session_start();
    include '../connection.php';

    $loginid = $_COOKIE['lkey'];
    $foods= $_POST['fooditems'];
    $len=strlen($foods);
    $foods=substr($foods,0,$len-3);
    $totprice=$_POST['totprice'];

    $status = 0;
    $k1=md5(microtime());
    $filekey=substr($k1,0,8);
    date_default_timezone_set('Asia/Kolkata');
    $curdate = date('Y-m-d');
    //echo "<br>".$curdate;exit;
    

    $sql="insert into tb_productbookings (pbkey,pbitems,pbamount,pbdate,pbuserid,pbstatus) values ('".$filekey."','".$foods."','".$totprice."','".$curdate."','".$loginid."','".$status."')"; 
    //echo $sql;exit;
    $ex1=mysqli_query($conn,$sql);


    if($ex1)
  	{
      unset($_SESSION["cart_item"]);
      echo "<SCRIPT type='text/javascript'>alert('Product Order Successfully Placed');
       window.location.replace(\"productbookings.php\");
       </SCRIPT>";
  	}
  	else
  	{
      echo "<SCRIPT type='text/javascript'>alert('Order Failed');
       window.location.replace(\"viewproducts.php\");
       </SCRIPT>";
    }

?>
