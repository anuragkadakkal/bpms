<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql="select * from tb_productbookings inner join tb_customer on tb_productbookings.pbuserid=tb_customer.loginid inner join tb_login on tb_login.id=tb_customer.loginid"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Product Booking History</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                             <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="productbookinghistory.php" style="text-decoration:none" >Product Booking History</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>#</th>
                            <th>Full Name</th> 
                            <th>Address</th>
                            <th>Product(s) Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>#</th>
                            <th>Full Name</th> 
                            <th>Address</th>
                            <th>Product(s) Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                                      <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php  echo $row['pbitems'];?></td>

                    <td><?php  echo $row['pbamount'];?></td>
                    <td><?php  $f=$row['pb_feedback'];
if($f==NULL)
{
    echo "<b>NA</b>";
}
else
{
    echo "<b><font color='pink'>".$f."</font></b>";
}




                    ?></td>
                                            <td><?php  $s=$row['pbstatus'];
if($s==0)
{ ?>
    <a href="approveproductorder.php?t=<?php echo $row['pbkey'];?>"><button type="button" class="btn btn-outline-success" >Approve</button></a>
    <a href="rejectproductorder.php?t=<?php echo $row['pbkey'];?>"><button type="button" class="btn btn-outline-danger" >&nbsp;Reject</button></a>
    <a href="../fpdf/productbillnotpaid.php?t=<?php echo $row['pbkey']; ?>" download>
    <button type="button" class="btn btn-outline-success" ><i class="fas fa-download">&nbsp;Reciept</i></button></a> <?php
}
if($s==1)
{
    echo "<b><font color='red'>Payment Pending</font></b>";  ?> <a href="rejectproductorder.php?t=<?php echo $row['pbkey'];?>"><button type="button" class="btn btn-outline-danger" >&nbsp;Reject</button></a>&nbsp;<a href="../fpdf/productbillnotpaid.php?t=<?php echo $row['pbkey']; ?>" download>
    <button type="button" class="btn btn-outline-success" ><i class="fas fa-download">&nbsp;Reciept</i></button></a> <?php
    
 }
 if($s==2)
{
    echo "<b><font color='red'>Rejected</font></b>"; 
}
if($s==3)
{
    echo "<b><font color='red'>Order Cancelled By User</font></b>"; 
}
if($s==4)
{
    echo "<b><font color='green'>Paid</font></b>&nbsp;"; ?><a href="../fpdf/productbillpaid.php?t=<?php echo $row['pbkey']; ?>" download>
    <button type="button" class="btn btn-outline-success" ><i class="fas fa-download">&nbsp;Reciept</i></button></a> <?php 
}
                 ?></td>
                                            
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