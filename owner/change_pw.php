<?php
			include("connect.php");
			$userData = $_SESSION["OWNDETAIL"];
			$name     = $userData['owner_name'];
			$oid     = $userData['owner_id'];
			$pw = $userData["owner_pass"];
			if(!isset($_SESSION['OWNDETAIL']))
			{
					echo "<script>window.open('owner_login.php','_self')</script>";
			}
			else
			{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Change Password</title>
        <link href="css/style.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
<style>		
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
	
    <body class="sb-nav-fixed">
	<?php include("includes/header-nav.php"); ?>
        <div id="layoutSidenav">
            <?php include("includes/side-nav.php"); ?>
			
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Change Password</li>
                        </ol>
						
    <section class="ftco-section testimony-section">

<div id="main-containers">
		<form class="form-signin" method="post" name="ques" enctype="multipart/form-data">
        <h3 class="card-title text-center"><b>Change Password</b></h3>
							
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="old_pw">Current Password</label>
											<input name="old_pw" id="old_pw" type="password" placeholder="Please enter your current password" class="form-control" required>
												<input type="checkbox" onclick="myFunctionRE1()"> Show Password
													<script>
														function myFunctionRE1() 
														{
														  var x = document.getElementById("old_pw");
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
								<br>
								
								<div class="row">
									<div class="col-xl-12">
										<div id="password_rules"> 
											<div class="form-label-group">
												<label for="ans">New Password</label>
												<input class="form-control" placeholder="Enter New Password" onkeyup="validate_entries();" id="pass" type="password" name="newpass" size="35" oninvalid="setCustomValidity('Please match the requested format. Ex) Aa12345@ ');" oninput="setCustomValidity('')" title="Ex) Aa12345@" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}$"/>
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
											</div>
										</div>
								</div>
								<br>
								
								<div class="row">
									<div class="col-xl-12">
										<div id="password_rules"> 
											<div class="form-label-group">
												<label for="ans">Confirm Password</label>
												<input class="form-control" placeholder="Confirm New Password" required onkeyup="validate_entries();" id="conf" type="password" name="conf" size="35" />
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
								<br>
						  <button id="submitbtn" name="submitbtn" class="btn btn-primary btn-block signup" type="submit"><i></i> Submit</button>
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <!--<hr class="my-4">-->
				</form>
</div>
   </section>
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
<?php

if(isset($_POST["submitbtn"]))
{
	$op   = $_POST["old_pw"];
	$np   = $_POST["newpass"];
	$cp   = $_POST["conf"];
	
	if($op != $pw)
	{
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">
		swal({title: "Wrong Password !",
		text : "Please Enter Again!",
		icon: "error",
		button: "Retry"}).then(function(){window.location.href = "change_pw.php";});
		</script>
		<?php
	}
	
	else if($np != $cp)
	{
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">
		swal({title: "Password Mismatch !",
		text : "Please Enter Again!",
		icon: "error",
		button: "Retry"}).then(function(){window.location.href = "change_pw.php";});
		</script>
		<?php
	}
	
	else
	{
		mysqli_query($connect, "update owner set owner_pass = '$np' where owner_id = '$oid'")
		?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">
		swal({title: "You Have Change The Password Successfully!",
		text : "",
		icon: "success",
		button: "Login"}).then(function(){window.location.href = "owner_login.php";});
		</script>
		<?php
	}
}
?>
                    </div>
                </main>
				<?php include("includes/footer.php"); ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php } ?>