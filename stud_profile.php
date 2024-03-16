<?php include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile</title>
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
	<link rel="stylesheet" href="css/box.css">
	
	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
		<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" style="font-size:24px"></i></button>



  </head>
  <body>

    <?php include("includes/header-navigation.php");?>
	  
<section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');" >
<h2 style="text-align:center"><b> My Profile</b></h2>
<div id="main-containers">
	<section class="site-section">
	<div class="profile">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
		<div class="heading-section pt-md-5">
				<?php
				if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					
				}
				?>
                <form action="#" method="post" id="pro">
				<div class="pro">
                  <div class="row">
					<div class="col-md-12 form-group">
					 <?php echo "<img src='img/Student/".$userData['StudProfile']."' width='200px' height='200px'>" ?>
  
                    </div>
                    <div class="col-md-12 form-group">
                      <label ><span class="detailsbold">Student Name:</span><?php echo $userData['Studname']; ?></label><hr>
                    </div>
					<div class="col-md-12 form-group">
						<?php
						$na = $userData["Nation"];
						if($na =='Malaysian')
						{
							?>
                      <label><span class="detailsbold">Identity Card:</span><?php echo $userData['Studic']; ?></label>
							<?php
						}
						else
						{
							?>
                      <label><span class="detailsbold">Passport:</span><?php echo $userData['StudPassport']; ?></label>
							<?php
						}
						?>
					
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Gender:</span><?php echo $userData['Gender']; ?></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Phone Number:</span><?php echo $userData['Studphnum']; ?></label>
                    </div>
					<div class="col-md-12 form-group">
					<?php 
					$cou = $userData["CousId"];
					$cour = mysqli_query($connect, "SELECT * from course where Id = '$cou'");
					$cour1= mysqli_fetch_array($cour);
					?>
                      <label><span class="detailsbold">Course:</span><?php echo $cour1["CourseTitle"]; ?></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Address:</span><?php echo $userData['Studaddress']; ?></label>
                    </div>
					<div class="col-md-12 form-group">
					<?php
					$sta = $userData["StaId"];
					$st = mysqli_query($connect, "SELECT * from state where ID ='$sta'");
					$st1 = mysqli_fetch_array($st);
					?>
                      <label><span class="detailsbold">State:</span><?php echo $st1['State']; ?></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Postcode:</span><?php echo $userData['Postcode']; ?></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Email:</span><?php echo $userData['Studemail']; ?></label>
                    </div>
                    </div>	
                  <div class="col-md-12 form-group">
					  <a class="btn btn-primary" href="stud_editprofile.php" input type="submit" name="editprofile">Edit Profile</a>				  
                    </div>
                  </div>
   
                </form>
              </div>
			 
        </div>
      
    </section>
	</div>
	</div>
	</div>
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
	
	<script>
	function logout(){
		document.location = "logout.php";
	}
		
	</script>

    
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