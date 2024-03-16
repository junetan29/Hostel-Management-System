<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" style="font-size:24px"></i></button>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
<style>
/* The container gender*/
.gender {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.gender input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.gendercheck {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.gender:hover input ~ .gendercheck {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.gender input:checked ~ .gendercheck {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.gendercheck:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.gender input:checked ~ .gendercheck:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.gender .gendercheck:after {
 	top: 5px;
	left: 5px;
	width: 10px;
	height: 10px;
	border-radius: 50%;
	background: white;
}

/* The container TnC*/
.TnC {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.TnC input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.TnCcheck {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.TnC:hover input ~ .TnCcheck {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.TnC input:checked ~ .TnCcheck {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.TnCcheck:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.TnC input:checked ~ .TnCcheck:after {
  display: block;
}

/* Style the checkmark/indicator */
.TnC .TnCcheck:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


/*Main Container*/
#main-containers{
	margin:auto;
	width:80%;
	border: 1px solod white;
	background-color:white;
	border-radius:10px;
}
#main-containers .row
{
	width:90%;
	margin:auto;
	margin-top:20px;
}
button[type=submit]
{
	width:90%;
	margin:auto;
}

body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2000; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>


<style type="text/css">
.form-control{
	border:1px solid #C8E7EE;
}

#password_rules span{
  color: red;
  font-weight: normal;
}

#password_rules span.compliant {
  color: #88B890;
}

#password_rules span.before-validate{
  color:#DC143C;
}

.form-container{
	margin-top: 30px;
}

</style>
<script>
function show()
{
	var choice;
	
	choice=document.registrationform.nation.value;
	
	
	if(choice=="Malaysian")
	{
		document.getElementById("pass1").style.display = "none";
		document.getElementById("studic").style.display = "block";
		document.getElementById("add").style.display = "block";
		document.getElementById("post").style.display = "block";
		document.getElementById("sta").style.display = "block";
	}
	else if(choice=="Non-Malaysian")
	{
		document.getElementById("studic").style.display = "none";
		document.getElementById("pass1").style.display = "block";
		document.getElementById("add").style.display = "none";
		document.getElementById("post").style.display = "none";
		document.getElementById("sta").style.display = "none";
	}
	
}
</script>
	 </head>
  <body>

    <?php include("includes/header-navigation.php"); ?>

    <!-- END nav -->

    <section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');">

<div id="main-containers">

        <h3 class="card-title text-center">Account Registration</h3>
				<form class="form-signin" method="post" name="registrationform" enctype="multipart/form-data">
							<div class="row">
								<div class="col-xl-4">
									<div class="form-label-group">
										<label for="studname">Name</label>
										<input type="text" id="studname" name="studname" class="form-control" placeholder="Name" pattern="[A-Za-z\s]+" required>
									</div>
								</div>
								<div class="col-xl-2">
									<div class="border-radio">
										<label>Gender</label>
										<p><input type="radio" name="gender" value="Male">Male
										<br>
										<input type="radio" name="gender" value="Female">Female
									</div>
								</div>
								<div class="col-xl-2">
									<div class="form-label-group">
										<label>Nationality</label>
											<div class="wrap-input100 validate-input m-b-36">
												<input type="radio" name="nation" value="Malaysian" onchange="show()" checked> Malaysian   						
												<br>
												<input type="radio" name="nation" value="Non-Malaysian" onchange="show()"> Non-Malaysian
												<span class="focus-input100"></span>
											</div>									
									</div>
								</div>
								<div class="col-xl-4" >
									<div class="form-label-group">
										<div id='studic'>
											<label for="studic">Identity Card</label>
											<input type="text" name="studic" class="form-control" placeholder="Identity Card" pattern="[0-9]{12}" title="12 digit only" >
										</div>
									</div>
									<div id='pass1'style="display:none;">
										<label>Passport</label>
											<input class="form-control" type="text" name="pp" maxlength="9" pattern="[A-PR-WY]{1,2}[0-9]{7}" placeholder="C4671098" size="50" autocomplete="off" title="Combination of one or two alphabet and 7 numbers.">
									</div>
								</div>
							</div>
								<div class="row">
								<div class="col-xl-6">
									<div class="form-label-group">
										<label for="studphnum">Phone Number</label>
										<input type="text" id="studphnum" name="studphnum" class="form-control" placeholder="Phone Number" pattern="[0]{1}[1]{1}[0-9]{8,9}" title="digit only" required>
									</div>
								</div>
									<div class="col-xl-6">
										<div class="form-label-group">
											<label for="studcourse">Student Course</label>
											<select id="studcourse" name="studcourse" class="form-control">
											<option value="course">Select Course</option>
											<?php 
												$studcourse=mysqli_query($connect,"Select * from course");
												while($row=mysqli_fetch_assoc($studcourse))
												{
												?>
													<option value="<?php echo $row['Id'];?>"> <?php echo $row["CourseTitle"];?> </option>
												<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6">
										<div class="form-label-group">
											<label for="Profile">Profile Picture</label>
											<input type="file" id="Profile" name="profile" class="form-control" placeholder="Profile Picture" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-label-group">
											<label for="Offerletter">Offer Letter</label>
											<input type="file" id="Offerletter" name="Offerletter" class="form-control" placeholder="Offer Letter" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div id='add'>
										<div class="form-label-group">
											<label for="studcurrentaddress">Current Address</label>
											<input type="text" id="studcurrentaddress" name="studcurrentaddress" class="form-control" placeholder="Current Address" >
										</div>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6">
									<div id='sta'>
										<div class="form-label-group">
											<label for="state">State</label>
												<select id="State" name="state" class="form-control">
												<option value="State">State</option>
												<?php 
													$state=mysqli_query($connect,"Select * from state ");
													while($row=mysqli_fetch_assoc($state))
													{
														?>
														<option value="<?php echo $row['ID'];?>"> <?php echo $row["State"];?> </option>
														<?php
													}
												?>
												</select>
										</div>
										</div>
									</div>
									<div class="col-xl-6">
									<div id='post'>
										<div class="form-label-group">
											<label for="postcode">Postcode</label>
											<input type="text" id="postcode" name="postcode" class="form-control" placeholder="Postcode" maxlength="5" pattern="[0-9]+" title="digit only" >
										</div>
									</div>
									</div>
									</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="studemail">Email address</label>
											<input type="email" id="studemail" name="studemail" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<div id="password_rules"> 
												<div class="form-group"><b>New Password: </b><input class="form-control" onkeyup="validate_entries();" id="pass" type="password" name="newpass" size="35" oninvalid="setCustomValidity('Please match the requested format. Ex) Aa12345@ ');" oninput="setCustomValidity('')" title="Ex) Aa12345@" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}$"/>
												<span class="before-validate">(<span id="password_requirements_length" class="compliant">At least 8 characters</span>, <span id="password_requirements_forbidden_words" class="compliant">including uppercase</span>,<span id="password_requirements_lower_case" class="compliant"> lowercase letters</span>,<span id="password_requirements_non_alpha" class="compliant"> numbers </span><span id="password_requirements_punctuation_mark" class="compliant"> and punctuation mark</span>)</span></div>
												<input type="checkbox" onclick="myFunction()"> Show Password
																<script>
																	function myFunction() 
																	{
																	  var x = document.getElementById("pass");
																	  if (x.type === "password") 
																	  {
																		x.type = "text";
																	  } else 
																	  {
																		x.type = "password";
																	  }
																	}
																</script>	
												<div class="form-group"><b>Confirm Password: </b><input class="form-control" required onkeyup="validate_entries();" id="conf" type="password" name="conf" size="35" />
												<span class="before-validate">(<span id="password_requirements_confirmation" class="compliant">Password and confirmation must match</span>)</span></div>
												 <input type="checkbox" onclick="myFunctionRE()"> Show Password
																<script>
																	function myFunctionRE() 
																	{
																	  var x = document.getElementById("conf");
																	  if (x.type === "password") 
																	  {
																		x.type = "text";
																	  } else 
																	  {
																		x.type = "password";
																	  }
																	}
																</script>	
											</div>
										</div>
									</div>
								</div>
							
							<!--<hr class="my-3">-->
							
							<div class="row">
								
								
								<div class="col-xl-6">
									<div class="form-label-group">
											<label for="TnC">Terms and Conditions</label><br>
											  <input type="checkbox" required> I have read and agree to the 
											  <a id="btn" style="color: #007bff;cursor: pointer;">Terms & Conditions</a>
									</div>
								</div>
							
								<div class="col-xl-6">
									<div class="wrap-input100 validate-input" data-validate = "Recaptcha is required">
										<div class="g-recaptcha" data-sitekey="6LfAL84ZAAAAACycDvNz2hefn-6V_fqNR2xKYQy2" name="recaptcha"></div>
									</div>
								</div>
							</div>
							<br>
							
							<!--<hr class="my-2">-->
						  <button id="submitbtn" name="submitbtn" class="btn btn-lg btn-primary btn-block text-uppercase signup" type="submit" href="studque?=<?php echo $row["Studic"] ?>"><i class="fa fa-user-plus"></i> Sign Up</button>

						  <div class="text-center">Already have account? <a class="mt-2" href="stud_login.php"><b>Sign In</b></a></div>
						  <!--<hr class="my-4">-->

				</form>
				
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Terms and Conditions for Hostel Booking System</h1>

<h2>Introduction</h2> 
  
<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Hostel Booking System accessible at http://localhost/owner_june/index.php.</p>

<p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions. </p>

<p>Minors or people below 18 years old are not allowed to use this Website.</p>

<h2>Intellectual Property Rights</h2>

<p>Other than the content you own, under these Terms, Hostel Booking System and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>

<p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>

<h2>Restrictions</h2>

<p>You are specifically restricted from all of the following:</p>

<ul>
    <li>publishing any Website material in any other media;</li>
    <li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
    <li>publicly performing and/or showing any Website material;</li>
    <li>using this Website in any way that is or may be damaging to this Website;</li>
    <li>using this Website in any way that impacts user access to this Website;</li>
    <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
    <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
    <li>using this Website to engage in any advertising or marketing.</li>
</ul>

<p>Certain areas of this Website are restricted from being access by you and Hostel Booking System may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>

<h2>Your Content</h2>

<p>In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Hostel Booking System a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>

<p>Your Content must be your own and must not be invading any third-party’s rights. Hostel Booking System reserves the right to remove any of Your Content from this Website at any time without notice.</p>

<h2>No warranties</h2>

<p>This Website is provided "as is," with all faults, and Hostel Booking System express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>

<h2>Limitation of liability</h2>

<p>In no event shall Hostel Booking System, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Hostel Booking System, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

<h2>Indemnification</h2>

<p>You hereby indemnify to the fullest extent Hostel Booking System from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

<h2>Severability</h2>

<p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

<h2>Variation of Terms</h2>

<p>Hostel Booking System is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

<h2>Assignment</h2>

<p>The Hostel Booking System is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>

<h2>Entire Agreement</h2>
    
<p>These Terms constitute the entire agreement between Hostel Booking System and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>

<h2>Governing Law & Jurisdiction</h2>

<p>These Terms will be governed by and interpreted in accordance with the laws of the State of my, and you submit to the non-exclusive jurisdiction of the state and federal courts located in my for the resolution of any disputes.</p>
<br>
  </div>

</div>		
</div>
   </section>
   <?php include("stud_regisphp.php"); ?>

    <?php 
    
    //include("includes/footer.php");
    
    ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script type="text/javascript">
	function validate_entries(){
		var pass = $('#pass').val();
    	var conf = $('#conf').val();
    	var all_pass = true;
          
    	if(pass.length < 8){
    		$('#password_requirements_length').removeClass('compliant');
    		all_pass = false;
    	}
    	else{
    		$('#password_requirements_length').addClass('compliant');
    	}  
    		
    	if(pass.match(/[0-9]/)){
			$('#password_requirements_non_alpha').addClass('compliant'); 
          		  all_pass = false
    	}
    	else{
			$('#password_requirements_non_alpha').removeClass('compliant');
    	}
        if(pass.match(/[#?!@$%^&*-.]/)){
			$('#password_requirements_punctuation_mark').addClass('compliant'); 
          	all_pass = false
    	}
    	else{
			$('#password_requirements_punctuation_mark').removeClass('compliant');
    	}
    	if(pass.match(/[A-Z]/)){
			$('#password_requirements_forbidden_words').addClass('compliant');
            all_pass = false;
    	}
    	else{
            $('#password_requirements_forbidden_words').removeClass('compliant');
     
         
    	}
		if(pass.match(/[a-z]/)){
			$('#password_requirements_lower_case').addClass('compliant');
            all_pass = false;
    	}
    	else{
            $('#password_requirements_lower_case').removeClass('compliant');
     
    	}
    	  
    	if(pass == conf){
    		$('#password_requirements_confirmation').addClass('compliant');
    	}
    	else{
    		$('#password_requirements_confirmation').removeClass('compliant')
    		all_pass = false;
    	}
	}
</script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  
  </body>
</html>
