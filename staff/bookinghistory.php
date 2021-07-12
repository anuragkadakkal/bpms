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
                            <th>Service Name</th>
                            <th>Booking Date - Time Slot</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Links</th> </tr> </thead> <tbody>
<?php
$sql="select * from tb_booking inner join tb_servicecat on tb_servicecat.catid=tb_booking.bk_catid inner join tb_servicesubcat on tb_servicesubcat.scatid=tb_booking.bk_subcatid where bk_userid='".$_COOKIE['lkey']."'"; //echo $sql;exit;
$ret=mysqli_query($conn,$sql);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

            <tr> 
                    <th scope="row"><?php echo $cnt;?></th> 
                    <td><?php  echo $row['bk_fullname'];?></td> 
                    <td><?php  echo $row['bk_address'];?></td>

                    <td><?php  echo $row['catname']." - ".$row['scatname'];?></td>

                    <td><?php  echo $row['bk_apdate']." - ".$row['bk_timeslot'];?></td>
                    <td><?php  echo $row['bk_amt'];?></td>
                    <td><?php  $f=$row['bk_feedback'];
if($f==NULL)
{
    echo "<b>NA</b>";
}
else
{
    echo "<b><font color='pink'>".$f."</font></b>";
}




                    ?></td>
                    <td><?php  $s=$row['bk_status'];
if($s==0)
{
    echo "<b>Not Paid</b>"; ?>&nbsp; <a href="../mbilpay/index.php?t=<?php echo $row['bk_key']; ?>">
    <button type="button" class="btn btn-outline-success">Pay</button></a> <?php
}
else
{
    echo "<b><font color='green'>Paid</font></b>"; ?>&nbsp; <a href="../fpdf/servicebillpaid.php?t=<?php echo $row['bk_key']; ?>" download>
    <button type="button" class="btn btn-outline-success" ><i class="fas fa-download">&nbsp;Reciept</i></button></a> <?php
    
 }
                 ?></td> </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php include 'customerfooter.php'; ?>
