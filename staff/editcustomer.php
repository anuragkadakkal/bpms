<?php
  session_start();
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
                            <h6 class="m-0 font-weight-bold text-primary">Updation Form</h6>
                        </div>
                        <div class="card-body" >

                          <?php while ($row=mysqli_fetch_array($result))
                          {  ?>
                          <form role="form" action="updateuserreg.php?t=<?php echo $row['custkey']; ?>" method="post" >
              			    			<div class="row">
              			    				<div class="col-xs-6 col-sm-6 col-md-6">
              			    					<div class="form-group">
              			           <input type="text" name="fname" class="form-control input-sm" placeholder="First Name" value="<?php echo $row['fname']; ?>">
              			    					</div>
              			    				</div>
              			    				<div class="col-xs-6 col-sm-6 col-md-6">
              			    					<div class="form-group">
              			    	<input type="email" name="emails" class="form-control input-sm" placeholder="Email" value="<?php echo $row['username']; ?>">
              			    					</div>
              			    				</div>
              			    			</div>



              			    			<div class="form-group">
              			    				<textarea rows="2" name="address" class="form-control input-sm" placeholder="Address"><?php echo $row['address']; ?></textarea>
              			    			</div>

                              <input type="hidden" name="userid" value="<?php echo $_COOKIE['lkey']; ?>">

                              <div class="form-group">
                                <input type="text" name="phno" class="form-control input-sm" placeholder="Phone Number" value="<?php echo $row['phone']; ?>">
                              </div>

              			    			


                             	<input type="submit" value="Update" class="btn btn-info btn-block">

              			    		</form>
<?php } ?>


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<?php include 'customerfooter.php'; ?>
