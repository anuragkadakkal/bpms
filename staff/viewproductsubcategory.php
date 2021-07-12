<?php session_start();
  include '../connection.php';
  include 'customerheader.php';

  $catkey=$_GET['t'];
  
  $sql = "select * from tb_category where catkey='".$catkey."'";
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
    $catid=$row['catid'];
  }

  $sql = "select * from tb_subcat inner join tb_category on tb_subcat.catid=tb_category.catid where tb_subcat.delstatus!='1' and tb_subcat.catid='".$catid."'";
  $result = mysqli_query($conn,$sql);

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Product Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Availble Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Description</th>
                                            <th>image</th>
                                            <th>Price</th>
                                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
					                                <th>#</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Description</th>
                                            <th>image</th>
                                            <th>Price</th>
                                            <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
					                                  <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['catname']; ?></td>
                                            <td><?php echo $row['scatname']; ?></td>
                                            <td><?php echo $row['scatdesc']; ?></td>
                                            <td><img src="../admin/Uploads/<?php echo $row['scatkey']."/".$row['image']; ?>" height="250px" width="250px"></td>
                                            <td><?php echo $row['amt']." INR"; ?></td>
                                            <td>
                                               <button class="btn btn-outline-primary" >Order</button>
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

            <?php include 'customerfooter.php'; ?>
