<?php 
session_start();
include '../connection.php';
include 'adminheader.php'; 
$sql="select * from tb_staffreg"; //echo $sql;exit;
$bkkey=$_GET['t'];
  $result = mysqli_query($conn,$sql);
  ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Assign Staff</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Staff Details</h6>
                        </div>
                        <div class="card-body" >


                          <form role="form" action="assignwork.php" method="post" enctype="multipart/form-data" name="myform">

              			    			<div class="form-group">
              			    				<select class="form-control" name="cname" id="districtz" onclick="distUserz()">
                                    <option value="null">Select Staff</option> 
                                    <?php $count=1; while ($row=mysqli_fetch_array($result))
                      {  ?>      <option value="<?php echo $row['engid']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option> 
                      <?php } ?>
                                </select>
                                <span style="color: red;font-size: 14px" id="f7z"></span>
              			    			</div>
              			    			<div class="form-group">
              			    				<textarea rows="2" name="desc" class="form-control input-sm" placeholder="Description" id="address" onkeyup="addrUser()"></textarea>
              <span style="color: red;font-size: 14px" id="f4"></span>
              			    			</div>
              			    		   <input type="hidden" name="bookkey" value="<?php echo $bkkey; ?>">
  			    		             	<input type="submit" value="Assign Work" class="btn btn-info btn-block" onclick="return checkAll()"> 

              			    		</form>




                        </div>
                    </div>

                </div>
<script type="text/javascript">

  function addrUser() {
    var f4 = document.getElementById("f4");
    var address = document.getElementById('address').value;

    if (!/^[#.0-9a-zA-Z\s,-]{8,50}$/.test(address))
       {
         f4.textContent = "**Invalid Description";
         document.getElementById("address").focus();
         return false;
       }
       else
       {
        f4.textContent = "";
        return true;
       }
  }


  function distUserz() {

    var f7z = document.getElementById("f7z");
    var districtz = document.getElementById('districtz').value;

    if(districtz=="null")
       {
         f7z.textContent = "**Select any Staff";
         document.getElementById("districtz").focus();
         return false;
       }
       else
       {
        f7z.textContent = "";
        return true;
       }
  }

  function checkAll() {

    if(distUserz()&&addrUser())
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
<?php include 'adminfooter.php'; ?>
