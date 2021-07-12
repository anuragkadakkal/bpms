<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'staffheader.php';

  $sql="select * from tb_attendance inner join tb_staffreg on tb_attendance.attendstaffid=tb_staffreg.loginid where attendstaffid='".$_COOKIE['lkey']."' order by attendid desc"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Attendance</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
<!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewattendance.php" style="text-decoration:none" >Attendance Details</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>#</th>
                            <th>Full Name</th> 
                            <th>Punch In</th>
                            <th>Punch Out</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>#</th>
                            <th>Full Name</th> 
                            <th>Punch In</th>
                            <th>Punch Out</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                                      <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                            <td><?php echo $row['punchin']; ?></td>
                                            <td><?php  $pout=$row['punchout'];
                                                if($pout=='')
                                                { ?>
                                                    <a href="punchout.php?t=<?php echo $row['attendkey']; ?>"><button class="btn btn-outline-danger">Punch Out</button></a>
                                        <?php        }
                                        else
                                        { ?>
                                        <font color="green"><b><?php echo $pout; ?></b></font>
                                   <?php      }



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
                <!-- /.container-fluid -->

            <?php include 'stafffooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>