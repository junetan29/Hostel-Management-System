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
        <title>Contact</title>
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
                            <li class="breadcrumb-item active">Dashboard > Contact Admin</li>
                        </ol>
							
						<div class="card mb-4">
<section class="ftco-section bg-light">
			<div class="container">
				
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper">
							
							<div class="row no-gutters">
							
								<div class="col-md-12">
									<div class="contact-wrap w-100 p-md-5 p-4">
									<div class="row justify-content-center">
											<h2 class="heading-section">Contact Admin</h2>
									</div>
										<h3 class="mb-4">Inquiry Us</h3>
										<form method="POST" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Full Name</label>
														<input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>">
													</div>
												</div>
												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="email">Email Address</label>
														<input type="email" class="form-control" name="email" id="email" value="<?php echo $userData['owner_email'];?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="subject">Subject</label>
														<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Message</label>
														<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" name="submitbtn" value="Send Message" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
<?php

if(isset($_POST["submitbtn"]))
{
	$name    = $_POST["name"];
	$email   = $_POST["email"];
	$subject = $_POST["subject"];
	$mss     = $_POST["message"];
	
	mysqli_query ($connect, "INSERT INTO contact (Name, Email, Subject, Message) values ('$name', '$email', '$subject', '$mss')");
	
	?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
		<script type="text/javascript">
			swal({
			title: "Respond had been sent!",
			icon:"success"
			});
		</script>
<?php
}
?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.986416807804!2d102.27552675475975!3d2.249012702827866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56b9710cf4b%3A0x66b6b12b75469278!2sMultimedia%20University!5e0!3m2!1sen!2smy!4v1588469402460!5m2!1sen!2smy" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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