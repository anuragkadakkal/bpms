<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'staffheader.php';

  $sql="select * from tb_assignwork inner join tb_staffreg on tb_staffreg.engid=tb_assignwork.wkstaffid inner join tb_booking on tb_booking.bk_key=tb_assignwork.wkbkkey inner join tb_servicesubcat on tb_servicesubcat.scatid=tb_booking.bk_subcatid where dateonly='".date('Y-m-d')."' order by wkid desc"; //echo $sql;exit;
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
</a> | <a href="viewservice.php" style="text-decoration:none" >Service Details</a></h6>
<!-- BreadCrubs End -->
                        
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>#</th>
                                           <th>Booking ID</th>
                            <th>Full Name</th> 
                            <th>Address</th>
                            <th>Service Name</th>
                            <th>Booking Date - Time Slot</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Mark As</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>#</th>
                                           <th>Booking ID</th>
                            <th>Full Name</th> 
                            <th>Address</th>
                            <th>Service Name</th>
                            <th>Booking Date - Time Slot</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Mark As</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                                      <td><?php echo $count++; ?></td>
                                                       <td><?php echo $row['bk_key']; ?></td>
                                            <td><?php echo $row['bk_fullname']; ?></td>
                                            <td><?php echo $row['bk_address']; ?></td>
                                            <td><?php  echo $row['scatname'];?></td>

                    <td><?php  echo $row['bk_apdate']." - ".$row['bk_timeslot'];?></td>
                    <td><?php  echo $row['wkdesc'];?></td>
                   
                                            <td><?php  $s=$row['wkstatus'];
if($s==0)
{
    echo "<b><font color='red'>Pending</font></b>"; 
}
if($s==1)
{

    echo "<b><font color='red'>In Progress</font></b>";
}
if($s==2)
{

    echo "<b><font color='red'>Completed</font></b>";
}
?> </td>
                                   <td><?php  $s=$row['wkstatus'];
if($s==0)
{ ?>
    <a href="inprogress.php?t=<?php echo $row['wkkey']; ?>"><button class="btn btn-outline-info">In Progress</button></a> 

<?php }
if($s==1)
{ ?>

    <a href="completed.php?t=<?php echo $row['wkkey']; ?>"><button class="btn btn-outline-info">Completed</button></a> 
<?php 
}
if($s==2)
{ 

    echo "<b><font color='red'>Completed</font></b>";

}
?> </td>        
                                        </tr>
                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php include 'stafffooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>