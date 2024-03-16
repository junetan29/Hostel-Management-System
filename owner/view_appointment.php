<?php
			include("connect.php");
			$userData = $_SESSION["OWNDETAIL"];
			$name     = $userData['owner_name'];
			$oid     = $userData['owner_id'];
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
        <title>View Appointment</title>
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
                            <li class="breadcrumb-item active">Dashboard > View Appointment</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                View Appointment
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID.</th>
                                                <th>Student Name</th>
												<th>Hostel Name</th>
                                                <th>Date</th>
                                                <th>View</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Appointment ID.</th>
                                                <th>Student Name</th>
                                                <th>Hostel Name</th>
                                                <th>Date</th>
                                                <th>View</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
							
                                        <tbody>
								<?php
						
							$hos=mysqli_query($connect, "SELECT * from hostel where Own_id='$oid'");
							$i=1;
							while($row2= mysqli_fetch_array($hos))
							{
								$hos1 = $row2['HosName'];
								$hidd = $row2["ID"];
								$app = mysqli_query($connect, "SELECT * from appointment where HosId='$hidd' and AppoinIsDelete=0 order by Date asc");
								
								
								while($userData = mysqli_fetch_array ($app))
								{	
									$hid=$userData['HosId'];
									$sid=$userData['StudId'];
									$stud=mysqli_query($connect, "SELECT * from studregister where User_id = '$sid'");
									$row1 = mysqli_fetch_assoc($stud);
									$stud1 = $row1['Studname'];
									
									?>
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $stud1;?></td>
													<td><?php echo $hos1;?></td>
													<td><?php echo $userData['Date'];?></td>
													<td><a class="btn btn-primary btn-sm" href="view_selected_appointment.php?id=<?php echo $userData['Id']; ?>">
															  <i class="fas fa-folder">
															  </i>
															  View
														</a>
													</td>
													<?php if($userData['OwnPassKey']==0){ ?>
													<td><a class="btn btn-warning btn-sm" href="#">
																  <i class="fa fa-hourglass-start">
																  </i>
																  Haven't Pass Key
															 </a></td>
													<?php }else{?>
													<td><a class="btn btn-success btn-sm" href="#">
																  <i class="fa fa-check-circle">
																  </i>
																  Already Pass Key
															 </a></td>
													<?php }?>
												</tr>
							<?php 
									$i++;
								}
							}
						?>
                                        </tbody>
						
                                    </table>
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
<?php }	 ?>