<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
  include '../connection.php';
  include 'adminheader.php';

  $catkey=$_GET['t'];
  $sql = "select * from tb_servicesubcat where scatkey='".$catkey."'";
  $result = mysqli_query($conn,$sql);
  
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add New Service</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                             <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewservice.php" style="text-decoration:none" >Service Category Details</a> | <a href="viewservicesubcategory.php?t=<?php echo $_SESSION['catkey']; ?>" style="text-decoration:none" >Service Details</a> | <a href="updateservicesubcategory.php?t=<?php echo $_GET['t']; ?>" style="text-decoration:none" >Service Update</a>
                        </div>
                        <div class="card-body" >
<?php
while ($row=mysqli_fetch_array($result))
  {
    ?>
                          <form role="form" action="updateservicereg.php" method="post" enctype="multipart/form-data" name="myform">

              			    			<div class="form-group">
              			    				<input type="text" name="cname"  class="form-control input-sm" placeholder="Service Name" value="<?php echo $row['scatname'];?>" id="fname" onkeyup="firstName()">
                                    <span style="color: red;font-size: 14px" id="f1"></span>

              			    			</div>
              			    			<div class="form-group">
              			    				<textarea rows="2" name="desc" class="form-control input-sm" placeholder="Description" id="address" onkeyup="addrUser()"><?php echo $row['scatdesc'];?></textarea>
                            <span style="color: red;font-size: 14px" id="f4"></span>

              			    			</div>
        
<input type="hidden" name="scatkey" value="<?php echo $catkey ?>">
<input type="hidden" name="image" value="<?php echo $row['image'];?>">
            

<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <span><b>Image</b></span>
              <input type="file" name="aadharfile"  class="form-control input-sm" id="file" onchange="fileCheck()">
              <span style="color: red;font-size: 14px" id="f8"></span>

    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <span><b style="color: white">.</b></span>
      <input type="text" name="amt"  class="form-control input-sm" placeholder="Price" value="<?php echo $row['amt'];?>" id="ln" onkeyup="lastNames()">
                  <span style="color: red;font-size: 14px" id="top"></span>

    </div>
  </div>
</div>


                              
              			    		
  			    		             	<input type="submit" value="Update Service" class="btn btn-info btn-block" onclick="return checkAlls()">
<?php } ?>
              			    		</form>




                        </div>
                    </div>

                </div>
<script type="text/javascript">

  function firstName() {
    var f1 = document.getElementById("f1");
    var fname = document.getElementById('fname').value;

    if(!/^[.A-Za-z0-9- ]{3,56}$/.test(fname))
       {
         f1.textContent = "**Invalid Sub Category Name";
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


  function addrUser() {
    var f4 = document.getElementById("f4");
    var address = document.getElementById('address').value;

    if (!/^[/#'"!.0-9a-zA-Z\s,;:-]{8,255}$/.test(address))
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



  function fileCheck() {

    var f8 = document.getElementById("f8");
    var file = document.getElementById('file').value;

    var file=file.split('.').pop();
    if(file!="jpg" && file!="jpeg")
       {
          f8.textContent = "**Select .jpg/.jpeg File";
          document.getElementById("file").focus();
        return false;
       }
       else
       {
        f8.textContent = "";
        return true;
       }
  }

  function lastNames() {
    var top = document.getElementById("top");
    var ln = document.getElementById('ln').value;

    if(!/^[0-9.]{1,16}$/.test(ln))
       {
         top.textContent = "**Invalid Price";
         var x = document.getElementById("ln");
         x.focus();
         return false;
       }
       else
       {
        top.textContent = "";
        return true;
       }
  }


  function checkAlls() {

    if(firstName()&&addrUser()&&fileCheck()&&lastNames())
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
<?php include 'adminfooter.php'; }
  else
  {
    Header("location:../index.php");
  }
?>