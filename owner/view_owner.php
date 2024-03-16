<?php
			include("connect.php");
			$userData = $_SESSION["OWNDETAIL"];
			$name     = $userData['owner_name'];
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
        <title>My Profile</title>
        <link href="css/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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
                            <li class="breadcrumb-item active">Dashboard > My Profile</li>
                        </ol>
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                My Profile
                            </div>
							
									<div class="container bootstrap snippet">
										<div class="row">
										
											<div class="col-sm-12"><h1></h1></div>
											</div>
										<div class="row">
											<div class="col-sm-3"><!--left col-->
											<?php
											if(isset($_SESSION["OWNDETAIL"]))
											{
												$userData = $_SESSION["OWNDETAIL"];
												$id = $userData["owner_id"];
												$stid = $userData["StaId"];
											}
											$state1=mysqli_query($connect, "SELECT * from state where ID = '$stid'");
											$row1 = mysqli_fetch_assoc ($state1);
											?>
										  <div class="text-center">
										  <form class="form"  method="post" enctype="multipart/form-data">
											<img src="../img/Owner/<?php echo $userData["owner_image"]; ?>" class="avatar img-thumbnail" alt="avatar">
											<br><br>
											<label class="btn btn-success d-block px-1 py-2">
											<input type="file" name="Image1" style="display:none;" class="text-center center-block file-upload"> Upload Image
				                            </label>
											<input class="btn btn-info" type="submit" name="save" value="Save Images" style="padding: 0.5rem 1rem;">
				                          </form>  
										  </div></hr><br>

											</div><!--/col-3-->
											
											<div class="col-sm-9">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#home">My Profile</a></li>
													<li ><a data-toggle="tab" href="#messages">Edit Profile</a></li>
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
																			else
																			{
																				?>
																				 <label for="ic"><h5>Passport number</h5></label>
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
																		  <p><?php echo $row1['State']; ?></p>
																	  </div>
																	  
																	  <div class="col-xl-6">
																	  <label for="email"><h5>Email</h5></label>
																	  <p><?php echo $userData['owner_email']; ?></p>
															  </div>
															</div>
															<br>
														  
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
																	  <div class="col-xl-6">
																		  <label for="first_name"><h5>Name</h5></label>
																		  <input type="text" class="form-control" name="owner_name" id="owner_name" value="<?php echo $userData['owner_name']; ?>">
																	  </div>
																	  <div class="col-xl-6">
																		<label for="phone"><h5>Contact Number</h5></label>
																		  <input type="text" class="form-control" name="phone" id="phone" pattern="[0]{1}[1]{1}[0-9]{8,9}" title ="digit only" value="<?php echo $userData['owner_phnum']; ?>">
																	  </div>
															</div>
															<br>
															<div class="row">	  
																	  <div class="col-xl-6">
																		<label for="race"><h5>Race</h5></label>
																		  <input type="text" class="form-control" name="race" id="race" value="<?php echo $userData['HOwner_race']; ?>">
																	  </div>
																	  
																	  <div class="col-xl-6">
																		<label for="nationality"><h5>Nationality</h5></label>
																		  <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $userData['HOwner_nationality']; ?>" disabled>
																	  </div>
															</div>
															<br>
															<div class="row">	  
																	  <div class="col-xl-6">
																		<label for="address"><h5>Address</h5></label>
																		  <input type="text" class="form-control" name="address" id="address" value="<?php echo $userData['owner_currentaddress']; ?>">
																	  </div>
																	  <div class="col-xl-6">
																		<label for="postcode"><h5>Postcode</h5></label>
																		  <input type="text" class="form-control" name="postcode" id="postcode" pattern="[0-9]+" title ="digit only" value="<?php echo $userData['postcode']; ?>">
																	  </div>
															</div>
															<br>
															<div class="row">	  
																	  <div class="col-xl-6">
																		<label for="state"><h5>State</h5></label>
																		  <select name="state" class="form-control"><!-- form-control Begin -->
																			  <?php
																				$select = mysqli_query($connect,"SELECT * FROM state ");
																				while($row2 = mysqli_fetch_assoc($select))
																				{
																					//$stid=$userData['StaId'];
																					$state2=mysqli_query($connect, "SELECT * from state where ID = '$stid'");
																					$row3 = mysqli_fetch_assoc ($state2);
																					$state3 = $row3['State'];
																					?>
																					<option value="<?php echo $row2['ID']; ?>" <?php if($state3 == $row2['State'])echo "selected";?>><?php echo $row2["State"]; ?></option>
																					<?php
																				}
																			?>
																		  </select><!-- form-control Finish -->
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
												   
												 </div><!--/tab-pane-->
												
												   
												  </div><!--/tab-pane-->
											  </div><!--/tab-content-->

											</div><!--/col-9-->
										</div><!--/row-->			
							
						</div>		
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
		<script src="js/images.js"></script>
    </body>
</html>

<?php 
if(isset($_POST['save']))
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
								button: "Relogin"}).then(function(){window.location.href = "owner_login.php";});
								</script>
								<?php       
    }
}
if(isset($_POST['update'])){
    
    $name = $_POST['owner_name'];
	$contact = $_POST['phone'];
	$race = $_POST['race'];
	$nat = $_POST['nationality'];
	$add = $_POST['address'];
	$postcode = $_POST['postcode'];
	$state = $_POST['state'];
	
	$update =mysqli_query($connect,"update owner set owner_name='$name',owner_phnum='$contact',HOwner_race='$race',HOwner_nationality='$nat',owner_currentaddress='$add',postcode='$postcode',
	StaId='$state' where owner_id='$id'");
	?>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	swal({title: "Edit Successful!",
		  icon: "success",
	button: "Relogin"}).then(function(){window.location.href = "owner_login.php";});
	</script>
	<?php
}
} ?>