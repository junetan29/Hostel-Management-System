<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Security Question</title>
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
  <body>

    <?php include("includes/header-navigation.php"); ?>

    <!-- END nav -->
	<?php
		if(isset($_SESSION["student"]))
		{
			$userData = $_SESSION["student"];
			$name = $userData["Studname"];
			$q1 = $userData["Que1"];
			$q2 = $userData["Que2"];
			$q3 = $userData["Que3"];
			$a1 = $userData["Ans1"];
			$a2 = $userData["Ans2"];
			$a3 = $userData["Ans3"];
		}
		
	?>
    <section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');">

<div id="main-containers">
		<form class="form-signin" method="post" name="ques" enctype="multipart/form-data">
		<h2 style="margin-left:250px;text-align:center;"><input type="text" name="nm" style="border:1px solid white;" value=" Hi <?php echo $name ?>"><h2>
        <h3 class="card-title text-center"><b>Security Question</b></h3>
							
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="studcourse">Question 1</label>
											<select id="question" name="ques1" class="form-control" disabled>
											<option>--Select Question--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM secureque ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Id']; ?>" 
															<?php if($q1 == $row['Id'])
																echo "selected";
															?>><?php echo $row["Question"]; ?></option>
													
													<?php
												}
											?>
										</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 1 </label>
											<input disabled type="text" id="ans" name="ans1" class="form-control" placeholder="Answer For Question1" value="<?php echo $a1 ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="question">Question 2</label>
											<select id="question" name="ques2" class="form-control" disabled>
											<option>--Select Question--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM secureque ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Id']; ?>" 
															<?php if($q2 == $row['Id'])
																echo "selected";
															?>><?php echo $row["Question"]; ?></option>
													
													<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 2 </label>
											<input disabled type="text" id="ans" name="ans2" class="form-control" placeholder="Answer For Question 2 " value="<?php echo $a2 ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="question">Question 3</label>
											<select id="question" name="ques3" class="form-control" disabled>
											<option>--Select Question--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM secureque ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Id']; ?>" 
															<?php if($q3 == $row['Id'])
																echo "selected";
															?>><?php echo $row["Question"]; ?></option>
													
													<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 3 </label>
											<input disabled type="text" id="ans" name="ans3" class="form-control" placeholder="Answer For Question 3" value="<?php echo $a1 ?>" required>
										</div>
									</div>
								</div>
								
							<!--<hr class="my-3">-->
						
							<!--<hr class="my-2">-->
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
								 <a href="index.php" id="submitbtn" name="submitbtn" class="btn btn-lg btn-primary btn-block text-uppercase signup" type="submit"><i class="fa fa-tick"></i> Done</a>

							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <!--<hr class="my-4">-->

				</form>
		
</div>
   </section>
   

   

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
<?php include("connect.php");
	if(!isset($_SESSION['student']))
	{
        
        echo "<script>window.open('stud_login.php','_self')</script>";
        
    }
	else
	{}
?>