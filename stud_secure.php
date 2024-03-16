<?php include ("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Setting</title>
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

* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  margin-left:20px;
  width: 600px;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column2 {
  float: left;
  margin-left:20px;
  width: 900px;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
  </head>
  <body>

    <?php include("includes/header-navigation.php"); ?>
	  
    <!-- END nav -->
    
<section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');" >

<div id="main-containers">
    <section class="site-section">
     
	  <div class="row">
  <div class="column">
    <h2><b><i class="fa fa-cog fa-spin "></i> Account Setting</b></h2>
			<h5> Manage information about your account and payments</h5>
				<div class="heading-section pt-md-5">
					
						<h4><a href="stud_profile.php" style="color:#031B88"><i class="fa fa-user"></i> Profile Information</a></h4>
						<h6><a href="stud_profile.php" style="color:black">View your name, phone numbers, and email address</a></h6>
				
						<p><h4><a href="stud_editprofile.php" style="color:#031B88"><i class="fa fa-pencil"></i> Edit Profile Information</a></h4>
						<h6><a href="stud_editprofile.php" style="color:black">Edit your name, phone numbers, and email address</a></h6>
					
				</div>
  </div>
  <form method="post">
  <div class="column2">
    <h2><b><i class="fa fa-unlock-alt"></i> Security </b></h2>
			<h5> Change your password and view your security question and answer</h5>
				<div class="heading-section pt-md-5">	
						<p><h4><a href="studque.php" style="color:#031B88" name="sq"><i class="fa fa-lock"></i> Security Question</a></h4>
						<h6><a href="studque.php" style="color:black" name="sq">View security question </a></h6> 
					
						<p><h4><a href="stud_changepass.php" style="color:#031B88"><i class="fa fa-key"></i> Change Password</a></h4>
						<h6><a href="stud_changepass.php" style="color:black">It's good idea to use a strong password that you don't use elsewhere</a></h6> 
					
				</div>
  </div>
  </form>
	</div>
    </section>
	</div>
	</section>
    <!-- END section -->

 <?php 
	
    include("includes/footer.php");
    
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