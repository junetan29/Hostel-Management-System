<?php
			include("connect.php");
			$userData = $_SESSION["ADMINAREAID"];
			$name     = $userData['owner_name'];
			if(!isset($_SESSION['ADMINAREAID']))
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
        <title>JTY HOSTEL - Owner</title>
        <link href="design/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
    </head>
	
    <body class="sb-nav-fixed">
	<?php include("includes/header-nav.php"); ?>
        <div id="layoutSidenav">
			<?php
					if(isset($_SESSION["ADMINAREAID"]))
					{
						$userData = $_SESSION["ADMINAREAID"];
						$aid = $userData["Admin_id"];						
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
                            <li class="breadcrumb-item active">Dashboard > Owner Profile</li>
                        </ol>
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Owner Profile
                            </div>
							
									<div class="container bootstrap snippet">
										<div class="row">
										
											<div class="col-sm-12"><h1></h1></div>
											</div>
										<div class="row">
											<div class="col-sm-3"><!--left col-->
											<?php
											if(isset($_GET["id"]))
											{
												$id=$_GET["id"];
												$result=mysqli_query($connect,"SELECT * from owner where owner_id='$id'");
												$userData=mysqli_fetch_assoc($result);
												$Sta = $userData["StaId"];
												$res = mysqli_query($connect, "SELECT * from state where ID='$Sta'");
												$userData1 = mysqli_fetch_array($res);
												
												$Sec1 = $userData["Que1"];
												$res1 = mysqli_query($connect, "SELECT * from secureque where Id='$Sec1'");
												$userData2 = mysqli_fetch_array($res1);
												
												$Sec2 = $userData["Que2"];
												$res2 = mysqli_query($connect, "SELECT * from secureque where Id='$Sec2'");
												$userData3 = mysqli_fetch_array($res2);
												
												$Sec3 = $userData["Que3"];
												$res3 = mysqli_query($connect, "SELECT * from secureque where Id='$Sec3'");
												$userData4 = mysqli_fetch_array($res3);
											}
											?>
										  <div class="text-center">
										  <form class="form"  method="post" enctype="multipart/form-data">
											<img src="../img/Owner/<?php echo $userData["owner_image"]; ?>" class="avatar img-thumbnail" alt="<?php echo $userData['owner_name']; ?>">
											<br><br>
											<!--<label class="btn btn-success d-block px-1 py-2">
											<input type="file" name="Image1" style="display:none;" class="text-center center-block file-upload"> Upload Image
				                            </label>
											<input class="btn btn-info" type="submit" name="save" value="Save Images" style="padding: 0.5rem 1rem;">-->
				                          </form>  
										  </div></hr><br>

											</div><!--/col-3-->
											
											<div class="col-sm-9">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#home"><?php echo $userData['owner_name']; ?>'s Profile</a></li>
													<!--<li class="active"><a data-toggle="tab" href="#messages">Edit Profile</a></li>-->
												  </ul>
												  
											  <div class="tab-content">
												<div class="tab-pane active" id="home">
													<br>
													  <form class="form" action="##" method="post" id="registrationForm">
															<div class="row">
																	  <div class="col-xl-6">
																		  <label for="first_name"><h5>Name</h5></label>
																		  <p><?php echo $userData['owner_name']; ?></p>
																	  </div>
																	  
																	  <div class="col-xl-6">
																	  <?php
																	  if($userData["HOwner_nationality"]=='Malaysian')
																	  {
																	  ?>
																		  <label for="ic"><h5>Identity Card</h5></label>
																		  <p><?php echo $userData['owner_ic']; ?></p>
																	  <?php
																	  }
																	  else if($userData["HOwner_nationality"]=='Non-Malaysian')
																	  {
																		  ?>
																		   <label for="ic"><h5>Passport</h5></label>
																		  <p><?php echo $userData['ownerPassport']; ?></p>
																	  <?php
																	  }
																	  ?>
																	  </div>
															</div>
															<br>
															<div class="row">
																	  <div class="col-xl-6">
																		<label for="gender"><h5>Gender</h5></label>
																		  <p><?php echo $userData['gender']; ?></p>
																	  </div>
																	  
																	  <div class="col-xl-6">
																		<label for="phone"><h5>Contact Number</h5></label>
																		  <p><?php echo $userData['owner_phnum']; ?></p>
																	  </div>
															</div>
															<br>
															<div class="row">
																	  <div class="col-xl-6">
																		<label for="Race"><h5>Race</h5></label>
																		  <p><?php echo $userData['HOwner_race']; ?></p>
																	  </div>
																	  
																	  <div class="col-xl-6">
																		<label for="Nationality"><h5>Nationality</h5></label>
																		  <p><?php echo $userData['HOwner_nationality']; ?></p>
																	  </div>
															</div>
															<br>
															<div class="row">
																	  <div class="col-xl-6">
																		<label for="Address"><h5>Address</h5></label>
																		  <p><?php echo $userData['owner_currentaddress']; ?></p>
																	  </div>
																	  
																	  <div class="col-xl-6">
																		<label for="Postcode"><h5>Postcode</h5></label>
																		  <p><?php echo $userData['postcode']; ?></p>
																	  </div>
															</div>
															<br>
															<div class="row">
																	  <div class="col-xl-6">
																		<label for="State"><h5>State</h5></label>
																		  <p><?php echo $userData1['State']; ?></p>
																	  </div>
																	  
																	  <div class="col-xl-6">
																	  <label for="email"><h5>Email</h5></label>
																	  <p><?php echo $userData['owner_email']; ?></p>
															  </div>
															</div>
															<div class="row">
																	
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<?php
																			  if($userData["HOwner_nationality"]=='Malaysian')
																			  {
																			  ?>
																				  <label for="ic"><h5>Owner Ic</h5></label>
																				  <p><?php echo $userData['owner_ic']; ?></p>
																			  <?php
																			  }
																			  else if($userData["HOwner_nationality"]=='Non-Malaysian')
																			  {
																				  ?>
																				   <label for="ic"><h5> Owner Passport</h5></label>
																			  <?php
																			  }
																			  ?>
																			<br><a href="#" id="pop">
																			<embed id="imagesource" src="../img/Owner/<?php echo $userData["owner_icpic"]; ?>" style="width:100%; height:400px;" >
																			</a>
																		</div>
																	</div>
																</div><br>
															<br>
															<div class="row">
																	<div class="col-xl-8">
																		<div class="form-label-group">
																			<label for="sq1">Secruity Question 1</label>
																			<input type="email" id="sq1" name="sq1" class="form-control" value="<?php echo $userData2["Question"] ?>" disabled>
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Answer</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="<?php echo $userData["Ans1"] ?>" disabled >
																					
																		</div>
																	</div>
																	
																</div><br>

																<div class="row">
																	<div class="col-xl-8">
																		<div class="form-label-group">
																			<label for="sq2">Secruity Question 2</label>
																			<input type="email" id="sq2" name="sq2" class="form-control" value="<?php echo $userData3["Question"] ?>" disabled>
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Answer</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="<?php echo $userData["Ans2"] ?>" disabled >
																					
																		</div>
																	</div>
																	
																</div><br>

																<div class="row">
																	<div class="col-xl-8">
																		<div class="form-label-group">
																			<label for="sq3">Secruity Question 3</label>
																			<input type="email" id="sq3" name="sq3" class="form-control" value="<?php echo $userData4["Question"] ?>" disabled>
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Answer</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="<?php echo $userData["Ans3"] ?>" disabled >
																					
																		</div>
																	</div>
																	
																</div><br>
														  
														  <div class="col-md-12"><!-- col-md-12 Begin -->

																<?php if($userData['OwnerStatus']=="0" && $userData['OwnerIsDelete']=="0"){ ?>
																<a href="tel:+6<?php echo $userData['owner_phnum']; ?>" class="btn btn-info d-block px-2 py-3"><span class="fa fa-phone mr-1"></span>Call to <?php echo $userData['owner_phnum']; ?></a> 
																<br>
																<button class="btn btn-primary d-block px-2 py-3" name="checked" id="btn" style="width:100%;"> Approve</button>
																<br>
																<a href="owner_list.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php } else if($userData['OwnerIsDelete']=="1"){ ?>
																<button class="btn btn-primary d-block px-2 py-3" name="unremove" id="btn" style="width:100%;"> Unremove</button>
																<br>
																<a href="owner_delete.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<br>
																<?php }
																else { ?>
																<a href="owner_list.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php }?>
																  
															</div><!-- col-md-12 Finish -->
													</form>



												<?php
													if(isset($_POST["checked"]))
													{
														$Id=$userData["owner_id"];
														$email = $userData["owner_email"];
														$name = $userData["owner_name"];
														mysqli_query($connect,"update owner set OwnerStatus=1, Admin_id = '$aid' where owner_id='$Id'");
														?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "Successful Approved!",
															  icon: "success",
															  button: "Review"}).then(function(){window.location.href = "owner_list.php";});
														</script>
												  <?php
													$subject = "JTYHostel";
													$message = "Hi ".$name.".\nYour registration has been approve.\n\nClick the link at below to login our webpage:\n http://localhost/jty/owner/owner_login.php  \n\n Thank you for Choosing Us";
													$from = "From: JTYHostel <jtyhostel@gmail.com>";
															
													mail($email,$subject,$message,$from);	
													}	
													if(isset($_POST["unremove"]))
													{
														$Id=$userData["owner_id"];
														$email = $userData["owner_email"];
														$name = $userData["owner_name"];
														mysqli_query($connect,"update owner set OwnerIsDelete=0, AdminDel=0 where owner_id='$Id'");
														?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "Unremove Successful!",
															  icon: "success",
															  button: "Review"}).then(function(){window.location.href = "owner_list.php";});
														</script>
												  <?php
														$subject = "JTYHostel";
														$message = "Hi ".$name.".\nYour account has been unbarred.\nYou may click the link at below to login our webpage:\n\n http://localhost/jty/owner/owner_login.php  \n\nHope you can follow our terms and condition in future.\nThank you for Choosing Us. ";
														$from = "From: JTYHostel <jtyhostel@gmail.com>";
																
														mail($email,$subject,$message,$from);	
													}
													?>
												  
												  <hr>
												  
												 </div><!--/tab-pane-->
												 <!--<div class="tab-pane" id="messages">
												   
												   <br>
													  <form class="form"  method="post"  enctype="multipart/form-data">
															<div class="row">
																	  <div class="col-xl-6">
																		  <label for="first_name"><h5>Name</h5></label>
																		  <input type="text" class="form-control" name="owner_name" id="owner_name" value="?php echo $userData['owner_name']; ?>">
																	  </div>
																	  <div class="col-xl-6">
																		  <label for="ic"><h5>Identity Card</h5></label>
																		  <input type="text" class="form-control" name="owner_ic" id="owner_ic" value="?php echo $userData['owner_ic']; ?>">
																	  </div>
															</div>
															<br>
														  <div class="row">	  
																	  <div class="col-xl-6">
																		<label for="gender"><h5>Gender</h5></label>
																		  <input type="text" class="form-control" name="gender" id="gender" value="?php echo $userData['gender']; ?>">
																	  </div>
																	  <div class="col-xl-6">
																		<label for="phone"><h5>Contact Number</h5></label>
																		  <input type="text" class="form-control" name="phone" id="phone" value="?php echo $userData['owner_phnum']; ?>">
																	  </div>
															</div>
															<br>
															<div class="row">	  
																	  <div class="col-xl-6">
																		<label for="race"><h5>Race</h5></label>
																		  <input type="text" class="form-control" name="race" id="race" value="?php echo $userData['HOwner_race']; ?>">
																	  </div>
																	  <div class="col-xl-6">
																		<label for="nationality"><h5>Nationality</h5></label>
																		  <input type="text" class="form-control" name="nationality" id="nationality" value="?php echo $userData['HOwner_nationality']; ?>">
																	  </div>
															</div>
															<br>
															<div class="row">	  
																	  <div class="col-xl-6">
																		<label for="address"><h5>Address</h5></label>
																		  <input type="text" class="form-control" name="address" id="address" value="?php echo $userData['owner_currentaddress']; ?>">
																	  </div>
																	  <div class="col-xl-6">
																		<label for="postcode"><h5>Postcode</h5></label>
																		  <input type="text" class="form-control" name="postcode" id="postcode" value="?php echo $userData['postcode']; ?>">
																	  </div>
															</div>
															<br>
															<div class="row">	  
																	  <div class="col-xl-6">
																		<label for="state"><h5>State</h5></label>
																		  <input type="text" class="form-control" name="state" id="state" value="?php echo $userData['state']; ?>">
																	  </div>
															</div>
															<br>
														  <div class="row">
															  <div class="col-xl-6">
																  <label for="email"><h5>Email</h5></label>
																  <input type="email" class="form-control" name="email" id="email" value="?php echo $userData['owner_email']; ?>" title="enter your email.">
															  </div>
															  <div class="col-xl-6">
																  <label for="password"><h5>Password</h5></label>
																  <input type="password" id="owner_pass" name="owner_pass" class="form-control" placeholder="Password" value="?php echo $userData['owner_pass']; ?>"
													pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
													title="Must contain at least one number and 
													one uppercase and lowercase letter, and at 
													least 8 or more characters" required >
													<progress max="100" value="0" id="strength" style="width:230px"></progress>
													<script type="text/javascript">
														var pass = document.getElementById("owner_pass")
														pass.addEventListener('keyup',function(){checkPassword(pass.value)})
														function checkPassword(owner_pass){
															var strengthBar=document.getElementById("strength")
															var strength=0;
															if(owner_pass.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
																strength+=1;
															}
															if(owner_pass.match(/[~<>?]+/)){
																strength+=1;
															}
															if(owner_pass.match(/[!@#$%^&*()]+/)){
																strength+=1;
															}
															if(owner_pass.length>5){
																strength+=1;
															}
															switch(strength){
																case 0:
																	strengthBar.value=20;break
																case 1:
																	strengthBar.value=40;break
																case 2:
																	strengthBar.value=60;break
																case 3:
																	strengthBar.value=80;break
																case 4:
																	strengthBar.value=100;break
															}
														}
													</script><br>
																  <input type="checkbox" onclick="myFunction()"> Show Password

																	<script>
																	function myFunction() {
																	  var x = document.getElementById("owner_pass");
																	  if (x.type === "password") {
																		x.type = "text";
																	  } else {
																		x.type = "password";
																	  }
																	}
																	</script>
															  </div>
														  </div>
														 
														  
														  <div class="row">
															   <div class="col-xs-6">
																	<br>
																	<input name="update" value="Update User" type="submit" class="btn btn-primary form-control">
																</div>
																<div class="col-xs-6">
																	<br>
																	<input name="reset" value="Reset" type="reset" class="btn btn-warning form-control">
																</div>
																
														  </div>
													</form>
												  
												  <hr>
												   
												 </div>-><!--/tab-pane-->
												
												   
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
    </body>
</html>

<?php 
/*if(isset($_POST['save']))
{
	$Image1 = $_FILES['Image1']['name'];
    $target1 = "../img/Owner/".basename($Image1);//only images/ and prodimg can be change images/ is place to save img, prodimg from form
    
    move_uploaded_file($_FILES['Image1']['tmp_name'],$target1);

    $update = "update owner set owner_image='$Image1' where owner_id='$id'";
	
	$run_owner_images = mysqli_query($connect,$update);
    
    if($run_owner_images)
	{     
        ?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Your image is updated Successful!",
									  icon: "success",
								button: "Back"}).then(function(){window.location.href = "login/login.php";});
								</script>
								<?php       
    }
}

if(isset($_POST['update'])){
    
    $name = $_POST['owner_name'];
    $ic = $_POST['owner_ic'];
    $gen = $_POST['gender'];
	$contact = $_POST['phone'];
	$race = $_POST['race'];
	$nat = $_POST['nationality'];
	$add = $_POST['address'];
	$postcode = $_POST['postcode'];
	$state = $_POST['state'];
    $email = $_POST['email'];
    $pass = $_POST['owner_pass'];
    
    $check = mysqli_query($connect,"SELECT * FROM owner where owner_email = '$email'");
	
							if($ic != $userData["owner_ic"])
							{
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "IC cannot be changed!",
									  icon: "error",
									  button: "Retry"}).then(function(){window.location.href = "view_owner.php";});
								</script>
								<?php	
							}
						
							else
							{
								$update =mysqli_query($connect,"update owner set owner_name='$name',gender='$gen',owner_phnum='$contact',HOwner_race='$race',HOwner_nationality='$nat',owner_currentaddress='$add',postcode='$postcode',
								state='$state',owner_email='$email',owner_pass='$pass' where owner_ic='$ic'");
								
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Edit Successful!",
									  icon: "success",
								button: "Back"}).then(function(){window.location.href = "owner_list.php";});
								</script>
								<?php
							}
						
						if($email != $userData["owner_email"])
						{
							if(mysqli_num_rows($check) > 0)
							{
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Email has been Use!",
									  text: "Please enter another email!",
									  icon: "error",
									  button: "Retry"}).then(function(){window.location.href = "view_owner.php";});
								</script>
								<?php	
							}
						
							else
							{
								$update =mysqli_query($connect,"update owner set owner_name='$name',gender='$gen',owner_phnum='$contact',HOwner_race='$race',HOwner_nationality='$nat',owner_currentaddress='$add',postcode='$postcode',
								state='$state',owner_email='$email',owner_pass='$pass' where owner_ic='$ic'");
								
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Edit Successful!",
									  icon: "success",
								button: "Back"}).then(function(){window.location.href = "owner_list.php";});
								</script>
								<?php
							}
						}
						
						else
						{
							$update =mysqli_query($connect,"update owner set owner_name='$name',gender='$gen',owner_phnum='$contact',HOwner_race='$race',HOwner_nationality='$nat',owner_currentaddress='$add',postcode='$postcode',
								state='$state',owner_email='$email',owner_pass='$pass' where owner_ic='$ic'");
								
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Edit Successful!",
									  icon: "success",
								button: "Back"}).then(function(){window.location.href = "owner_list.php";});
								</script>
								<?php
						}
}*/
?>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:830px;" >
    <div class="modal-content">
      <div class="modal-header"> 
		<h4 class="modal-title" id="myModalLabel">IC Preview</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 100%; height: 100%;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#imagesource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>
<?php } ?>