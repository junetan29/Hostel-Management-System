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
        <title>JTY HOSTEL - Contact Reply</title>
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
                            <li class="breadcrumb-item active">Dashboard > Contact Peply</li>
                        </ol>
							
							
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Contact Peply
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
												$result=mysqli_query($connect,"SELECT * from contact where Id='$id'");
												$row=mysqli_fetch_assoc($result);
												
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
																		<label for="Name" >Name</label>
																		<input type="text" id="Name" name="Name" class="form-control" value="<?php echo $row["Name"] ?>" disabled>
																	</div>
																</div>
																<div class="col-xl-6">
																	<div class="form-label-group">
																		<label for="studphnum">Email</label>
																		<input type="text" id="studphnum" name="studphnum" class="form-control"  value="<?php echo $row["Email"] ?>" disabled>
																	</div>
																</div>
																
															</div>
															<br>
															<div class="row">
																<div class="col-xl-6">
																	<div class="form-label-group">
																		<label for="Category">Subject</label>
																		<input type="text" id="Category" name="Category" class="form-control"  value="<?php echo $row["Subject"] ?>" disabled>
																	</div>
																</div>
															</div><br>
															<div class="row">
																<div class="col-xl-12">
																	<div class="form-label-group">
																		<label for="HosName">Message</label>
																		<textarea name="Message" id="Message" name="Message" cols="112" rows="5" class="form-control" disabled><?php echo $row["Message"] ?></textarea>
																	</div>
																</div>
															</div><br>
															
															<div class="row">
																<div class="col-xl-12">
																<div class="form-label-group">
																  <label for="Message"> Reply Message</label> 
																  
																	  <textarea name="Message" id="Message" name="Message" cols="112" rows="5" class="form-control" ></textarea>
																  </div>
																</div>   
															</div>
															<br>
																
														 
														  
														  
															<div class="row">
																<div class="col-xl-6">
																<button class="btn btn-info d-block px-2 py-3" name="sent" id="btn" style="width:100%;"> Send Mail</button>
																
																</div>
																<div class="col-xl-6">
																<a href="contact.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																</div>
																  
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
		
			if(isset($_POST["sent"]))
				{
					$email = $row["Email"];
					$name = $row["Name"];
					$sub = $row["Subject"];
					$msg = $row["Message"];
					$mss = $_POST["Message"];
					$subject = "Contact Message Reply";
					$message = "Hi ".$name.",\n\n".$mss."\n\nRegards,\nAdminstor JTY Hostel.\n\n\n------------------------------------------------------------------\nSubject:".$sub."\nMessage:".$msg."\nName:".$name."";
					$from = "From: JTYHostel <jtyhostel@gmail.com>";
																				
					mail($email,$subject,$message,$from);
					
					mysqli_query($connect, "update contact set Status='1' where Id='$id'");
				
?> 
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "Message Reply Successfully!",
					  icon: "success",
					  button: "Back"}).then(function(){window.location.href = "contact.php";});
				  </script>
		<?php				
				}
	}					
	  ?>
