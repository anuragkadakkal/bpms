<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    { 
    include 'staffheader.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Apply Leave</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="applyleave.php" style="text-decoration:none" >Leave Details</a></h6>
<!-- BreadCrubs End -->                        </div>
                        <div class="card-body" >
            

                          <form role="form" action="addleave.php" method="post" enctype="multipart/form-data" name="myform">                       

            <div class="form-group">
              <textarea class="form-control" name="desc" placeholder="Purpose Of Leave" id="fnames" onkeyup="firstNames()"></textarea>
                                    <span style="color: red;font-size: 14px" id="f1s"></span>

               
            </div>
                              

                              <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="tdate" class="form-control input-sm" placeholder="Leave Start Date" onfocus="(this.type='date')" id="sdate" onfocusout="startDate()">
                                    <span style="color: red;font-size: 14px" id="s1"></span>

                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="text" name="rdate"  class="form-control input-sm" placeholder="Leave End Date" onfocus="(this.type='date')" id="edate" onfocusout="endDate()">
                                    <span style="color: red;font-size: 14px" id="e1"></span>

                </div>
              </div>
            </div>

                              

                              <div class="form-group">
                
                              </div> 
                  <input type="submit" value="Apply" class="btn btn-info btn-block"  onclick="return checkAlls()"> 

                            </form>



                        </div>
                    </div>

                </div>

<script type="text/javascript">
    

    function startDate() {

        var s1 = document.getElementById("s1");
        var sdate = document.getElementById('sdate').value;

        if(sdate=="")
         {
           s1.textContent = "**Select Any Start Date";
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
           e1.textContent = "**Select Any End Date";
           document.getElementById("edate").focus();
           return false;
         }
         else
         {
            e1.textContent = "";
            return true;
         }
    }
    function firstNames() {
        var f1s = document.getElementById("f1s");
        var fname = document.getElementById('fnames').value;

        if(!/^[A-Za-z., ]{5,100}$/.test(fname))
         {
           f1s.textContent = "**Invalid Purpose of Leave";
           var x = document.getElementById("fnames");
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
        if(firstNames()&&startDate()&&endDate())
         {
           return true;
         }
         else
         {
            return false;
         }
    }
</script>                
                <!-- /.container-fluid --><?php
        include 'stafffooter.php';
   
}
    else
    {
        Header("location:../index.php");
    }
?>