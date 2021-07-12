<?php
session_start();
unset($_SESSION["cart_item"]);
  include '../connection.php';
  include 'customerheader.php';

  $lkey=$_COOKIE['lkey'];
  $sql = "select * from tb_customer inner join tb_login on tb_customer.loginid=tb_login.id where id='".$lkey."'"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
      $_SESSION['fname']=$row['fname'];
      $_SESSION['address']=$row['address'];
      $_SESSION['phone']=$row['phone'];
      $_SESSION['username']=$row['username'];
      $_SESSION['custkey']=$row['custkey'];
  }


  $sql = "select * from tb_category  where delstatus!='1' order by catid desc ";// echo $sql;exit;
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
                            <h6 class="m-0 font-weight-bold text-primary">Service Category Details</h6>
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
                                            <td><a href="productbuys.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-primary">View</button></a></td><!-- viewproductsubcategory.php -->
                                            
                                        </tr>
                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php include 'customerfooter.php'; ?>
