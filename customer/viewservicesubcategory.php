<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  $lkey=$_COOKIE['lkey'];
  $sql = "select * from tb_customer inner join tb_login on tb_login.id=tb_customer.loginid where loginid='".$lkey."'"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
    $fnamE=$row['fname'];
    $emaiL=$row['username'];
    $addR=$row['address'];
    $phonE=$row['phone'];
  }
  include 'customerheader.php';

  $catkey=$_GET['t'];
  $sql = "select * from tb_servicecat where catkey='".$catkey."'";
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
    $catid=$row['catid'];
  }

  $sql = "select * from tb_servicesubcat inner join tb_servicecat on tb_servicesubcat.catid=tb_servicecat.catid where tb_servicesubcat.delstatus!='1' and tb_servicesubcat.catid='".$catid."' and tb_servicesubcat.scatstatus!='0'";
  $result = mysqli_query($conn,$sql);

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Service Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewservice.php" style="text-decoration:none" >Service Category </a> | <a href="viewservicesubcategory.php?t=<?php echo $_GET['t']; ?>" style="text-decoration:none" >Availble Services</a></h6>
<!-- BreadCrubs End -->
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
                                               <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['scatid']; ?>">Book</button>
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
$sql="select * from tb_servicesubcat inner join tb_servicecat on tb_servicesubcat.catid=tb_servicecat.catid where tb_servicesubcat.delstatus!='1' and tb_servicesubcat.catid='".$catid."'";//echo $sql;exit;
$ret=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($ret)) {

?>
<!-- Modal -->
        <div class="modal fade" id="exampleModalCenter<?php echo $row['scatid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Appointment Registration<?php echo $row['scatid']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body"><form action="appointmentreg.php" method="post" id="myForm">
                     <input type="text" class="form-control" name="fname" placeholder="Full Name"  id="tnames" onkeyup="travelNames()" value="<?php echo $fnamE; ?>">
                     <span style="color: red;font-size: 14px" id="tna"></span> <br>
                     <input type="email" class="form-control" name="email" placeholder="Email ID"  id="email" onkeyup="emailUser()" value="<?php echo $emaiL; ?>">
                                        <span style="color: red;font-size: 14px" id="f3"></span> <br>
                     <textarea placeholder="Enter your Address here...." name="address" class="form-control" id="address" onkeyup="addrUser()"><?php echo $addR; ?></textarea>
                                        <span style="color: red;font-size: 14px" id="f4"></span><br>
                                        <label for="exampleInputEmail1">Appointment Date</label>
                     <input type="date" class="form-control"  name="apdate" id="sdate" onfocusout="startDate()">
                                                <span style="color: red;font-size: 14px" id="s1"></span>
                     <br>
                     <select class="form-control" name="slot" id="district" onclick="distUser()">
                      <option value="null">Select Time Slot</option>
                      <option value="9am - 10am">9am - 10am</option>
                      <option value="10am - 11am">10am - 11am</option>
                      <option value="11am - 12pm">11am - 12pm</option>
                      <option value="1pm - 2pm">1pm - 2pm</option> 
                     </select>
                     <span style="color: red;font-size: 14px" id="f7"></span>
                     <br>
                     <input type="phone" class="form-control" name="phone" placeholder="Phone Number" id="phone" onkeyup="phoneUser()" value="<?php echo $phonE; ?>">
                                                <span style="color: red;font-size: 14px" id="f5"></span>
                     <br>
                     <input type="hidden" name="userid" value="<?php echo $_COOKIE["lkey"]; ?>">
                     <input type="hidden" name="catid" value="<?php echo $row['catid'] ?>">
                     <input type="hidden" name="subcatid" value="<?php echo $row['scatid']; ?>">
                     <input type="hidden" name="amount" value="<?php echo $row['amt']; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="checkAlls()">Book</button>
                  </div></form>
            </div>
          </div>
        </div>
<?php } ?>
            <script type="text/javascript">
                function distUser() {

                    var f7 = document.getElementById("f7");
                    var district = document.getElementById('district').value;

                    if(district=="null")
                     {
                       f7.textContent = "**Select any Time Slot";
                       document.getElementById("district").focus();
                       return false;
                     }
                     else
                     {
                        f7.textContent = "";
                        return true;
                     }
                }

                function addrUser() {
                    var f4 = document.getElementById("f4");
                    var address = document.getElementById('address').value;

                    if (!/^[#.0-9a-zA-Z\s,-]{8,50}$/.test(address))
                     {
                       f4.textContent = "**Invalid Address Format";
                       document.getElementById("address").focus();
                       return false;
                     }
                     else
                     {
                        f4.textContent = "";
                        return true;
                     }
                }

                function phoneUser() {
                    var f5 = document.getElementById("f5");
                    var phone = document.getElementById('phone').value;

                    if(!/^[6-9]{1}[0-9]{9}$/.test(phone))
                     {
                       f5.textContent = "**Invalid Phone # Format";
                       document.getElementById("phone").focus();
                       return false;
                     }
                     else
                     {
                        f5.textContent = "";
                        return true;
                     }
                }


                function addDaysToDate(date, days)
                {
                    var res = new Date(date);
                    res.setDate(res.getDate() + days);
                    return res;
                }

                function startDate() {

                    var s1 = document.getElementById("s1");
                    var sdate = document.getElementById('sdate').value;
                    var myDate = new Date(sdate);
                    var today = new Date();

                    var afterdate = addDaysToDate(today, 3);
                    if(afterdate < myDate)
                    {
                        s1.textContent = "**Select Any Valid Appointment Date, 3 Days Booking Only";
                        document.getElementById("sdate").focus();
                        return false;
                    }

                    if ( myDate < today ) 
                    { 
                        s1.textContent = "**Select Any Valid Appointment Date, 3 Days Booking Only";
                        document.getElementById("sdate").focus();
                        return false;
                    }
                    else
                    {
                        s1.textContent = "";
                        return true;
                    }
                }


                function emailUser() {
                    var f3 = document.getElementById("f3");
                    var email = document.getElementById('email').value;

                    if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email))
                     {
                       f3.textContent = "**Invalid Email Format";
                       document.getElementById("email").focus();
                       return false;
                     }
                     else
                     {
                        f3.textContent = "";
                        return true;
                     }
                }

                function travelNames() {
                    var f1s = document.getElementById("tna");
                    var fname = document.getElementById('tnames').value;

                    if(!/^[A-Za-z ]{3,56}$/.test(fname))
                     {
                       f1s.textContent = "**Invalid Full Name";
                       var x = document.getElementById("tnames");
                       x.focus();
                       return false;
                     }
                     else
                     {
                        f1s.textContent = "";
                        return true;
                     }
                }

                

                function checkAlls(){
                if(travelNames()&&emailUser()&&addrUser()&&startDate()&&distUser()&&phoneUser())
                 {
                   document.getElementById("myForm").submit();
                 }
                 else
                 {
                    return false;
                 }
            }

            </script>
                <!-- /.container-fluid -->

            <?php include 'customerfooter.php'; }
    else
    {
        Header("location:../index.php");
    }
?>