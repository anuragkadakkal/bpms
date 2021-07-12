<?php 
    require "vendor/autoload.php";

    use Google\Cloud\Vision\VisionClient;
    $vision = new VisionClient(['keyFile'=> json_decode(file_get_contents("key.json"),true)]);
    $path = $_FILES['aadharfile']["tmp_name"];

    $familyPhotoResource = fopen($path, "r");
    //var_dump($familyPhotoResource);exit;

    $image = $vision->image($familyPhotoResource,['TEXT_DETECTION']);
    $result = $vision->annotate($image);
    var_dump($result);