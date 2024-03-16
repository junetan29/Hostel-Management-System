<?php
			include("connect.php");
			$userData = $_SESSION["OWNDETAIL"];
			$name     = $userData['owner_name'];
			
			if(isset($_GET["id"]))
			{
				$id = $_GET["id"];
				$sql="select * from book where Id = '$id'";
				$result=mysqli_query($connect,$sql);
				$row=mysqli_fetch_assoc($result);
				$sid=$row["StudId"];
				
				$sql2 ="select * from studregister where User_id = '$sid' ";
				$result2 = mysqli_query($connect,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$stid=$row2["StaId"];
				
				$state1=mysqli_query($connect, "SELECT * from state where ID = '$stid'");
				$row1 = mysqli_fetch_assoc ($state1);
			}
			
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
        <title>View Student</title>
        <link href="css/style.css" rel="stylesheet" />
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
                            <li class="breadcrumb-item active">Dashboard > View Student</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                View Student
                            </div>
                            <div class="card-body">
                                
								<div id="main-containers">

												<form class="" method="" name="" enctype="multipart/form-data">
															<?php if($row['Status']=="paid"){ ?>
															<div class="row">
																<div class="col-xl-4">
																	<div class="form-label-group">
																		<label for="studname" >Name</label>
																		<input type="text" id="studname" name="studname" class="form-control" placeholder="Name" value="<?php echo $row2['Studname'];?>" disabled>
																	</div>
																</div>
																<div class="col-xl-3">
																	<div class="form-label-group">
																<?php
																	if($row2["Nation"]=='Malaysian')
																	{
																			?>
																		
																				<label for="studic">Identity Card</label>
																				<input type="text" id="studic" name="studic" class="form-control" placeholder="Identity Card" value="<?php echo $row2['Studic'];?>" disabled>
																			
																	<?php
																	}
																	else if($row2["Nation"]=='Non-Malaysian')
																	{
																		?>
																				<label for="studic">Passsport Number</label>
																				<input type="text" id="pass" name="pass" class="form-control" placeholder="Passsport Number" value="<?php echo $row2['StudPassport'];?>" disabled>
																		<?php	
																	}
																	?>
																	</div>
																</div>
																<div class="col-xl-2">
																	<div class="form-label-group">
																		<label for="studgender">Gender</label>
																		<input type="text" id="studgender" name="studgender" class="form-control" placeholder="Gender" value="<?php echo $row2['Gender'];?>" disabled>
																	</div>
																</div>
																
																<div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="studphnum">Phone Number</label>
																		<input type="text" id="studphnum" name="studphnum" class="form-control" placeholder="Phone Number" value="<?php echo $row2['Studphnum'];?>" disabled>
																	</div>
																</div>
															</div><br>
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																		<?php
																		$c = $row2['CousId'];
																		$co = mysqli_query($connect, "SELECT * from course where Id = '$c'");
																		$co1= mysqli_fetch_array($co);
																		?>
																			<label for="studcourse">Student Course</label>
																			<input type="text" id="studcourse" name="studcourse" class="form-control" placeholder="Student Course" value="<?php echo $co1["CourseTitle"];?>" disabled>
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="studemail">Email address</label>
																			<input type="email" id="studemail" name="studemail" class="form-control" placeholder="Email Address" value="<?php echo $row2['Studemail'];?>" disabled>
																		</div>
																	</div>
																</div>
															<?php }
															else{ ?>
															<div class="row">
																<div class="col-xl-4">
																	<div class="form-label-group">
																		<label for="studname" >Name</label>
																		<input type="text" id="studname" name="studname" class="form-control" placeholder="Name" value="<?php echo $row2['Studname'];?>" disabled>
																	</div>
																</div>
																
																<div class="col-xl-3">
																	<div class="form-label-group">
																	<?php
																	if($row2["Nation"]=='Malaysian')
																	{
																			?>
																		
																				<label for="studic">Identity Card</label>
																				<input type="text" id="studic" name="studic" class="form-control" placeholder="Identity Card" value="<?php echo $row2['Studic'];?>" disabled>
																			
																	<?php
																	}
																	else if($row2["Nation"]=='Non-Malaysian')
																	{
																		?>
																				<label for="studic">Passsport Number</label>
																				<input type="text" id="pass" name="pass" class="form-control" placeholder="Passsport Number" value="<?php echo $row2['StudPassport'];?>" disabled>
																		<?php	
																	}
																	?>
																	</div>
																</div>
																<div class="col-xl-5">
																	<div class="form-label-group">
																		<label for="studgender">Gender</label>
																		<input type="text" id="studgender" name="studgender" class="form-control" placeholder="Gender" value="<?php echo $row2['Gender'];?>" disabled>
																	</div>
																</div>
															</div><br>
															<?php }?>
															
																<br>
																
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Profile">Profile Picture</label>
																			<br><img src="../img/Student/<?php echo $row2["StudProfile"]; ?>" width='300px' height ='300px' class="avatar img-thumbnail" alt="avatar">
																		</div>
																	</div>
																</div><br>
																<?php
																	if($row2["Nation"]=='Malaysian')
																	{
																			?>
																		
																				<div class="row">
																					<div class="col-xl-12">
																						<div class="form-label-group">
																							<label for="studcurrentaddress">Current Address</label>
																							<input type="text" id="studcurrentaddress" name="studcurrentaddress" class="form-control" placeholder="Current Address" value="<?php echo $row2['Studaddress'];?>" disabled>
																						</div>
																					</div>
																				</div><br>
																				
																				<div class="row">
																					<div class="col-xl-6">
																						<div class="form-label-group">
																							<label for="state">State</label>
																								<input type="text" id="State" name="State" class="form-control" placeholder="State" value="<?php echo $row1['State'];?>" disabled>
																						</div>
																					</div>
																					<div class="col-xl-6">
																						<div class="form-label-group">
																							<label for="postcode">Postcode</label>
																							<input type="text" id="postcode" name="postcode" class="form-control" placeholder="Postcode" value="<?php echo $row2['Postcode'];?>" disabled>
																						</div>
																					</div>
																				</div><br>
																				<?php
																	}
																	else
																	{}
																?>
															
															<div class="col-md-12"><!-- col-md-12 Begin -->
													  
																<a href="student_list.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																  
															</div><!-- col-md-12 Finish -->
											</form>
								</div>
                            </div>
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
    </body>
</html>
<?php } ?>