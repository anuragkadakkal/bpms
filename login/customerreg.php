<?php
  include '../connection.php';
  require "../sourcecode/vendor/autoload.php";
  require "../gcpstorage/vendor/autoload.php";

  use Google\Cloud\Vision\VisionClient;
  use Google\Cloud\Storage\StorageClient;

  $bName = "bpmsystemproject";
  function uploadObject($bucketName, $objectName, $source)
  {
      $projectId = "rising-sector-300309";
      $serviceAccountPath="honey.json";
      $config = [
        'keyFilePath' => $serviceAccountPath,
        'projectId' => $projectId,
        ];
      $storage = new StorageClient($config);
      $file = fopen($source, 'r');
      $bucket = $storage->bucket($bucketName);
      $object = $bucket->upload($file, [
          'name' => $objectName
      ]);
      //printf('Uploaded %s to gs://%s/%s' . PHP_EOL, basename($source), $bucketName, $objectName);
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $pass = md5($_POST['pass']);
  $conpass = $_POST['conpass'];
  $cno = $_POST['cardno'];
  $cnoz =strtoupper($cno);

  $k1=md5(microtime());
  $k2=substr($k1,0,8);
  $filename = $_FILES['aadharfile']["name"];
  $utype = 1;
  $status = 0;

  $vision = new VisionClient(['keyFile'=> json_decode(file_get_contents("../sourcecode/key.json"),true)]);
  $path = $_FILES['aadharfile']["tmp_name"];

  $familyPhotoResource = fopen($path, "r");
  //var_dump($familyPhotoResource);exit;

  $image = $vision->image($familyPhotoResource,['TEXT_DETECTION']);
  $result = $vision->annotate($image);

   /*Google Cloud Vision Ends*/

  $result = serialize($result);
  //var_dump($result);exit;

  $details = str_replace(' ', '', $result);
  $details = substr($details,0,2000);
  if((strpos($details,$cnoz) != false))
  {
    //echo "Card Number Found!";exit;
    $sql1="insert into tb_login(username,password,utype,status) values ('".$email."','".$pass."','".$utype."','".$status."')";
    $ex1=mysqli_query($conn,$sql1);

    $sql2="select id from tb_login where username='".$email."' and password='".$pass."'";
    $result = mysqli_query($conn,$sql2);
    while($row=mysqli_fetch_array($result))
    {
      $loginid=$row["id"];
    }

    $sql3="insert into tb_customer(custkey,fname,address,phone,proof,loginid) values ('".$k2."','".$name."','".$address."','".$phone."','".$filename."','".$loginid."')";//echo $sql3;exit;
    $ex2=mysqli_query($conn,$sql3);

    if($ex1 && $ex2)
    {
      $path="../admin/Uploads/".$k2;
      mkdir($path,0777);
      move_uploaded_file($_FILES['aadharfile']["tmp_name"],$path."/".$_FILES['aadharfile']["name"]);
      //uploadObject($bName,$k2."/".$_FILES['aadharfile']['name'],$_FILES['aadharfile']['tmp_name']);
      echo "<SCRIPT type='text/javascript'>alert('Registration Successfull');
      window.location.replace(\"login.php\");
      </SCRIPT>";
    }
    else
    {
      echo "<SCRIPT type='text/javascript'>alert('Registration Failed');
      window.location.replace(\"signup.php\");
      </SCRIPT>";
    }
  }
  else
  {
     //echo "Card Number Not Found!";exit;
     echo "<SCRIPT type='text/javascript'>alert('Card Number Doesn\'t Match With The Document Uploaded');
       window.location.replace(\"signup.php\");
       </SCRIPT>";
  }
?>