<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Change Password</title>
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

	 </head>
  <body>

    <?php include("includes/header-navigation.php"); ?>

    <!-- END nav -->
	<?php
		if(isset($_SESSION["student"]))
		{
			$userData = $_SESSION["student"];
			$em       = $userData["Studemail"];
			$pass     = $userData["Password"];
		}
		
	?>
    <section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');">

<div id="main-containers">
		<form class="form-signin" method="post" name="pass" enctype="multipart/form-data">
        <h3 class="card-title text-center"><b>Change Password</b></h3>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ic">Email</label>
											<input type="email" id="em" name="em" class="form-control" value="<?php echo $em ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="opass">Current Password </label>
											<input type="password" id="opass" name="opass" class="form-control" placeholder="Current Password" required>
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
						
							<!--<hr class="my-2">-->
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <button id="submitbtn" name="submitbtn" class="btn btn-lg btn-primary btn-block text-uppercase signup" type="submit"><i class="fa fa-check"></i> Change Password</button>
							<div class="row">
									<div class="col-xl-12">
										
									</div>
							</div>
						  <!--<hr class="my-4">-->
  <?php

if(isset($_POST["submitbtn"]))
{
	$email   = $_POST["em"];
	$oldpass = $_POST["opass"];
	$newpass = $_POST["newpass"];
	$conpass = $_POST["conf"];
	$email = $userData["Studemail"];
	$name = $userData["Studname"];
	
	$result = mysqli_query($connect, "SELECT * from studregister where Studemail = '$email'");
	$row= mysqli_fetch_array($result);
	
	if ($oldpass == $row["Password"])
	{
		if($newpass != $conpass)
		{
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Password Does Not Match !",
				  text : "Please Enter Same Password!",
				  icon: "error",
				  button: "Retry"}).then(function(){window.location.href = "stud_changepass.php";});
			</script>
			<?php
		}
		else
		{
			mysqli_query($connect,"UPDATE studregister set Password = '$newpass' WHERE Studemail = '$email'");
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful !",
				  text : "You Password Has Been Update Please Relogin!",
				  icon: "success",
				  button: "Relogin"}).then(function(){window.location.href = "stud_login.php";});
			</script>
			<?php
			$subject = "Password Has Been Change";
			$message = "Hi".$name."\nYour password had been change! \n\nPlease contact admin if you do not change your password.\n You may contact admin via email or click on the link below to contact admin: \n http://localhost/jty/contact.php ";
			$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
			mail($email,$subject,$message,$from);	
		}
	}
	else
	{
		?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Incorrect !",
				  text : "You Have Enter Incorrect Password!",
				  icon: "error",
				  button: "Retry"}).then(function(){window.location.href = "stud_changepass.php";});
			</script>
			<?php
	}
}
?>
   
				</form>
		
</div>
   </section>
   
 

    <?php 
    
    //include("includes/footer.php");
    
    ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
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
<?php include("connect.php");
	if(!isset($_SESSION['student']))
	{
        
        echo "<script>window.open('stud_login.php','_self')</script>";
        
    }
	else
	{}
?>