<?php
    session_start();
    if(isset($_SESSION['logined']) && $_SESSION['logined']==1)
    {  include 'adminheader.php'; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Job Details</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <!-- BreadCrumbs Start -->
                                <a href="index.php" style="text-decoration:none" ><i class="fa fa-home" aria-hidden="true"></i>
</a> | <a href="addjob.php" style="text-decoration:none" >Vaccancy Details</a></h6>
<!-- BreadCrubs End -->
                        </div>
                        <div class="card-body" >


                          <form role="form" action="jobreg.php" method="post" enctype="multipart/form-data" name="myform">
              			    			<div class="row">
              			    				<div class="col-xs-6 col-sm-6 col-md-6">
              			    					<div class="form-group">
              			               				<input type="text" name="title" class="form-control input-sm" placeholder="Job Title"  id="fnames" onkeyup="firstNames()">
                  <span style="color: red;font-size: 14px" id="f1s"></span>
              			    					</div>
              			    				</div>
              			    				<div class="col-xs-6 col-sm-6 col-md-6">
              			    					<div class="form-group">
              			    						<input type="text" name="qual" class="form-control input-sm" placeholder="Qualification"  id="fnamess" onkeyup="firstNamess()">
                  <span style="color: red;font-size: 14px" id="f1ss"></span>
              			    					</div>
              			    				</div>
              			    			</div>

                              <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group">
                                         <input type="text" name="exp" class="form-control input-sm" placeholder="Experience" id="fnamessx" onkeyup="firstNamessx()">
                  <span style="color: red;font-size: 14px" id="f1ssx"></span>
                                  </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group">
                                    <select class="form-control bfh-states" data-country="US" data-state="CA" name="jobtype" id="district" onclick="distUser()">
                                            <option value="null">Job Type</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                          </select>
                                          <span style="color: red;font-size: 14px" id="f7"></span>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group">
                                         <input type="text" name="skil" class="form-control input-sm" placeholder="Skills" id="fnamessxy" onkeyup="firstNamessxy()">
                  <span style="color: red;font-size: 14px" id="f1ssxy"></span>
                                  </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group">
                                   <input type="text" name="ctc" class="form-control input-sm" placeholder="Salary" id='tot' onkeyup="totTravel()">
                  <span style="color: red;font-size: 14px" id="top2"></span>
                                  </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group">
                                         <input type="text" name="vac" class="form-control input-sm" placeholder="Number of Vaccancy" id='totz' onkeyup="totTravelz()">
                  <span style="color: red;font-size: 14px" id="top2z"></span>
                                  </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                  <div class="form-group">
                                   <input type="text" name="ldate"  class="form-control input-sm" placeholder="Last Date" onfocus="(this.type='date')" id="edate" onfocusout="endDate()">
                  <span style="color: red;font-size: 14px" id="e1"></span>
                                  </div>
                                </div>
                              </div>

              			    			
              			    			<div class="form-group">
              			    				<textarea rows="2" name="desc" class="form-control input-sm" placeholder="Description" id="purpose" onkeyup="purpUser()"></textarea>
              <span style="color: red;font-size: 14px" id="f20"></span>
              			    			</div>

              			    			
  			    			          <input type="submit" value="Post" class="btn btn-info btn-block" onclick="return checkAlls()">

              			    		</form>




                        </div>
                    </div>

                </div>
<script type="text/javascript">
  function distUser() {

    var f7 = document.getElementById("f7");
    var district = document.getElementById('district').value;

    if(district=="null")
       {
         f7.textContent = "**Select any Job Type";
         document.getElementById("district").focus();
         return false;
       }
       else
       {
        f7.textContent = "";
        return true;
       }
  }

  function endDate() {

    var e1 = document.getElementById("e1");
    var edate = document.getElementById('edate').value;

    if(edate=="")
       {
         e1.textContent = "**Select Any Last Date";
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

    if(!/^[A-Za-z ]{5,56}$/.test(fname))
       {
         f1s.textContent = "**Invalid Job Title";
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

  function firstNamess() {
    var f1ss = document.getElementById("f1ss");
    var fnames = document.getElementById('fnamess').value;

    if(!/^[/#'"!.0-9a-zA-Z\s,;:-]{5,256}$/.test(fnames))
       {
         f1ss.textContent = "**Invalid Qualification";
         var x = document.getElementById("fnamess");
         x.focus();
         return false;
       }
       else
       {
        f1ss.textContent = "";
        return true;
       }
  }

  function firstNamessx() {
    var f1ssx = document.getElementById("f1ssx");
    var fnamesx = document.getElementById('fnamessx').value;

    if(!/^[-.A-Za-z0-9 ]{3,56}$/.test(fnamesx))
       {
         f1ssx.textContent = "**Invalid Experience Details";
         var x = document.getElementById("fnamessx");
         x.focus();
         return false;
       }
       else
       {
        f1ssx.textContent = "";
        return true;
       }
  }

  function firstNamessxy() {
    var f1ssxy = document.getElementById("f1ssxy");
    var fnamesxy = document.getElementById('fnamessxy').value;

    if(!/^[-,A-Za-z0-9 ]{3,56}$/.test(fnamesxy))
       {
         f1ssxy.textContent = "**Invalid Skills Details";
         var x = document.getElementById("fnamessxy");
         x.focus();
         return false;
       }
       else
       {
        f1ssxy.textContent = "";
        return true;
       }
  }

  function totTravel() {

    var top2 = document.getElementById("top2");
    var tot = document.getElementById('tot').value;

    if(!/^[0-9a-zA-Z./]{3,30}$/.test(tot))
       {
         top2.textContent = "**Enter any Salary Package";
         document.getElementById("tot").focus();
         return false;
       }
       else
       {
        top2.textContent = "";
        return true;
       }
  }

  function totTravelz() {

    var top2z = document.getElementById("top2z");
    var totz = document.getElementById('totz').value;

    if(!/^[0-9]{1,3}$/.test(totz))
       {
         top2z.textContent = "**Enter any Vacancy Available Count";
         document.getElementById("totz").focus();
         return false;
       }
       else
       {
        top2z.textContent = "";
        return true;
       }
  }


  function purpUser() {
    var f20 = document.getElementById("f20");
    var purpose = document.getElementById('purpose').value;

    if (!/^[#.0-9a-zA-Z\s,-]{3,50}$/.test(purpose))
       {
         f20.textContent = "**Enter any Job Description";
         document.getElementById("purpose").focus();
         return false;
       }
       else
       {
        f20.textContent = "";
        return true;
       }
  }


  function checkAlls()
  {
    if(firstNames()&&firstNamess()&&firstNamessx()&&distUser()&&distUser()&&firstNamessxy()&&totTravel()&&totTravelz()&&endDate()&&purpUser())
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
<?php include 'adminfooter.php';}
  else
  {
    Header("location:../index.php");
  }
?>