<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
include 'adminheader.php'; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add New Service Category</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                             <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="addservice.php" style="text-decoration:none" >New Service Category</a> </h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body" >


                          <form role="form" action="servicecat.php" method="post" enctype="multipart/form-data" name="myform">

              			    			<div class="form-group">
              			    				<input type="text" name="cname"  class="form-control input-sm" placeholder="Service Category Name" id="fname" onkeyup="firstName()">
                                    <span style="color: red;font-size: 14px" id="f1"></span>

              			    			</div>
              			    			<div class="form-group">
              			    				<textarea rows="2" name="desc" class="form-control input-sm" placeholder="Description" id="address" onkeyup="addrUser()"></textarea>
                            <span style="color: red;font-size: 14px" id="f4"></span>

              			    			</div>
              			    		
  			    		             	<input type="submit" value="Add Category" class="btn btn-info btn-block" onclick="return checkAll()">

              			    		</form>




                        </div>
                    </div>

                </div>
 <script type="text/javascript">

  function firstName() {
    var f1 = document.getElementById("f1");
    var fname = document.getElementById('fname').value;

    if(!/^[/#'"!.0-9a-zA-Z\s,;:-]{3,56}$/.test(fname))
       {
         f1.textContent = "**Invalid Category Name";
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


  function checkAll() {

    if(firstName()&&addrUser())
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