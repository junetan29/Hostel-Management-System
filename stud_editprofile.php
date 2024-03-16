<?php include ("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Profile</title>
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

</style>
  </head>
  <body>

    <?php include("includes/header-navigation.php"); ?>
	  
    <!-- END nav -->
    
<section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');" >
<h2 style="text-align:center"><b>Edit Profile</b></h2>
<div id="main-containers">
    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
		<div class="heading-section pt-md-5">
            <?php
		
				if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					
					$sid = $userData["User_id"];
					$name = $userData["Studname"];
					$ic = $userData["Studic"];
					$sex = $userData["Gender"];
					$contact = $userData["Studphnum"];
					$course = $userData["CousId"];
					$add = $userData["Studaddress"];
					$state = $userData["StaId"];
					$post = $userData["Postcode"];
					$email = $userData["Studemail"];
					$img = $userData["StudProfile"];
				}
				
				
				
			?>
				
                <form action="#" method="post" enctype="multipart/form-data">
                  <div class="row">
								<div class="col-md-12 form-group">
									<div class="form-label-group">
										<label for="Profile">Profile Picture</label>
											
											<p>
												<img src="img/Student/<?php echo $userData['StudProfile']; ?>" style="width:250px;height:250px;">
												Profile:<span class = "error">* </span>
												<input type="file" name="spro"   value="<?php echo $userData['StudProfile'];  ?> ">
											</p>
												
									</div>
								</div>
                    <div class="col-md-12 form-group">
                      <label for="studname">Name</label>
								<input type="text" id="studname" name="studname" value="<?php echo $name; ?>" class="form-control" >
                    </div>
					<div class="col-md-2 form-group">
                      <div class="border-radio">
									
									<label>Gender</label>
										<p><input type="radio" name="gender" value="Male"  <?php if($sex=="Male"){ echo "checked";}?> disabled>Male</p>
										<p><input type="radio" name="gender" value="Female" <?php if($sex=="Female"){ echo "checked";}?> disabled>Female</p>
									
									</div>
                    </div>
					<div class="col-md-12 form-group">
                      <label for="studphnum">Phone Number</label>
                      <input type="text" id="studphnum" name="studphnum" pattern="[0]{1}[1]{1}[0-9]{8,9}" title ="digit only" value="<?php echo $contact; ?>" class="form-control" >
                    </div>
					<div class="col-md-12 form-group">
                      <label for="studcourse">Student Course</label>
                      <select id="studcourse" name="studcourse" class="form-control">
											<option>--Select--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM course ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Id']; ?>" 
															<?php if($course == $row['Id'])
																echo "selected";
															?>><?php echo $row["CourseTitle"]; ?></option>
													
													<?php
												}
											?>
										</select>
                    </div>
					<?php
					if($userData["Nation"]=='Malaysian')
					{
					?>
					<div class="col-md-12 form-group">
                      <label for="studcurrentadress">Current Address</label>
                      <input type="text" id="studcurrentadress" name="studcurrentadress" value="<?php echo $add; ?>" class="form-control">
                    </div>
					
					<div class="col-md-12 form-group">
                      <label for="state">State</label>
										<select id="inputState" name="state" class="form-control">
											<option>State</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM state ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['ID']; ?>" 
															<?php if($state == $row['ID'])
																echo "selected";
															?>><?php echo $row["State"]; ?></option>
													
													<?php
												}
											?>
										</select></div>
					
					<div class="col-md-12 form-group">
                      <label for="postcode">Postcode</label>
						<input type="text" id="postcode" name="postcode" pattern="[0-9]+" title ="digit only" class="form-control" value="<?php echo $post; ?>"  maxlength="5">
					</div>
					<?php
					}
					else
					{}
					?>
					<div class="col-md-12 form-group">
                      <label for="studemail">Email address</label>
                      <input type="email" id="studemail" name="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                    </div>
                    </div>	
                  
					<div class="row">
					<div class="col-md-6 form-group">
					<button id="submitbtn" name="edit" type="submit"> Keep Change</button>
                    </div>
                  </div>
					
                  </div>
   
                </form>
			  
              </div>
			  
			  <?php 
				
if(isset($_POST["edit"]))
{
	$name  = $_POST["studname"];
	$ic        = $userData["Studic"];
	$phnum = $_POST["studphnum"];
	$course= $_POST["studcourse"];
	$curadd= $_POST["studcurrentadress"];
	$state = $_POST["state"];
	$code  = $_POST["postcode"];
	$email = $_POST["email"];
	$old=$userData["StudProfile"];
	
		if(isset($_FILES['spro']['name'])&&($_FILES['spro']['name']!=""))
		{
			$newpro=$_FILES['spro']['name'];
			$target1 = "img/Student/".basename($newpro);
			//1st delete old file
			
			unlink("img/Student/$old");
			
			//new img upload
			move_uploaded_file($_FILES['spro']['tmp_name'],$target1);
		}
		else
		{
			$newpro=$old;
		}
	
	$check = mysqli_query($connect,"SELECT * FROM studregister where Studemail = '$email'");
		
		
			if($email != $userData["Studemail"])
			{
				if(mysqli_num_rows($check) >0)
				{
					?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Email has been Use!",
							  text: "Please enter another email!",
							  icon: "error",
							  button: "Retry"}).then(function(){window.location.href = "stud_editprofile.php";});
						</script>
					<?php	
				}
				else
				{
					$update = mysqli_query($connect,"UPDATE studregister SET Studname = '$name', Studphnum = '$phnum', CousId = '$course', StudProfile='$newpro', Studaddress = '$curadd', StaId = '$state', Postcode = '$code',Studemail = '$email' WHERE User_id = '$sid'");
					?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
							swal({title: "Edit Successful!",
								  icon: "success",
								  button: "Relogin"}).then(function(){window.location.href = "stud_login.php";});
						</script>
					<?php
					
				}
			}
			
			else
			{
				$update = mysqli_query($connect,"UPDATE studregister SET Studname = '$name', Studphnum = '$phnum', CousId = '$course', StudProfile='$newpro', Studaddress = '$curadd', StaId = '$state', Postcode = '$code',Studemail = '$email' WHERE User_id = '$sid'");
					?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
							swal({title: "Edit Successful!",
								  icon: "success",
								  button: "Relogin"}).then(function(){window.location.href = "stud_login.php";});
						</script>
					<?php
			}
			
			
		
	}
			  ?>
			 
        </div>
      </div>
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