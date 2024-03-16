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
    <section class="ftco-section testimony-section" >

<div id="main-containers">
		<form class="form-signin" method="post" name="ques" enctype="multipart/form-data">
        <h3 class="card-title text-center"><b>Forget Password</b></h3>
				<h3 class="card-title text-center"><b>Please Choose Type In Reset Password</b></h3>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
												<a href="stud_forgetemail.php" id="submitbtn" name="submitbtn" class="btn btn-lg btn-primary btn-block text-uppercase signup" type="submit"><i class="fa fa-envelope-o"></i> By Email</a>
										</div>
									</div>
								</div>	
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
												<a href="stud_forgetpass.php" id="submitbtn" name="submitbtn" class="btn btn-lg btn-primary btn-block text-uppercase signup" type="submit"><i class="fa fa-lock"></i> By Security Question</a>
										</div>
									</div>
								</div>	
								
							<!--<hr class="my-3">-->
						
							<!--<hr class="my-2">-->
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
							
						  <!--<hr class="my-4">-->

				</form>
		
</div>
   </section>
   
   <?php

if(isset($_POST["submitbtn"]))
{
	$email = $_POST["email"];
	$q1   = $_POST["ques1"];
	$a1   = $_POST["ans1"];
	
	$qrySel = "SELECT * from studregister where Studemail= '$email' ";
	$result = mysqli_query($connect,$qrySel);
	$row1 = mysqli_fetch_array($result);
	
	
	if (mysqli_num_rows($result) !=0)
	{
		if($q1 == $row1['Que1'] )
		{
			if($a1  == $row1["Ans1"])
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You have enter correct question and answet !",
					  text : "You Wiil Be Lead To Chaneg Password!",
					  icon: "success",
					  button: "Proceed"}).then(function(){window.open('stud_forgetpass2.php?id=<?php echo $email ?>','_self');});
				</script>
				<?php
			}
			else
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You Have Enter Wrong Answer!",
						text : "Please Enter Correct Answer!",
						icon: "error",
						button: "Retry"}).then(function(){window.location.href = "stud_forgetpass.php";});
				</script>
				<?php
			}
		}
		else if($q1 == $row1['Que2'] )
		{
			if($a1  == $row1["Ans2"])
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You have enter correct question and answet !",
					  text : "You Wiil Be Lead To Change Password!",
					  icon: "success",
					  button: "Proceed"}).then(function(){window.open('stud_forgetpass2.php?id=<?php echo $email ?>','_self');});
				</script>
				<?php
			}
			else
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You Have Enter Wrong Answer!",
						text : "Please Enter Correct Answer!",
						icon: "error",
						button: "Retry"}).then(function(){window.location.href = "stud_forgetpass.php";});
				</script>
				<?php
			}
		}
		else if($q1 == $row1['Que3'] )
		{
			if($a1  == $row1["Ans3"])
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You have enter correct question and answet !",
					  text : "You Wiil Be Lead To Chaneg Password!",
					  icon: "success",
					  button: "Proceed"}).then(function(){window.open('stud_forgetpass2.php?id=<?php echo $email ?>','_self');});
				</script>
				<?php
			}
			else
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You Have Enter Wrong Answer!",
						text : "Please Enter Correct Answer!",
						icon: "error",
						button: "Retry"}).then(function(){window.location.href = "stud_forgetpass.php";});
				</script>
				<?php
			}
		}
		else
		{
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "You Have Select Wrong Question For Question !",
					text : "Please Select Correct Question!",
					icon: "error",
					button: "Retry"}).then(function(){window.location.href = "stud_forgetpass.php";});
			</script>
			<?php
		}
	}
	else
	{
		?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "You Have Enter Wrong Email!",
				  text : "Please Enter Correct Email!",
				  icon: "error",
				  button: "Retry"}).then(function(){window.location.href = "stud_forgetpass.php";});
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
