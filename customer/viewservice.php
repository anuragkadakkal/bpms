<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'customerheader.php';

  $sql = "select * from tb_servicecat  where delstatus!='1' order by catid desc ";// echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Service Category</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                             <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewservice.php" style="text-decoration:none" >Service Category Details</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
					                                  <th>Name</th>
                                            <th>Description</th>
                                            <th>Sub Category</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
					                                <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Sub Category</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
					                                  <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['catname']; ?></td>
                                            <td><?php echo $row['catdesc']; ?></td>
                                            <td><a href="viewservicesubcategory.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-primary">View</button></a></td>
                                            
                                        </tr>
                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php include 'customerfooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>