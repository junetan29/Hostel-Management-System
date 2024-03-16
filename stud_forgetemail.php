<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Forget Password</title>
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





	 </head>
  <body style="background-image: url('images/login.jpg');">


    <!-- END nav -->
	<?php
		if(isset($_SESSION["student"]))
		{
			$userData = $_SESSION["student"];
			$name = $userData["Studname"];
		}
		
	?>
    <section class="ftco-section testimony-section">

<div id="main-containers">
		<form class="form-signin" method="post" name="mail" enctype="multipart/form-data">
        <h3 class="card-title text-center"><b>Forget Password</b></h3>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Email</label>
											<input type="text" id="email" name="email" class="form-control" placeholder="Enter Your Email Address" required>
										</div>
									</div>
								</div>	
								
							<!--<hr class="my-3">-->
						
							<!--<hr class="my-2">-->
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <button id="submitbtn" name="submitbtn" class="btn btn-lg btn-primary btn-block text-uppercase signup" type="submit"><i class="fa fa-check"></i> Send</button>
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <!--<hr class="my-4">-->

				</form>
		
</div>
   </section>
   
   <?php
	function random_string()
		{
			$character_set_array = array();
			$character_set_array[] = array('count' => 5, 'characters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
			$character_set_array[] = array('count' => 3, 'characters' => '0123456789');
			$temp_array = array();
			foreach ($character_set_array as $character_set) 
			{
				for ($i = 0; $i < $character_set['count']; $i++) 
				{
					$temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
				}
			}
			shuffle($temp_array);
			return implode('', $temp_array);
		}
		
	if(isset($_POST["submitbtn"]))
	{
		$email = $_POST["email"];
		
		$qrySel = "SELECT * from studregister where Studemail= '$email' ";
		$result = mysqli_query($connect,$qrySel);
		
		$currdate = date("Y-m-d H:i:s");  	
		$after_date = date("Y-m-d H:i:s",strtotime("+1 hours", strtotime($currdate)));
		
		if (mysqli_num_rows($result)!= 0)
		{
			$pin = random_string();

			$result = mysqli_query($connect,"update studregister set secu_pin = '$pin',secu_date = '$after_date' where Studemail = '$email'");
			
			$subject = "Security Pin";
			$message = "You can change your password by using this security pin and click the link at below:\n\n http://localhost/jty/stud_secuchangepass.php \n\nSecurity Pin: ".$pin." \n\n Thank you.\n\nThe sucurity pin is just only valid within 1 hour.";
			$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
			mail($email,$subject,$message,$from);	
		
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
			<script type="text/javascript">
				   swal({
					   title: "Successful!",
					   text:"You can check your email to reset password.",
					   icon:"success"
					   });
			</script>
			<?php
		}
		else
		{
			?> 
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Please Register",
						  text : "Your Account Has Not Register Yet!",
						  icon: "error",
						  button: "Register"}).then(function(){window.location.href = "stud_register.php";});
					  </script>
			<?php
			
			
		}
	}
	?>
   

    <?php 
    
    //include("includes/footer.php");
    
    ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
