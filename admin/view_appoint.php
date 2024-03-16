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
        <title>JTY HOSTEL - Appointment</title>
        <link href="design/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
		
		
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
                            <li class="breadcrumb-item active">Dashboard > View Appointment</li>
                        </ol>
							
							
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Appointment
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
												
												$result=mysqli_query($connect,"SELECT * from appointment where Id='$id'");
												$row=mysqli_fetch_assoc($result);
												$hid = $row["HosId"];
												$sid = $row["StudId"];
												
												$hos = mysqli_query($connect, "SELECT * from hostel where ID = '$hid' ");
												$hos1 = mysqli_fetch_array($hos);
												$cid = $hos1["Cat_id"];
												
												$cat = mysqli_query($connect, "SELECT * from category where ID ='$cid'");
												$cat1 = mysqli_fetch_array($cat);
												
												$stud = mysqli_query($connect, "SELECT * from studregister where User_id = '$sid'");
												$stud1 = mysqli_fetch_array($stud);
												$email = $stud1["Studemail"];
												$name = $stud1["Studname"];
												}
											?> 	  

										  

											</div><!--/col-3-->
											
											<div class="col-sm-12">
											
												  
											  <div class="tab-content">
												<div class="tab-pane active" id="home">
													<br>
													  <form class="form" action="##" method="post" id="Reply">
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-label-group">
																		<label for="StudName" >Student Name</label>
																		<input type="text" id="StudName" name="StudName" class="form-control" value="<?php echo $stud1["Studname"] ?>" disabled>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-label-group">
																		<label for="studphnum">Owner Name</label>
																		<input type="text" id="studphnum" name="studphnum" class="form-control"  value="<?php echo $stud1["Studphnum"] ?>" disabled>
																	</div>
																</div>
																
															</div>
															<br>
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-label-group">
																		<label for="Category">Category</label>
																		<input type="text" id="Category" name="Category" class="form-control"  value="<?php echo $cat1["Category"] ?>" disabled>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-label-group">
																		<label for="HosName">Hostel Title</label>
																		<input type="text" id="HosName" name="HosName" class="form-control" value="<?php echo $hos1["HosName"] ?>" disabled>
																	</div>
																</div>
															</div><br>
															<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Date">Appointment Date</label>
																			<input type="text" id="Date" name="Date" class="form-control"  value="<?php echo $row["Date"] ?>" disabled>
																		</div>
																	</div>
																
															
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Time">Appointment Time</label>
																			<input type="text" id="Time" name="Time" class="form-control" value="<?php echo $row["Time"] ?>" disabled>
																		</div>
																	</div>
																</div><br>
																
																
															<div class="row">
																<div class="col-xl-12">
																<div class="form-label-group">
																  <label for="Message"> Message By Student </label> 
																  
																	  <textarea name="Message" id="Message" name="Message" cols="112" rows="5" class="form-control" disabled><?php echo $row["Message"] ?></textarea>
																  </div>
																</div>   
															</div>
															<br>
															
															<?php if($row['Approve']=="0"){ ?>	
															<div class="row">
																<div class="col-xl-12">
																<div class="form-label-group">
																  <label for="Message"> Reply Student (If need to rearrange time) </label> 
																  
																	  <textarea name="Message" id="Message" name="Message" cols="112" rows="5" class="form-control" ></textarea>
																  </div>
																</div>   
															</div>
															<?php }?>
															<br>
																
														 
														  
														  <div class="row">

								
													  
																<?php if($row['Approve']=="0"){ ?>
																<div class="col-xl-6">
																<button class="btn btn-success d-block px-2 py-3" name="checked" id="btn" style="width:100%;"> Approve</button>
																</div>
																
																<div class="col-xl-6">
																<button class="btn btn-info d-block px-2 py-3" name="sent" id="btn" style="width:100%;"> Send Mail</button>
																</div>
																<br>
															</div><br>
															<div class="row">
																<div class="col-xl-12">
																<a href="student_appoint.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<br>
																</div>
															</div>
															
															<div class="row">
																<?php }
																else { ?>
																<div class="col-xl-12">
																<a href="student_appoint.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																</div>
																<?php }?>
																  
															</div><!-- col-md-12 Finish -->
															<br>

												</form>
												

												  
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
    </body>
</html>
 <?php
 if(isset($_POST['checked']))
 {
	
	$subject = "JTYHostel";
	$message = "Hi ".$name.".\nYour appointment has been approved. Please come on time.\n\nRegards,\nAdminstor JTY Hostel.";
	$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
	mail($email,$subject,$message,$from);	
	
	mysqli_query($connect, "update appointment set Approve='1' where Id='$id'");
	?> 
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "Approve Successfully!",
					  icon: "success",
					  button: "Back"}).then(function(){window.location.href = "student_appoint.php";});
				  </script>
		<?php
	}}
if(isset($_POST["sent"]))
{
	$mss = $_POST["Message"];
	$subject = "JTYHostel";
	$message = "Hi ".$name.",\n\n".$mss."\n\nRegards,\nAdminstor JTY Hostel.";
	$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
	mail($email,$subject,$message,$from);	
}
	?>
