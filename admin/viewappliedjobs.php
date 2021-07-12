<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql = "select * from tb_jobs inner join tb_jobapply on tb_jobs.jid=tb_jobapply.applyjobid inner join tb_customer on tb_customer.loginid=tb_jobapply.applyloginid inner join tb_login on tb_login.id=tb_customer.loginid where applystatus!='2'";
//echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">BPMS Applied Job</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewappliedjobs.php" style="text-decoration:none" >Job Details</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Job Title</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone #</th>
                                            <th>Apply Date</th>
                                            <th>Resume</th>
                                            <th>Status</th>
                                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Job Title</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone #</th>
                                            <th>Apply Date</th>
                                            <th>Resume</th>
                                            <th>Status</th>
                                            <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $c=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                            <td><?php echo $c++; ?></td>
                                            <td><?php echo $row['jtitle']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['applydate']; ?></td>
                                            <td><a href="../customer/Uploads/<?php echo $row['applykey']."/".$row['applyresume']; ?>" target='_blank'> <button class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i></button></a></td>
                                            <td><?php $c=$row['applyfeedback'];
                                            if($c==NULL)
                                            {
                                                echo "<font color='red'><b>NA</b></font>";
                                            }
                                            else if($c=='Approved')
                                            {
                                                echo "<font color='green'><b>Shortlisted Details Mailed</b></font>"; 
                                            }
                                            else
                                            {
                                                echo "<font color='blue'><b>".$row['applyfeedback']."</b></font>"; 
                                            }
                                        ?></td>
                                            <td>
                                            <?php $c=$row['applystatus'];
                                            if($c==0)
                                            { ?>
                                                <a href="approveapplication.php?t=<?php echo $row['applykey']; ?>"><button class="btn btn-outline-info">Approve</button></a>
                                                <a href="rejectapplication.php?t=<?php echo $row['applykey']; ?>"><button class="btn btn-outline-danger">Reject</button></a>
                                 <?php           }
                                            else
                                            {
                                                echo "<font color='blue'><b>NA</b></font>"; 
                                            }
                                        ?>
                                            </td>
                                        </tr>
                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            <?php include 'adminfooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>