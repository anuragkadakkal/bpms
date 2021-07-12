<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $catkey=$_GET['t'];
  $sql = "select * from tb_category where catkey='".$catkey."'";
  $_SESSION["catkey"] = $catkey;
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
    $catid=$row['catid']; //echo $catid;
  }


  $sql = "select * from tb_subcat inner join tb_category on tb_category.catid=tb_subcat.catid where tb_subcat.catid='".$catid."' and tb_subcat.delstatus!='1'";
  //echo $sql;exit;
  //inner join order by tb_category.catid desc";
  $result = mysqli_query($conn,$sql);

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Product Category</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewcategory.php" style="text-decoration:none" >Product Category Details</a> | <a href="viewsubcategory.php?t=<?php echo $_GET['t']; ?>" style="text-decoration:none" >Product Details</a></h6>
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
                                            <th>Mfg.</th>
                                            <th>Exp.</th>
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
                                            <th>Mfg.</th>
                                            <th>Exp.</th>
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
                                            <td><?php echo $row['mfg']; ?></td>
                                            <td><?php echo $row['exp']; ?></td>
                                            <td><img src="Uploads/<?php echo $row['scatkey']."/".$row['image']; ?>" height="250px" width="250px"></td>
                                            <td><?php echo $row['amt']." INR"; ?></td>
                                            <td><?php $status = $row['scatstatus'];
                                            if($status==0)
                                            { ?>
                                               <font color="red"><b>Not Available</b></font>&nbsp;&nbsp;<a href="showsubcategory.php?t=<?php echo $row['scatkey']; ?>"><button class="btn btn-outline-success">Show</button></a>
                                               <a href="deletesubcategory.php?t=<?php echo $row['scatkey']; ?>"><button class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button></a>&nbsp;&nbsp;<a href="updatesubcategory.php?t=<?php echo $row['scatkey']; ?>"><button class="btn btn-outline-success">Update</button></a>
                                 <?php      }
                                            else
                                            {   ?>
                                               <font color="green"><b>Available</b></font>&nbsp;&nbsp;<a href="hidesubcategory.php?t=<?php echo $row['scatkey']; ?>"><button class="btn btn-outline-danger">Hide</button></a>
                                               <a href="deletesubcategory.php?t=<?php echo $row['scatkey']; ?>"><button class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button></a>&nbsp;&nbsp;<a href="updatesubcategory.php?t=<?php echo $row['scatkey']; ?>"><button class="btn btn-outline-success">Update</button></a>
                                 <?php      }    ?>


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