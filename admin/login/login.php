<?php include("../connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->




	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="./disk/slidercaptcha.css" rel="stylesheet" />
	
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
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

	



		<div class="container-login100">
		
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="https://img.icons8.com/plasticine/500/000000/home.png"/>	
				</div>

				<form class="login100-form validate-form" method="post" name="loginform">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="adminemail" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
				
					<div class="slidercaptcha card">
						<div class="card-header">
							<span>Drag To Verify</span>
						</div>
												
						<div class="card-body">
								<div id="captcha"></div>
						</div>
						<input name="capcha" id="capcha2" value="" style="display:none;" >
					</div>
					<script src="./disk/longbow.slidercaptcha.js"></script>
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
						<a class="txt2" href="admin_forgotpass.php">
							Password?
						</a>
					</div>

					

					
				</form>
			</div>
		</div>



		





</body>
</html>
<?php 

if(isset($_POST["login"]))
{
	
	$adminemail = $_POST["adminemail"];
	$password  = $_POST["password"];
	$qrySel = "SELECT * from admin where Email= '$adminemail' and Password='$password' ";
	$s=$_POST["capcha"];
	
	$result = mysqli_query($connect,$qrySel);
	
	if ( mysqli_num_rows ($result)== 0)
	{
		?> 
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "Password or Email are invaild!",
					  text : "Please Try Again",
					  icon: "error",
					  button: "Relogin"}).then(function(){window.location.href = "login.php";});
				  </script>
		<?php
		
	}
	else
	{
		
		$row = mysqli_fetch_array($result);
	
			$_SESSION['ADMINAREAID'] = $row ;

			if($s==1)
			{
				?><script>document.location="../index.php";</script><?php
			}
			else
			{
				?> 
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "Please Try Again",
					  text : "Please Complete The Captcha!",
					  icon: "error",
					  button: "Retry"}).then(function(){window.location.href = "login.php";});
				  </script>
			<?php
			}
		
				
	}
}

?>