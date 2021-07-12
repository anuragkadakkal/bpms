<?php 
    session_start();
    include 'connection.php';
    $usr = $_POST["username"];
    $en = md5($_POST["pass"]);

    $sql="select id,status,utype,atstatus from tb_login where username='".$usr."' and password='".$en."'";//echo $sql;exit;

    $result = mysqli_query($conn,$sql);
    $a=0;
    while ($row=mysqli_fetch_array($result))
    {
        $a++;
        $b=$row['id'];
        $c=$row['utype'];
        $d=$row['status'];
        $att=$row['atstatus'];
    }
    if($a>0)
    {
        if($d==1)
        {

            $_SESSION['lkey']=$b;
            setcookie("lkey",$b);
            setcookie("logined",1);
            if ($c==0)
            {
                $_SESSION["em"] = $usr;
                //header("location:admin/adminhome.php");
                echo "<SCRIPT type='text/javascript'>alert('Use Google Authenticator For Authentication');
                window.location.replace(\"auth/index.php\");</SCRIPT>";
                
            }
            else if($c==1)
            {
                $_SESSION["logined"] = 1;
                header("location:customer/");
            }
            else
            {
                if($att!=date('Y-m-d'))
                { 
                    echo "<SCRIPT type='text/javascript'>
            window.location.replace(\"login/punchin.php\");
            </SCRIPT>";
                }
                else
                {
                    $_SESSION["logined"] = 1;
                    header("location:staff/");
                }
                
            }
        }
        else if ($d==2)
        {
            echo "<SCRIPT type='text/javascript'>alert('Access Denied.....!!');
            window.location.replace(\"login/login.php\");
            </SCRIPT>";
        }
        else
        {
            echo "<SCRIPT type='text/javascript'>alert('Admin Permission Required.....!!');
            window.location.replace(\"login/login.php\");
            </SCRIPT>";
        }
    }
    else
    {
        echo "<SCRIPT type='text/javascript'>alert('Invalid Login Credentials');
        window.location.replace(\"login/login.php\");
        </SCRIPT>";
    }

?>

    
  
 ?>