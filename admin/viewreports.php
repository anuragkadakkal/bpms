<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql="select * from tb_attendance inner join tb_staffreg on tb_attendance.attendstaffid=tb_staffreg.loginid order by attendid desc"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Report Downloading</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                             <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewreports.php" style="text-decoration:none" >Product and Service Details</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                            <th>Report Type</th> 
                            <th>Select Details</th>
                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                            <th>Report Type</th> 
                            <th>Select Details</th>
                            <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<tr align="center">
    <td><span>Product Sales</span></td>
    <td>
        <form action="../fpdf/salesdetails.php" method="post" target='_blank'>
            <input type="text" name="rdate"  class="form-control input-sm" placeholder="Product Sales Date" onfocus="(this.type='date')" id="edate" onfocusout="endDate()" required="">     
    </td>
    <td><button class="btn btn-outline-success" type="submit" ><i class="fa fa-download" aria-hidden="true"></i>
</button></form> </td>                                        
</tr>

<tr align="center">
    <td><span>Service Sales</span></td>
    <td>
        <form action="../fpdf/salesservicedetails.php" method="post" target='_blank'>
            <input type="text" name="rdate"  class="form-control input-sm" placeholder="Service Sales Date" onfocus="(this.type='date')" id="edate" onfocusout="endDate()" required="">     
    </td>
    <td><button class="btn btn-outline-success" type="submit" ><i class="fa fa-download" aria-hidden="true"></i>
</button></form> </td>                                        
</tr>
                    
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