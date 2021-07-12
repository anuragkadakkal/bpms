<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
    include '../connection.php';
    include 'customerheader.php';
    include 'customermainhome.php';
    include 'customerfooter.php';
   }
    else
    {
        Header("location:../index.php");
    }
?>