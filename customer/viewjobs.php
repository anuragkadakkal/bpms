<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'customerheader.php';

  $sql = "select * from tb_jobs where jstatus!='0' order by jid desc";
  //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">BPMS Job Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                             <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewjobs.php" style="text-decoration:none" >Job Details</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Qualification</th>
                                        <th>Experience</th>
                                        <th>Type</th>
                                        <th>Skills</th>
                                        <th>Salary</th>
                                        <th>Vacancy</th>
                                        <th>Last Date</th>
                                        <th>Description</th>
                                        <th>Links</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>#</th>
                                          <th>Job Title</th>
                                          <th>Qualification</th>
                                          <th>Experience</th>
                                          <th>Type</th>
                                          <th>Skills</th>
                                          <th>Salary</th>
                                          <th>Vacancy</th>
                                          <th>Last Date</th>
                                          <th>Description</th>
                                          <th>Links</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                      <?php $c=1; while ($row=mysqli_fetch_array($result))
                      {  ?>
                                        <tr>
                                            <td><?php echo $c++; ?></td>
                                            <td><?php echo $row['jtitle']; ?></td>
                                            <td><?php echo $row['jqual']; ?></td>
                                            <td><?php echo $row['jexp']; ?></td>
                                            <td><?php echo $row['jtype']; ?></td>
                                            <td><?php echo $row['jskills']; ?></td>
                                            <td><?php echo $row['jsalary']; ?></td>
                                            <td><?php echo $row['jnovacancy']; ?></td>
                                            <td><?php echo $row['jlastdate']; ?></td>
                                            <td><?php echo $row['jdesc']; ?></td>
                                            <td>
                                                <?php $k=$row['jkey']; $flag=0;
                                                      $jid=$row['jid'];
                                                      $sql2 = "select * from tb_jobapply where applyjobid='".$jid."' and applyloginid='".$_COOKIE['lkey']."'";
                                                      $r = mysqli_query($conn,$sql2);
                                                      while ($row=mysqli_fetch_array($r))
                                                      {
                                                        $flag=1;
                                                      }
                                                      if($flag==0)
                                                      { ?>
                                                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $k; ?>">Apply<br>Online</button>
                                               <?php  }
                                                      else
                                                      {
                                                        echo "<font color='green'><b>Already Applied</b></font>"; 
                                                      }
                                                ?>
                                            </td>
                                        </tr>
                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<?php               


$sql="select * from tb_jobs where jstatus!='0' order by jid desc";//echo $sql;exit;
$ret=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($ret)) {

?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $row['jkey'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Job Application - <?php echo $row['jtitle']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><form action="applyjob.php" method="post" enctype="multipart/form-data" id="myFormz">
         <input type="text" class="form-control" id="fname" name="fname" placeholder="Full Name" required="true" value="<?php echo $fullname; ?>" readonly> <br>
        <label for="exampleInputEmail1">Resume [.pdf]</label>

         <input type="file" class="form-control" name="aadharfile" id="filez" onchange="fileCheckz()">
        <span style="color: red;font-size: 14px" id="f8z"></span>
         <input type="hidden" name="jid" value="<?php echo $row['jid']; ?>">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="checkAlls()">Apply</button>
      </div></form>
    </div>
  </div>
</div>
<script type="text/javascript">
    function fileCheckz() {

        var f8z = document.getElementById("f8z");
        var filez = document.getElementById('filez').value;

        var filez=filez.split('.').pop();
        if(filez!="pdf")
         {
            f8z.textContent = "**Select PDF File";
            document.getElementById("filez").focus();
            return false;
         }
         else
         {
            f8z.textContent = "";
            return true;
         }
    }

    function checkAlls(){
        if(fileCheckz())
         {
           document.getElementById("myFormz").submit();
         }
         else
         {
            return false;
         }
    }
</script>
<?php } ?>

            <?php include 'customerfooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>