<?php include("connect.php");
if(!isset($_SESSION['SUSERDETAIL'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - SB Admin</title>
        <link href="design/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
		
		
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
                            <li class="breadcrumb-item active">Dashboard > Edit Student</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Student
                            </div>
                            <div class="card-body">
                                
								<div id="main-containers">
								<?php
									if(isset($_GET["id"]))
									{
										
									
									$id=$_GET["id"];
									$result=mysqli_query($connect,"SELECT * from studregister where User_id='$id'");
									$row=mysqli_fetch_assoc($result);
									$name = $row["Studname"];
										$ic = $row["Studic"];
										$sex = $row["Gender"];
										$contact = $row["Studphnum"];
										$course = $row["Studcourse"];
										$add = $row["Studaddress"];
										$state = $row["State"];
										$post = $row["Postcode"];
										$email = $row["Studemail"];
										$img = $row["StudProfile"];
										$pwd = $row["Password"];
									}
								?>
								
												<form class="" method="post" name="" enctype="multipart/form-data">
															<div class="row">
																<div class="col-xl-4">
																	<div class="form-label-group">
																		<label for="studname" >Name</label>
																		<input type="text" id="studname" name="studname" class="form-control" value="<?php echo $name ?>" >
																	</div>
																</div>
																
																<div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="studic">Identity Card</label>
																		<input type="text" id="studic" name="studic" class="form-control"  value="<?php echo $ic ?>" disabled>
																	</div>
																</div>
																<div class="col-xl-2">
																	<div class="form-label-group">
																		<label for="studgender">Gender</label>
																		<input type="text" id="studgender" name="studgender" class="form-control" value="<?php echo $sex ?>" disabled>
																	</div>
																</div>
																<div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="studphnum">Phone Number</label>
																		<input type="text" id="studphnum" name="studphnum" class="form-control" value="<?php echo $contact ?>" >
																	</div>
																</div>
															</div><br>
															
															
																<div class="row">
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<label for="studcourse">Student Course</label>
																			<select id="studcourse" name="studcourse" class="form-control">
																				<option>--Select--</option>
																				<?php
																					
																					$select = mysqli_query($connect,"SELECT * FROM course ");
																					while($row = mysqli_fetch_assoc($select))
																					{
																						?>
																						
																						<option value="<?php echo $row['CourseTitle']; ?>" 
																								<?php if($course == $row['CourseTitle'])
																									echo "selected";
																								?>><?php echo $row["CourseTitle"]; ?></option>
																						
																						<?php
																					}
																				?>
																			</select>
																		</div>
																	</div>
																</div>
																<br>
																
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Profile">Profile Picture</label>
																			<?php echo "<img src='img/Student/".$row['StudProfile']."' width='200px' height='200px' >" ?><br>
																			<input type="file" name="profile" value="<?php print $row['StudProfile'] ?>">
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Offerletter">Offer Letter</label>
																			<?php echo "<img src='img/Student/".$row['StudProfile']."' width='200px' height='200px' >" ?><br>
																			<input type="file" name="profile" value="<?php print $row['StudProfile'] ?>">
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<label for="studcurrentaddress">Current Address</label>
																			<input type="text" id="studcurrentadress" name="studcurrentadress" value="<?php echo $add; ?>" class="form-control">
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="state">State</label>
																				<select id="State" name="state" class="form-control">
																				<option>State</option>
																				<?php
																					
																					$select = mysqli_query($connect,"SELECT * FROM state ");
																					while($row = mysqli_fetch_assoc($select))
																					{
																						?>
																						
																						<option value="<?php echo $row['State']; ?>" 
																								<?php if($state == $row['State'])
																									echo "selected";
																								?>><?php echo $row["State"]; ?></option>
																						
																						<?php
																					}
																				?>
																				</select>
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="postcode">Postcode</label>
																			<input type="text" id="postcode" name="postcode" class="form-control" value="<?php echo $post; ?>"  maxlength="5">
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studemail">Email address</label>
																			<input type="email" id="studemail" name="email" value="<?php echo $email; ?>" class="form-control">
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Password</label>
																			<input type="text" id="studpassword" name="studpassword" value="<?php echo $pwd; ?>" class="form-control">
																					
																		</div>
																	</div>
																	
																</div><br>
															
															
											
															<div class="col-md-12"><!-- col-md-12 Begin -->
													  
																<button id="submitbtn" name="edit" type="submit" class="btn btn-primary form-control" style="width:100%"> Keep Change</button>
																  
															</div><!-- col-md-12 Finish -->

												</form>
										
								</div>
			  <?php 
				
if(isset($_POST["edit"]))
{
	$name  = $_POST["studname"];
	$ic    = $_POST["studic"];
	$sex   = $_POST["gender"];
	$phnum = $_POST["studphnum"];
	$course= $_POST["studcourse"];
	$curadd= $_POST["studcurrentadress"];
	$state = $_POST["state"];
	$code  = $_POST["postcode"];
	$email = $_POST["email"];
	
	$oldpro=$row["StudProfile"];
		
		if(isset($_FILES['pro']['name'])&&($_FILES['pro']['name']!=""))
		{
			$newpro=$_FILES['pro']['name'];
			$target1 = "img/Student/".basename($newpro);
			//1st delete old file
			
			unlink("img/Student/$oldpro");
			
			//new img upload
			move_uploaded_file($_FILES['pro']['tmp_name'],$target1);
		}
		else
		{
			$newpro=$oldpro;
		}
	
	
	
	$check = mysqli_query($connect,"SELECT * FROM studregister where Studemail = '$email'");
		if($ic != $row["Studic"])
			{
				?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Ic cannot be change!",
						  icon: "warning",
						  button: "Retry"}).then(function(){window.location.href = "stud_editprofile.php";});
					</script>
				<?php
			}
		else
		{
			if($email != $row["Studemail"])
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
					$update = mysqli_query($connect,"UPDATE studregister SET Studname = '$name', Gender = '$sex', Studphnum = '$phnum', Studcourse = '$course', Studaddress = '$curadd', State = '$state', Postcode = '$code',Studemail = '$email' WHERE Studic = '$ic'");
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
				$update = mysqli_query($connect,"UPDATE studregister SET Studname = '$name', Gender = '$sex', Studphnum = '$phnum', Studcourse = '$course', StudProfile='$newpro', Studaddress = '$curadd', State = '$state', Postcode = '$code',Studemail = '$email' WHERE Studic = '$ic'");
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
	}
			  ?>				
								
								
								
								
								
								
								
								
								
								
								
								
								
								
                            </div>
                        </div>	
							
						




						
							
							
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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