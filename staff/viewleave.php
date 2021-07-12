<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'staffheader.php';

  $sql="select * from tb_leave where lvuserid='".$_COOKIE['lkey']."' order by lvid desc"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Leave Status</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                                        <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewleave.php" style="text-decoration:none" >Leave Status</a></h6>
<!-- BreadCrubs End -->       
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Date</th>
                            <th>Purpose</th> 
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Feedback</th>
                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>#</th>
                            <th>Purpose</th> 
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Feedback</th>
                            <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php  while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                                      <td><?php echo $row['applydate']; ?></td>
                                            <td><?php echo $row['lvpurpose']; ?></td>
                                            <td><?php echo $row['lvstartdate']; ?></td>
                                            <td><?php echo $row['lvenddate']; ?></td>
                                            <td><font color="green"><b><?php echo $row['lvfeedback']; ?></b></font></td>
                            <td><?php  $s=$row['status'];
                            if($s==0)
                            { ?>
                                <a href="deleteleave.php?t=<?php echo $row['lvkey']; ?>"><button class="btn btn-outline-danger">Delete</button></a>
                    <?php        } if($s==1)
                            { ?>
                                <font color="violet"><b>Approved</b></font>

                                <a href="../fpdf/approvestatus.php?t=<?php echo $row['lvkey']; ?>"><button class="btn btn-outline-success" type="submit" ><i class="fa fa-download" aria-hidden="true"></i>
</button></a>
                    <?php        } if($s==2)
                            { ?>
                                <font color="red"><b>Rejected</b></font>
                    <?php        } if($s==3)
                            { ?>
                                <font color="red"><b>Deleted</b></font>
                    <?php        } ?>


                                            </td>
                    
                                            
                                        </tr>
                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php include 'stafffooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>