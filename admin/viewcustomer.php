<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql = "select * from tb_customer inner join tb_login on tb_login.id=tb_customer.loginid where delstatus!='1'";
  $result = mysqli_query($conn,$sql);
?>

<style type="text/css">
  
      .iframe-container {    
    padding-bottom: 60%;
    padding-top: 30px; height: 0; overflow: hidden;
}
 
.iframe-container iframe,
.iframe-container object,
.iframe-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">BPMS Customer Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewcustomer.php" style="text-decoration:none" >Customer Details</a></h6>
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
                                          <th>Phone #</th>
                                          <th>Proof</th>
                                          <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Name</th>
                                          <th>Address</th>
                                          <th>Email</th>
                                          <th>Phone #</th>
                                          <th>Proof</th>
                                          <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                            <td><?php echo $row['fname'];?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><a href="Uploads/<?php echo $row['custkey']."/".$row['proof'];?>" target='_blank'><i class="fas fa-download"></i></a> </td>
                                            <td><?php $status = $row['status'];
                                            if($status==0)
                                            { ?>
                          <a href="adduser.php?t=<?php echo $row['custkey']; ?>"><button class="btn btn-outline-success">Approve</button></a>
                          <a href="rejectuser.php?t=<?php echo $row['custkey']; ?>"><button class="btn btn-outline-danger">Reject</button></a>
                                 <?php      }
                                            else if($status==1)
                                            {   ?>

                          <a href="rejectuser.php?t=<?php echo $row['custkey']; ?>"><button class="btn btn-outline-danger">Reject</button></a>
                                                          <font color="green"><b>Active</b></font>&nbsp;&nbsp;
                                 <?php      } else { ?>

                          <a href="adduser.php?t=<?php echo $row['custkey']; ?>"><button class="btn btn-outline-success">Approve</button></a>
                           <font color="red"><b>Inactive</b></font>&nbsp;&nbsp;

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
<!-- <div class="container">
    <div class="row">
    <h2>Showing PDF in popup modal preview using Bootstrap Easy Modal Plugin</h2>
        <a class="btn btn-primary view-pdf" href="http://www.bodossaki.gr/userfiles/file/dummy.pdf">View PDF</a>        
  </div>
</div> -->
                </div>
                <!-- /.container-fluid -->


            <?php include 'adminfooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>