<?php include("connect.php"); 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log In</title>
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
	
<!--login-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="./disk/slidercaptcha.css" rel="stylesheet" />
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="./disk/longbow.slidercaptcha.js"></script>
	<style>
       
        .slidercaptcha {
            margin: 0 auto;
            width: 314px;
            height: 286px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.125);
            margin-top: 40px;
        }

            .slidercaptcha .card-body {
                padding: 1rem;
            }

            .slidercaptcha canvas:first-child {
                border-radius: 4px;
                border: 1px solid #e6e8eb;
            }

            .slidercaptcha.card .card-header {
                background-image: none;
                background-color: rgba(0, 0, 0, 0.03);
            }

            .refreshIcon {
                top: -54px;
            }
    </style>

	 </head>
  <body>

  
    <!-- END nav -->

    <section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" name="loginform">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password is required" >
						<div class="slidercaptcha card">
						<div class="card-header">
							<span>Drag To Verify</span>
						</div>
												
						<div class="card-body">
								<div id="captcha"></div>
						</div>
						<input name="capcha" id="capcha2" value="" style="display:none;" >
					</div>
							<script>
							$('#captcha').sliderCaptcha({
							  onSuccess:function() 
							  {
								  document.getElementById('capcha2').value = 1;
							  }
							});

							$('#captcha').sliderCaptcha({
							  width: 280,
							  height: 155,
							  sliderL: 42,
							  sliderR: 9,
							  offset: 5,
							  loadingText:'Loading...',
							  failedText:'Try It Again',
							  barText:'Slide the Puzzle',
							  repeatIcon:'fa fa-repeat',
							  maxLoadCount: 3,
							  localImages:function () {// uses local images instead
							  return 'images/Pic' + Math.round(Math.random() * 4) +'.jpg';
							  }
							});
							</script>
						<br>
						<button class="login100-form-btn" name="login" >Login</button>
					

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="stud_forgetchoose.php">
							Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="stud_register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true" ></i>
						</a>
					</div>
				</form>
			</div>
		</div>
    </section>

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
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  
  <!--login-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
  </body>
</html>
<?php

if(isset($_POST["login"]))
{
	
	$email = $_POST["email"];
	$pass  = $_POST["pass"];
	$s=$_POST["capcha"];
	$qry = "SELECT * from studregister where Studemail= '$email'  ";
	$mail = mysqli_query($connect,$qry);
	
	$qrySel = "SELECT * from studregister where Studemail= '$email' and Password='$pass' ";
	$result = mysqli_query($connect,$qrySel);
	$res = mysqli_query($connect,$qrySel);
	$sta = mysqli_fetch_array($res);
	
	if(mysqli_num_rows($mail) !='1')
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
	else
	{
		if(mysqli_num_rows ($result) == '0')
			{
				?> 
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Please Try Again",
						  text : "You Have Enter Wrong Password!",
						  icon: "error",
						  button: "Relogin"}).then(function(){window.location.href = "stud_login.php";});
					  </script>
				<?php
				
			}
		else 
		{
			if ($sta["StudStatus"]==0 )
			{
				?> 
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Admin Haven't Approve!",
							  text : "Please Wait For Admin To Approve",
							  icon: "error",
							  button: "Sorry Please Try Next Time"}).then(function(){window.location.href = "index.php";});
						  </script>
				<?php
				
			}
			else if($sta["StudIsDelete"]==1)
			{
				?> 
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Your Account Has Been Barred!",
							  text : "Please Contact Admin To Retrieve Your Account",
							  icon: "error",
							  button: "Sorry Please Try Next Time"}).then(function(){window.location.href = "index.php";});
						  </script>
				<?php
			}
			else
			{
				
				$row = mysqli_fetch_array($result);
			
					$_SESSION['student'] = $row ;
					if($s==1)
					{
						?><script>document.location="index.php";</script><?php
					
					}
					else
					{
						?> 
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Please Try Again",
							  text : "Please Complete The Captcha!",
							  icon: "error",
							  button: "Relogin"}).then(function(){window.location.href = "stud_login.php";});
						  </script>
					<?php
					}
				
			}
		}
	}
}

?>

