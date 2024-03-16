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
                            <li class="breadcrumb-item active">Dashboard > Edit Owner</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Owner
                            </div>
                            <div class="card-body">
                                
								<div id="main-containers">

												<form class="" method="" name="" enctype="multipart/form-data">
															<div class="row">
																<div class="col-xl-4">
																	<div class="form-label-group">
																		<label for="ownername" >Name</label>
																		<input type="text" id="ownername" name="ownername" class="form-control" placeholder="Name" value="XH TAN" >
																	</div>
																</div>
																
																<div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="owneric">Identity Card</label>
																		<input type="text" id="owneric" name="owneric" class="form-control" placeholder="Identity Card" value="0008010736" >
																	</div>
																</div>
																<div class="col-xl-2">
																	<div class="form-label-group">
																		<label for="ownergender">Gender</label>
																		<input type="text" id="ownergender" name="ownergender" class="form-control" placeholder="Gender" value="Female" >
																	</div>
																</div>
																<div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="ownerphnum">Phone Number</label>
																		<input type="text" id="ownerphnum" name="ownerphnum" class="form-control" placeholder="Phone Number" value="0115123435" >
																	</div>
																</div>
															</div><br>
															
															
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Profile">Profile Picture</label>
																			<input name="product_img1" type="file" class="form-control" >
																			<br><img width="150" height="150" src="labi.jpg">
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="Offerletter">IC Picture</label>
																			<br><img width="150" height="150" src="labi.jpg">
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<label for="ownercurrentaddress">Current Address</label>
																			<input type="text" id="ownercurrentaddress" name="ownercurrentaddress" class="form-control" value="1,Jalan 1/1,Taman Sri Kluang" >
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="state">State</label>
																				<select id="State" name="state" class="form-control">
																				<option value="State">Johor</option>
																				
																				</select>
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="postcode">Postcode</label>
																			<input type="text" id="postcode" name="postcode" class="form-control" value="86000" >
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="owneremail">Email address</label>
																			<input type="email" id="owneremail" name="owneremail" class="form-control" value="11@gmail.com" >
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="ownerpassword">Password</label>
																			<input type="text" id="ownerpassword" name="ownerpassword" class="form-control" value="abcd123"  >
																					
																		</div>
																	</div>
																	
																</div><br>
															
															
											
															<div class="col-md-12"><!-- col-md-12 Begin -->
													  
																<input name="submit" value="UPDATE" type="submit" class="btn btn-primary form-control">
																  
															</div><!-- col-md-12 Finish -->

												</form>
										
								</div>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
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