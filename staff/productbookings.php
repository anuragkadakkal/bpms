<?php
  include '../connection.php';
  include 'customerheader.php';

  //$result = mysqli_query($conn,$sql);
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
                                <table class="table table-bordered"> <thead> <tr> 
                                        <th>#</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Phone #</th>
                                            <th>Items</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Links</th> </tr> </thead>
                                             <tbody>
<?php
$sql = "select * from tb_productbookings inner join tb_customer on tb_productbookings.pbuserid=tb_customer.loginid inner join tb_login on tb_login.id=tb_customer.loginid where pbuserid='".$_COOKIE['lkey']."'";
                                  $ret=mysqli_query($conn,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
    <td><?php echo $cnt; ?></td>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['pbitems']; ?></td>
    <td><?php echo $row['pbamount']; ?></td>
    <td><?php  $f=$row['pb_feedback'];
if($f==NULL)
{
    echo "<font color='red'>NA</font>";
}
else
{
    echo "<b><font color='pink'>".$f."</font></b>";
}




                    ?></td>
    <td>
<?php 
  $s=$row['pbstatus'];
if($s==0)
 {
   echo "<b>Aproval Pending</b>"; ?>&nbsp; 
 <a href='../fpdf/productbillnotpaid.php?t=<?php echo $row['pbkey']; ?>' download>
   <button class="btn btn-outline-success"><i class="fas fa-download"></i></button></a> &nbsp;
            <button type="button" class="btn btn-outline-danger">Cancel</button></a>
  <?php      } 
                    
if($s==1)
 { ?>
   <a href="../pbilpay/index.php?t=<?php echo $row['pbkey']; ?>">
            <button type="button" class="btn btn-outline-success">Pay</button></a>&nbsp;
            <a href='../fpdf/productbillnotpaid.php?t=<?php echo $row['pbkey']; ?>' download>
            <button type="button" class="btn btn-outline-success"><i class="fas fa-download"></i></button></a> &nbsp;
            <a href="cancelorder.php?t=<?php echo $row['pbkey']; ?>"><button type="button" class="btn btn-outline-danger">Cancel</button></a> 
  <?php      } 
if($s==2)
 { echo "<b><font color='red'>Item Not Availble</font></b>";   } 
if($s==3)
 { echo "<b><font color='red'>Order Cancelled</font></b>";   }                  
if($s==4)
 { 
echo "<b><font color='green'>Paid</font></b>"; ?>&nbsp;
        <a href='../fpdf/productbillpaid.php?t=<?php echo $row['pbkey']; ?>' download><button type="button" class="btn btn-outline-success"><i class="fas fa-download"></i></button></a>    
    
    
    <?php  }                    
?>  
    
    
    
    </td>
</tr>
               <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php include 'customerfooter.php'; ?>
