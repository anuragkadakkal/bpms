<?php
    session_start();
    //https://myaccount.google.com/u/0/lesssecureapps - Turn on less secure apps
    include '../connection.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";

    $jobkey = $_SESSION['jobkey'];
    $sql="select * from tb_jobapply inner join tb_customer on tb_customer.loginid=tb_jobapply.applyloginid inner join tb_login on tb_login.id=tb_customer.loginid inner join tb_jobs on tb_jobs.jid=tb_jobapply.applyjobid where applykey='".$jobkey."'";
    $result = mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result))
    {
      $email=$row['username'];
      $name=$row['fname'];
    }


    $mail->IsHTML(true);
    $mail->AddAddress($email,"");
    $mail->SetFrom("otpforfree@gmail.com", "KL-FREEOTP");
    $mail->Subject = "BPMS - JOB Interview Shortlisted";

   

    $content = "<font color='green'><b><h1>Congratulations ".$name.",</h1><h2><br> Your Job Application Approved<h2><hr><br><br>Our Team Will Contact You Shortly<hr></b></font>"; 

    $mail->MsgHTML($content);
    if(!$mail->Send())
    {
      //echo "Error while sending Email.";
      //var_dump($mail);
    }
    else
    {
      echo "<script>alert('Shortlisted Mail Sent Successfully.');window.location.href='viewappliedjobs.php';</script>";
    }
?>
