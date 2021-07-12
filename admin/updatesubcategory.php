<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
include '../connection.php';
  include 'adminheader.php';
 $catkey = $_SESSION["catkey"];
  $sql = "select * from tb_subcat where scatkey='".$_GET['t']."'"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add New Products</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                           <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="viewcategory.php" style="text-decoration:none" >Product Category Details</a> | <a href="viewsubcategory.php?t=<?php echo $catkey; ?>" style="text-decoration:none" >Product Details</a> | <a href="updatesubcategory.php?t=<?php echo $_GET['t']; ?>" style="text-decoration:none" >Product Update</a></h6>
                        </div>
                        <div class="card-body" >

<?php while ($row=mysqli_fetch_array($result))
                      {  ?>
                          <form role="form" action="updatesubcategoryreg.php" method="post" enctype="multipart/form-data" name="myform">

              			    			<div class="form-group">
              			    				<input type="text" name="cname"  class="form-control input-sm" placeholder="Sub Category Name" value="<?php echo $row['scatname'] ?>" id="fname" onkeyup="firstName()">
                                    <span style="color: red;font-size: 14px" id="f1"></span>

                                <input type="hidden" name="scatkey" value="<?php echo $row['scatkey'] ?>">
                                <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
              			    			</div>
              			    			<div class="form-group">
              			    				<textarea rows="2" name="desc" class="form-control input-sm" placeholder="Description" id="address" onkeyup="addrUser()"><?php echo $row['scatdesc'] ?></textarea>
                            <span style="color: red;font-size: 14px" id="f4"></span>

              			    			</div>
        
<input type="hidden" name="catid" value="<?php echo $row['scatkey']; ?>">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="mfg" class="form-control input-sm" placeholder="Mfg. Date" onfocus="(this.type='date')" value="<?php echo $row['mfg'] ?>"  id="sdate" onfocusout="startDate()">
                  <span style="color: red;font-size: 14px" id="s1"></span>

                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="exp"  class="form-control input-sm" placeholder="Exp. Date" onfocus="(this.type='date')" value="<?php echo $row['exp'] ?>" id="edate" onfocusout="endDate()">
                  <span style="color: red;font-size: 14px" id="e1"></span>
                </div>
              </div>
            </div>

<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <span><b>Image [.jpg/.jpeg Format]</b></span>
              <input type="file" name="aadharfile"  class="form-control input-sm" id="file" onchange="fileCheck()">
              <span style="color: red;font-size: 14px" id="f8"></span>

    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <span><b style="color: white">.</b></span>
      <input type="text" name="amt"  class="form-control input-sm" placeholder="Price" value="<?php echo $row['amt'] ?>" id="ln" onkeyup="lastNames()">
                  <span style="color: red;font-size: 14px" id="top"></span>

    </div>
  </div>
</div>


                              
              			    		
  			    		             	<input type="submit" value="Update Sub Category" class="btn btn-info btn-block"  onclick="return checkAlls()">

              			    		</form>

<?php } ?>


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

  function startDate() {

    var s1 = document.getElementById("s1");
    var sdate = document.getElementById('sdate').value;

    if(sdate=="")
       {
         s1.textContent = "**Select Any Manufacturing Date";
         document.getElementById("sdate").focus();
         return false;
       }
       else
       {
        s1.textContent = "";
        return true;
       }
  }

  function endDate() {

    var e1 = document.getElementById("e1");
    var edate = document.getElementById('edate').value;

    if(edate=="")
       {
         e1.textContent = "**Select Any Expiry Date";
         document.getElementById("edate").focus();
         return false;
       }
       else
       {
        e1.textContent = "";
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

    if(firstName()&&addrUser()&&startDate()&&endDate()&&fileCheck()&&lastNames())
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