<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql = "select * from tb_category where tb_category.delstatus!='1' order by tb_category.catid desc "; //echo $sql;exit;
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
                             <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewcategory.php" style="text-decoration:none" >Product Category Details</a></h6>
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
                                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
					                                <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Sub Category</th>
                                            <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
					                                  <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['catname']; ?></td>
                                            <td><?php echo $row['catdesc']; ?>&nbsp;&nbsp;<a href="updatecat.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-info">Update</button></a>
                                                 </td>
                                            <td><a href="addsubcat.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-primary">Add</button></a>&nbsp;&nbsp;
                                                 <a href="viewsubcategory.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-danger">View</button></a></td>
                                            <td><?php $status = $row['catstatus'];
                                            if($status==0)
                                            { ?>
                                               <font color="red"><b>Not Available</b></font>&nbsp;&nbsp;<a href="showcategory.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-success">Show</button></a>
                                               <a href="deletecategory.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button></a>
                                 <?php      }
                                            else
                                            {   ?>
                                               <font color="green"><b>Available</b></font>&nbsp;&nbsp;<a href="hidecategory.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-warning">Hide</button></a>
                                               <a href="deletecategory.php?t=<?php echo $row['catkey']; ?>"><button class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button></a>
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