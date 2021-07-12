<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'customerheader.php';

  $sql = "select * from tb_customer inner join tb_login where tb_login.id=tb_customer.loginid and tb_customer.loginid='".$_COOKIE['lkey']."'";//echo $sql;exit;
  $result = mysqli_query($conn,$sql);
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Update Customer Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="editcustomer.php" style="text-decoration:none" >Update Profile</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body" >

                          <?php while ($row=mysqli_fetch_array($result))
                          {  ?>
                          <form role="form" action="updateuserreg.php?t=<?php echo $row['custkey']; ?>" method="post" >
              			    			<div class="row">
              			    				<div class="col-xs-6 col-sm-6 col-md-6">
              			    					<div class="form-group">
              			           <input type="text" name="fname" class="form-control input-sm" placeholder="First Name" value="<?php echo $row['fname']; ?>" id="fname" onkeyup="firstName()">
                                    <span style="color: red;font-size: 14px" id="f1"></span>

              			    					</div>
              			    				</div>
              			    				<div class="col-xs-6 col-sm-6 col-md-6">
              			    					<div class="form-group">
              			    	<input type="email" name="emails" class="form-control input-sm" placeholder="Email" value="<?php echo $row['username']; ?>" id="email" onkeyup="emailUser()" readonly>
                            <span style="color: red;font-size: 14px" id="f3"></span>

              			    					</div>
              			    				</div>
              			    			</div>



              			    			<div class="form-group">
              			    				<textarea rows="2" name="address" class="form-control input-sm" placeholder="Address" id="address" onkeyup="addrUser()"><?php echo $row['address']; ?></textarea>
                            <span style="color: red;font-size: 14px" id="f4"></span>

              			    			</div>

                              <input type="hidden" name="userid" value="<?php echo $_COOKIE['lkey']; ?>">

                              <div class="form-group">
                                <input type="text" name="phno" class="form-control input-sm" placeholder="Phone Number" value="<?php echo $row['phone']; ?>" id="phone" onkeyup="phoneUser()">
                                    <span style="color: red;font-size: 14px" id="f5"></span>
                              </div>

              			    			


                             	<input type="submit" value="Update" class="btn btn-info btn-block" onclick="return checkAll()"> 

              			    		</form>
<?php } ?>


                        </div>
                    </div>

                </div>

<script type="text/javascript">
    
    function firstName() {
        var f1 = document.getElementById("f1");
        var fname = document.getElementById('fname').value;

        if(!/^[A-Za-z ]{3,66}$/.test(fname))
         {
           f1.textContent = "**Invalid First Name";
           var x = document.getElementById("fname");
           x.focus();
           return false;
         }
         else
         {
            f1.textContent = "";
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


  

    function checkAll() {

        if(firstName()&&emailUser()&&addrUser()&&phoneUser())
         {
           return true;
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