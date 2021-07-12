<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>BPMS SignUp</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<meta name="robots" content="noindex, follow">
</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60c9967f7f4b000ac037d997/1f89n7ok2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="customerreg.php" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-43">
						Customer Registration
					</span>

					<span style="color: #F474D0;font-size: 14px" id="f1"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="name" placeholder="Full Name" required id="fname" onkeyup="firstName()">
						<span class="focus-input100"></span>
					</div>
					

					<span style="color: #F474D0;font-size: 14px" id="f4"></span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="address" placeholder="Address" required id="address" onkeyup="addrUser()">
						<span class="focus-input100"></span>
					</div>

					<br> <span style="color: #F474D0;font-size: 14px" id="f5"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text"  placeholder="Phone Number" required id="inputPhone" onkeyup="phoneUser()">
						<span style="color:  #00cc00;font-size: 14px" id="fz">*Phone verified</span>
						<span class="focus-input100"></span>
					</div><span style="color:  #F474D0;font-size: 14px" id="fze"></span>

					<input type="hidden" name="phone" id="verno">
					<center><div id="recaptcha-container"></div></center>

					<button class="btn btn-outline-success btn-block" type="button" id="phoneloginbtn" ><i class="fas fa-sign-in-alt"></i> Get OTP</button>
					<div class="wrap-input100 validate-input" id="ot">
						<input class="input100" type="Password" name="pass" placeholder="OTP" required id="inputOtp" >
						<span class="focus-input100" id="ots"></span>
					</div>
					<button class="btn btn-outline-primary btn-block" type="button" id="verifyotp"><i class="fas fa-sign-in-alt"></i> VERIFY OTP</button>

					<br><span style="color: #F474D0;font-size: 14px" id="f3"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" placeholder="Email" required id="email" onkeyup="emailUser()">
						<span class="focus-input100"></span>
					</div>

					<br><span style="color: #F474D0;font-size: 14px" id="cno"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="cardno" required id="cardno" placeholder="Card Number" onkeyup="cardUser()">
						<span class="focus-input100"></span>
					</div>

					<br><span style="color: #F474D0;font-size: 14px" id="f8"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="file" name="aadharfile" required id="file" onchange="fileCheck()" >
						<span class="focus-input100"></span>
						<span class="label-input100">ID Proof</span>
					</div>

					<br><span style="color: #F474D0;font-size: 14px" id="f9"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="Password" name="pass" placeholder="Password" required id="pass" onkeyup="passUser()">
						<span class="focus-input100"></span>
					</div>

					<br><span style="color: #F474D0;font-size: 14px" id="f10"></span>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="Password" name="conpass" placeholder="Confirm Password" required id="conpass" onkeyup="conpassUser()">
						<span class="focus-input100"></span>
					</div>

					

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<a href="login.php" class="txt1">
								<b>Go to Login</b>
							</a>
						</div>

						<div>
							<a href="../index.php" class="txt1">
								<b>Go to Home</b>
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="btn btn-outline-primary form-control" type="submit" onclick="return checkAll()">
							Register
						</button> 
					</div><br>
					<!-- <div class="container-login100-form-btn">
						<a href="../index.php"><button class="btn btn-outline-success form-control">
							Back To Home
						</button></a>
					</div> -->

				</form>

				<div class="login100-more" style="background-image: url('images/img_3.jpg');">
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">

  function firstName() {
  	document.getElementById("phoneloginbtn").style.display = 'none';
    var f1 = document.getElementById("f1");
    var fname = document.getElementById('fname').value;

    if(!/^[A-Za-z ]{3,36}$/.test(fname))
       {
         f1.textContent = "**Invalid Full Name";
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
  	document.getElementById("phoneloginbtn").style.display = 'none';
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
    var inputPhone = document.getElementById('inputPhone').value;

    if(!/^[6-9]{1}[0-9]{9}$/.test(inputPhone))
       {
       	 document.getElementById("phoneloginbtn").style.display = 'none';
         f5.textContent = "**Invalid Phone # Format";
         document.getElementById("inputPhone").focus();
         return false;
       }
       else
       {
       	document.getElementById("phoneloginbtn").style.display = 'block';
        f5.textContent = "";
        return true;
       }
  }

  function emailUser() {
  	document.getElementById("phoneloginbtn").style.display = 'none';
    var f3 = document.getElementById("f3");
    var email = document.getElementById('email').value;

    if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,8}$/.test(email))
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

  function passUser() {
  	document.getElementById("phoneloginbtn").style.display = 'none';
		var f9 = document.getElementById("f9");
		var pass = document.getElementById('pass').value;

		if(!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,30}$/.test(pass))
	     {
	       f9.textContent = "**Password Must Have 1(Uppercase,Lowercase,Digit) & 6 to 30 Character Length";
	       document.getElementById("pass").focus();
	       return false;
	     }
	     else
	     {
	     	f9.textContent = "";
	     	return true;
	     }
	}

	function conpassUser() {
		document.getElementById("phoneloginbtn").style.display = 'none';
		var f10 = document.getElementById("f10");
		var conpass = document.getElementById('conpass').value;
		var pass = document.getElementById('pass').value;

		if(conpass!=pass)
	     {
	       f10.textContent = "**Password Doesn't Match";
	       document.getElementById("conpass").focus();
	       return false;
	     }
	     else
	     {
	     	f10.textContent = "";
	     	return true;
	     }
	} 

	function cardUser() {
		document.getElementById("phoneloginbtn").style.display = 'none';
		var cno = document.getElementById("cno");
		var cardno = document.getElementById('cardno').value;
		if (!/^[0-9a-zA-Z/-]{10,20}$/.test(cardno))
	    {
	    	
	    	cno.textContent = "**Invalid Card Number Format";
	    	document.getElementById("cardno").focus();
	    	return false;
	    }
	    else
	    {
	    	cno.textContent = "";
	     	return true;
	    }
	}

	function fileCheck() {
document.getElementById("phoneloginbtn").style.display = 'none';
		var f8 = document.getElementById("f8");
		var file = document.getElementById('file').value;

		var file=file.split('.').pop();
		/*if(file!="jpg")
		{
		  f8.textContent = "**Select .jpg/.jpeg File";
			document.getElementById("file").focus();
			return false;
		}*/
		if(file=="jpeg" || file=='jpg')
		{
		  f8.textContent = "";
			return true;
		}
		else
		{
			f8.textContent = "**Select .jpg/.jpeg File";
			document.getElementById("file").focus();
			return false;
		}
	}

  
   function checkAll() {
		
    if(firstName()&&addrUser()&&phoneUser()&&emailUser()&&cardUser()&&fileCheck()&&passUser()&&conpassUser())
		{
			document.getElementById("phoneloginbtn").style.display = 'none';
			var flag = document.getElementById("verno").value;
			var fze = document.getElementById("fze");

			if(flag=='')
			{
				fze.textContent = "**Phone Verification Pending";
				document.getElementById("inputPhone").focus();
				document.getElementById("phoneloginbtn").style.display = 'block';
				return false;
			}
			else
			{
				fze.textContent = "";
				return true;
			}
		}
		else
		{
			return false;
		}
  }


</script>  
<script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-analytics.js"></script>
<script defer src="https://www.gstatic.com/firebasejs/7.19.0/firebase-auth.js"></script>
<script>
	document.getElementById("phoneloginbtn").style.display = 'none';
	document.getElementById("ot").style.display = 'none';
 	var firebaseConfig = {
    apiKey: "AIzaSyAycjR2MMfft0ENrPQEm1yZhS8WLflXmKo",
    authDomain: "bpms-ca28a.firebaseapp.com",
    projectId: "bpms-ca28a",
    storageBucket: "bpms-ca28a.appspot.com",
    messagingSenderId: "479082820110",
    appId: "1:479082820110:web:43e8a5921eeba0047a425f",
    measurementId: "G-B0K1YQ873C"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

   //===================Saving Login Details in My Server Using AJAX================
   function sendDatatoServerPhp(email,provider,token,username){
       
        var xhr = new XMLHttpRequest();
        //xhr.withCredentials = true;

        xhr.addEventListener("readystatechange", function() {
        if(this.readyState === 4) {
            console.log(this.responseText);
            if(this.responseText=="Login Successfull" || this.responseText=="User Created"){
                //alert("OTP Verified");
                document.getElementById("phoneloginbtn").style.display = 'none';
                location='index.php';
            }
            else if(this.responseText=="Please Verify Your Email to Get Login"){
                alert("Please Verify Your Email to Login")
            }
            else{
                alert("Error in Login");
            }
        }
        });

        //xhr.open("POST", "http://localhost/covidcare4uhosting/login.php?email="+email+"&provider="+provider+"&username="+username+"&token="+token);
        //xhr.send();
   }
   //===========================End Saving Details in My Server=======================
   //=========================Login With Phone==========================
   var loginphone=document.getElementById("phoneloginbtn");
   var phoneinput=document.getElementById("inputPhone");
   var otpinput=document.getElementById("inputOtp");
   var verifyotp=document.getElementById("verifyotp");
   document.getElementById("inputOtp").style.display = 'none';
   document.getElementById("fz").style.display = 'none';
   document.getElementById("verifyotp").style.display = 'none';
   document.getElementById("phoneloginbtn").style.display = 'none';


   loginphone.onclick=function(){

    var inputPhone = document.getElementById('inputPhone').value;
    phoneinput.disabled=true;
    if(!/^[6-9]{1}[0-9]{9}$/.test(inputPhone))
       {
         f5.textContent = "**Invalid Phone # Format";
         document.getElementById("inputPhone").focus();
         return false;
       }
       else
       {
        f5.textContent = "";
    document.getElementById("phoneloginbtn").style.display = 'none';
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'normal',
        'callback': function(response) {
            //document.getElementById("inputPhone").style.display = 'none'
            document.getElementById("recaptcha-container").style.display = 'none'
            document.getElementById("phoneloginbtn").style.display = 'none';
            document.getElementById("inputOtp").style.display = 'block';
            document.getElementById("verifyotp").style.display = 'block';
            document.getElementById("ot").style.display = 'block';
            //alert("Enter OTP");
        },
        'expired-callback': function() {
            alert("Captcha Timeout");
            window.location.replace("signup.php");
        }
        });

        var cverify=window.recaptchaVerifier;

        firebase.auth().signInWithPhoneNumber('+91'+phoneinput.value,cverify).then(function(response){
            //console.log(response);
            window.confirmationResult=response;
        }).catch(function(error){
            console.log(error);
        })
   }
 }

   verifyotp.onclick=function(){
   		otpinput.disabled=true;
      verifyotp.disabled=true;
      verifyotp.textContent="Verifying OTP, Please Wait";
      setTimeout(timeManage, 3000);
      function timeManage(){

        confirmationResult.confirm(otpinput.value).then(function(response){
           console.log(response);
           verifyotp.disabled=true;
           phoneinput.disabled=true;

           document.getElementById("verno").value = document.getElementById("inputPhone").value;
           verifyotp.textContent="Verified"; 
           document.getElementById("fze").style.display = 'none';
           document.getElementById("fz").style.display = 'block';
           document.getElementById("verifyotp").style.display = 'none';
           otpinput.style.display = 'none';
           document.getElementById("ot").style.display = 'none';
           document.getElementById("ots").style.display = 'none';

            var userobj=response.user;
            var token=userobj.xa;
            var provider="phone";
            var email='+91'+phoneinput.value;
            if(token!=null && token!=undefined && token!=""){
            sendDatatoServerPhp(email,provider,token,email);
            }
       })
       .catch(function(error){
           //console.log(error);
           verifyotp.disabled=true;
           verifyotp.textContent="Verification Failed";
           phoneinput.disabled=false;
           alert("Verification Failed");
           window.location.replace("signup.php");
       })
        
      }
      
       
   }
   //=================End Login With Phone=========================

</script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>

</html>
