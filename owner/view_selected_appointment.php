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
    <section class="ftco-section testimony-section">
					<?php
					if(isset($_GET["id"]))
					{
						$id=$_GET["id"];
						$app = mysqli_query($connect, "SELECT * from appointment where OwnId = '$oid' and Id='$id'"); 	
					}	
					$row=mysqli_fetch_assoc($app);
					$hid=$row['HosId'];
					$sid=$row['StudId'];
					$stud=mysqli_query($connect, "SELECT * from studregister where User_id = '$sid'");
					$row1 = mysqli_fetch_assoc($stud);
					$stud1 = $row1['Studname'];
					$hos=mysqli_query($connect, "SELECT * from hostel where ID = '$hid'");
					$row2 = mysqli_fetch_assoc($hos);
					$hos1 = $row2['HosName'];
					?>
<div id="main-containers">
		<form class="form" action="##" method="post" id="registrationForm">
        <h3 class="card-title text-center"><b>Appointment</b></h3><br><hr><br>
							
							<div style="text-align:center;">
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="studcourse">Student Name</label>
											<p><?php echo $stud1;?></p>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="hosname">Hostel Name</label>
											<p><?php echo $hos1;?></p>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="date">Date</label>
											<p><?php echo $row['Date'];?></p>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="time">Time</label>
											<p><?php echo $row['Time'];?></p>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="studcourse">Message</label>
											<p><?php echo $row['Message'];?></p>
										</div>
									</div>
								</div>
								
								<?php if($row['OwnPassKey']=="0"){ ?>
								<br><p><i>Please pass the key to admin before the appointment.</i></p>
								<button id="submitbtn" name="submitbtn" class="btn btn-primary signup" type="submit"><i></i> Already Passed Key</button>
								<?php } else{ ?>
								<p><i>You already passed the key to admin. Thank You!</i></p>
								<?php }?>
								
						  <!--<hr class="my-4">-->
					</div>
				</form><br>
</div>
   </section>
<?php

if(isset($_POST["submitbtn"]))
{
	$check=mysqli_query($connect, "select * from appointment where OwnPassKey!='0' and Id='$id'");
	
	if(mysqli_num_rows($check) > 0)
	{     
        ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "No need to pass the key again!",
				  icon: "error",
			button: "Back"}).then(function(){window.location.href = "#";});
			</script>
		<?php       
    }
	else
	{
		mysqli_query($connect, "update appointment set OwnPassKey='1' where Id='$id'");
		?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "You have passed the key to admin successfully!",
				  icon: "success",
			button: "Back"}).then(function(){window.location.href = "view_appointment.php";});
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