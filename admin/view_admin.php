<?php include("connect.php");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - My Profile</title>
        <link href="design/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	
    <body class="sb-nav-fixed">
	<?php include("includes/header-nav.php"); ?>
        <div id="layoutSidenav">
			<?php
					if(isset($_SESSION["ADMINAREAID"]))
					{
						$userData = $_SESSION["ADMINAREAID"];
												
					}
					if($userData['AdminType']=='SuperAdmin')
					{
					include("includes/side-nav.php");
					}
					else
					{
					include("includes/side-nav-normaladmin.php");
					}
			?> 
			
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > View Admin</li>
                        </ol>
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Admin Profile
                            </div>
							
									<div class="container bootstrap snippet">
										<div class="row">
										
											<div class="col-sm-12"><h1></h1></div>
											</div>
										<div class="row">
											<div class="col-sm-3"><!--left col-->
											<?php
											if(isset($_SESSION["ADMINAREAID"]))
											{
												$userData = $_SESSION["ADMINAREAID"];
												$id = $userData["Admin_id"];
											}
											?> 	  

										  <div class="text-center">
										  <form class="form"  method="post" enctype="multipart/form-data">
											<img src="../img/Admin/<?php echo $userData["Pic"]; ?>" class="avatar img-thumbnail" alt="<?php echo $userData["Name"]; ?>">
											<br><br>
											<label class="btn btn-success d-block px-1 py-2">
											<input name="admin_image" type="file" style="display:none;" class="text-center center-block file-upload"> Upload Image
				                            </label>
											<input class="btn btn-lg btn-info " type="submit" name="editimages" value="Save Images">
				                           </form>
										  </div></hr><br>

											</div><!--/col-3-->
											
											<div class="col-sm-9">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#home">My Profile</a></li>
													<li ><a data-toggle="tab" href="#messages">Edit Profile</a></li>
													<li ><a data-toggle="tab" href="#change">Edit Password</a></li>
												  </ul>
											
												  
											  <div class="tab-content">
												<div class="tab-pane active" id="home">
													<br>
													  <form class="form" action="##" method="post" id="registrationForm">
															<div class="row">
																	  <div class="col-xl-6">
																		  <label for="first_name"><h5>Admin Name</h5></label>
																		  <p><?php echo $userData['Name']; ?></p>
																	  </div>
																  
																	  <div class="col-xl-6">
																		<label for="last_name"><h5>Contact Number</h5></label>
																		  <p><?php echo $userData['Contact']; ?></p>
																	  </div>
															</div>
															<br>
														  <div class="row">
															  <div class="col-xl-12">
																  <label for="email"><h5>Email</h5></label>
																  <p><?php echo $userData['Email']; ?></p>
															  </div>
														  </div>
														 
														  
														  <div class="row">
															   <div class="col-xl-12">
																	<br>
																	<a href="index.php" class="btn btn-primary d-block px-1 py-2 " id="btn">Back</a>
																</div>
														  </div>
													</form>
												  
												  <hr>
												  
												 </div><!--/tab-pane-->
												 <div class="tab-pane" id="messages">
												   
												   <br>
													  <form class="form"  method="post"  enctype="multipart/form-data">
													  <div class="row">
															  <div class="col-xl-12">
																  <label for="email"><h5>Email</h5></label>
																  <input type="email" class="form-control" name="email" id="email" value="<?php echo $userData['Email']; ?>" disabled>
															  </div>
															  
														  </div><br>
															<div class="row">
																	  <div class="col-xl-6">
																		  <label for="first_name"><h5>Admin Name</h5></label>
																		  <input type="text" class="form-control" name="admin_name" id="admin_name" value="<?php echo $userData['Name']; ?>">
																	  </div>
																  
																	  <div class="col-xl-6">
																		<label for="last_name"><h5>Contact Number</h5></label>
																		  <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $userData['Contact']; ?>">
																	  </div>
															</div>
															<br>
														  
														  
														  <div class="row">
															   <div class="col-xs-6">
																	<br>
																	<input name="update" value="Update Profile" type="submit" class="btn btn-primary form-control">
																</div>
																<div class="col-xs-6">
																	<br>
																	<input name="reset" value="Reset" type="reset" class="btn btn-warning form-control">
																</div>
																
														  </div>
													</form>
												  
												  <hr>
												   
												 </div><!--/tab-pane-->
												 
												 <div class="tab-pane" id="change">
												   
												   <br>
													  <form class="form"  method="post"  enctype="multipart/form-data">
															<div class="row">
															  <div class="col-xl-12">
																  <label for="latest">Latest Password</label>
																  <input type="password" class="form-control" name="latest" id="latest" value=""  >
																	<input type="checkbox" onclick="myFunctionLE()"> Show Password
																	<script>
																							function myFunctionLE() 
																							{
																							  var x = document.getElementById("latest");
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
														  </div><br>
														  
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
																						
																		<br><br><div class="form-group"><b>Confirm Password: </b><input class="form-control" required onkeyup="validate_entries();" id="conf" type="password" name="conf" size="35" />
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
														  
														  <div class="row">
															   <div class="col-xs-6">
																	<br>
																	<input name="updatepassword" value="Update" type="submit" class="btn btn-primary form-control">
																</div>
																<div class="col-xs-6">
																	<br>
																	<input name="reset" value="Reset" type="reset" class="btn btn-warning form-control">
																</div>
																
														  </div>
													</form>
												  
												  <hr>
												   
												 </div><!--/tab-pane-->
												 
												
												   
												  </div><!--/tab-pane-->
											  </div><!--/tab-content-->

											</div><!--/col-9-->
										</div><!--/row-->			
										
								
								
						</div>		
					</div>			
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>
		<script src="js/images.js"></script>
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
    </body>
</html>

<?php 

if(isset($_POST['editimages'])){
    
    $admin_images = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    
    move_uploaded_file($temp_admin_image,"../img/Admin/$admin_images");
    
    
    
    $update_admin = "update admin set Pic='$admin_images' where Admin_id='$id'";
    
    $run_admin_images = mysqli_query($connect,$update_admin);
    
    if($run_admin_images){
        
        echo "<script>alert('Admin images has been updated sucessfully')</script>";
        echo "<script>window.open('login/login.php','_self')</script>";
        
        session_destroy();
        
    }
    
}

if(isset($_POST['update'])){
    
    $admin_name = $_POST['admin_name'];
	$admin_contact = $_POST['phone'];
    
    
    
    $update_admin = "update admin set Name='$admin_name',Contact='$admin_contact' where Admin_id='$id'";
    
    $run_admin = mysqli_query($connect,$update_admin);
    
    if($run_admin){
        
        echo "<script>alert('Admin details has been updated sucessfully')</script>";
        echo "<script>window.open('login/login.php','_self')</script>";
        
        session_destroy();
        
    }
    
}

if(isset($_POST['updatepassword'])){
	$l     =$_POST["latest"];
	$pass      = $_POST["newpass"];
	$cpass    = $_POST["conf"];
    
	
	
	$result = mysqli_query($connect, "SELECT * from admin where Admin_id = '$id'");
	$row= mysqli_fetch_array($result);
	
	if ($l == $row["Password"])
	{
		if($pass != $cpass)
				{
					?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
					<script type="text/javascript">
						swal({
						title: "Password Does Not Match	!",
						text:"Please Try Again!",
						icon:"error"
						});
					</script>
					<?php
				}
		else
		{
		$update_admin = "update admin set Password='$pass' where Admin_id='$id'";
		
		$run_admin = mysqli_query($connect,$update_admin);
		
		if($run_admin){
			
			echo "<script>alert('Admin Password has been updated sucessfully')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			
			
			}
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
				  button: "Retry"}).then(function(){window.location.href = "view_admin.php";});
			</script>
			<?php
	}
    
}
?>


<?php } ?>