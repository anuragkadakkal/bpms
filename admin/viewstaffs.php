<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql = "select * from tb_staffreg inner join tb_login on tb_login.id=tb_staffreg.loginid where delstatus!='1'";
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">
                    BPMS Staff Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                 <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="addstaff.php" style="text-decoration:none" >Staff Details</a></h6>
<!-- BreadCrubs End -->
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
					    <th>Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>District</th>
                                            <th>Pincode</th>
                                            <th>Phone #</th>
                                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Name</th>
                                          <th>Address</th>
                                          <th>Email</th>
                                          <th>District</th>
                                          <th>Pincode</th>
                                          <th>Phone #</th>
                                          <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                            <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['district']; ?></td>
                                            <td><?php echo $row['pincode']; ?></td>
                                            <td><?php echo $row['phno']; ?></td>
                                            <td><?php $status = $row['status'];
                                            if($status==0)
                                            { ?>
                                <font color="red"><b>Not Active</b></font>&nbsp;&nbsp;
                          <a href="activatstaff.php?t=<?php echo $row['engkey']; ?>"><button class="btn btn-outline-success">Activate</button></a>
                          <a href="deletestaff.php?t=<?php echo $row['engkey']; ?>"><button class="btn btn-outline-warning">Delete</button></a>
                                 <?php      }
                                            else if($status==1)
                                            {   ?>
                                <font color="green"><b>Active</b></font>&nbsp;&nbsp;
                          <a href="blockstaff.php?t=<?php echo $row['engkey']; ?>"><button class="btn btn-outline-danger">Block</button></a>
                          <a href="deletestaff.php?t=<?php echo $row['engkey']; ?>"><button class="btn btn-outline-warning">Delete</button></a>
                                 <?php      } else { ?>
 

                                  <?php
                                 }   ?>


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

            <?php include 'adminfooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>