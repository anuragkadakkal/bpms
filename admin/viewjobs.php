<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $sql = "select * from tb_jobs inner join tb_login on tb_login.id=tb_jobs.loginid where loginid='".$_COOKIE['lkey']."' order by jid desc";
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
                                            <td><?php $status = $row['jstatus'];
                                            if($status==0)
                                            { ?>
                                                <font color="red"><b>Not Active</b></font>&nbsp;&nbsp;
                                                 <a href="activatejob.php?t=<?php echo $row['jkey']; ?>"><button class="btn btn-outline-success">Activate</button></a>
                                 <?php      }
                                            else if($status==1)
                                            {   ?>
                                                <font color="green"><b>Active</b></font>&nbsp;&nbsp;
                                                <a href="blockjob.php?t=<?php echo $row['jkey']; ?>"><button class="btn btn-outline-danger">Block</button></a>
                                 <?php      } else { ?>
 

                                  <?php
                                 }   ?>


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