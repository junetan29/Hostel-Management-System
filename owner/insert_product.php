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
        <title>Insert Hostel</title>
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
                            <li class="breadcrumb-item active">Dashboard > Insert Hostel</li>
                        </ol>
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-fw fa-cart-plus"></i> Insert Hostel
                            </div>
                            <div class="card-body">
                                <div class="panel-body"><!-- panel-body Begin -->
								<?php
							if(isset($_GET["id"]))
							{
								$id=$_GET["id"];
								$result=mysqli_query($connect,"SELECT * from hostel where ID='$id'");
								$row=mysqli_fetch_assoc($result);
							}
							?>		   
										<form action="#" method="post" enctype="multipart/form-data"><!-- form-horizontal Begin -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Owner Name </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_owner_name" type="text" class="form-control" value="<?php echo $name ?>" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Name </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_title" type="text" class="form-control" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Category </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <select name="manufacturer" class="form-control"><!-- form-control Begin -->
														  
														  <option selected disabled> Select an Apartment </option>
														  <option value="1">Ixora Apartment</option>
														  <option value="2">Pangsapuri Bukit Beruang Permai</option>
													  	  <option value="3">The Height Resident</option>
														  <option value="4">Other</option>
														
													  </select><!-- form-control Finish -->
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Number of Rooms </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <select name="total_room" class="form-control"><!-- form-control Begin -->
														  
														  <option value="0">0</option>
														  <option value="1">1</option>
														  <option value="2">2</option>
														  <option value="3">3</option>
														  <option value="4">4</option>
														  <option value="5">5</option>
														  <option value="6">6</option>
														  <option value="7">7</option>
														  <option value="8">8</option>
														 
													  </select><!-- form-control Finish -->
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
	
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label">Hostel Image 1 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="Image1" type="file" class="form-control" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 2 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="Image2" type="file" class="form-control" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 3 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="Image3" type="file" class="form-control form-height-custom" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 4 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="Image4" type="file" class="form-control form-height-custom" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 5 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="Image5" type="file" class="form-control form-height-custom" accept="application/pdf,image/png, image/bmp, image/jpg, image/jpeg" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Price ( RM )</label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_price" type="text" class="form-control" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Description </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <textarea name="product_desc" cols="19" rows="9" class="form-control"></textarea>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
										
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <button class="btn btn-primary form-control" id="submitbtn" name="add" type="submit"> Add Hostel</button>
													  
												  </div><!-- col-md-9 Finish -->
												  
											   
										   </form><!-- form-horizontal Finish -->
										   
									   </div><!-- panel-body Finish -->
                            </div>
                        </div>
							
<?php 

if(isset($_POST["add"]))
{
	$name       = $_POST["product_owner_name"];
	$hostelname = $_POST["product_title"];
	$price      = $_POST["product_price"];
	$cat        = $_POST["manufacturer"];
	$ori        = $_POST["total_room"];
	$tot        = $ori;
	$detail     = $_POST["product_desc"];
	
	$Image1 = $_FILES['Image1']['name'];
    $target1 = "../img/Hostel/".basename($Image1);//only images/ and prodimg can be change images/ is place to save img, prodimg from form
	
	$Image2 = $_FILES['Image2']['name'];
	$target2 = "../img/Hostel/".basename($Image2);//only images/ and prodimg can be change images/ is place to save img, prodimg from form
	
	$Image3 = $_FILES['Image3']['name'];
	$target3 = "../img/Hostel/".basename($Image3);//only images/ and prodimg can be change images/ is place to save img, prodimg from form
	
	$Image4 = $_FILES['Image4']['name'];
	$target4 = "../img/Hostel/".basename($Image4);//only images/ and prodimg can be change images/ is place to save img, prodimg from form
				
	$Image5 = $_FILES['Image5']['name'];
	$target5 = "../img/Hostel/".basename($Image5);//only images/ and prodimg can be change images/ is place to save img, prodimg from form
	
	$check = mysqli_query($connect,"SELECT * FROM hostel where HosName = '$hostelname'");
				
							if(mysqli_num_rows($check) > 0)
							{
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Hostel Name has been used!",
									  text: "Please enter another name!",
									  icon: "error",
									  button: "Retry"}).then(function(){window.location.href = "insert_product.php";});
								</script>
								<?php	
							}
						
							else
							{
								mysqli_query($connect,"INSERT INTO hostel (Own_id, HosName, HosPrice, Cat_id, OriRoom, TotRoom, HosDetails, Image1, Image2, Image3, Image4, Image5) 
				 VALUES ('$oid', '$hostelname', '$price', '$cat', '$ori', '$tot', '$detail', '$Image1', '$Image2', '$Image3', '$Image4', '$Image5');");
								
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title : "Hostel Is Added! Please Wait For Admin To Approve!",
									  icon  : "success",
									  button: "View Hostel"}).then(function(){window.location.href = "view_product.php";});
								</script>
								<?php
							}
					
	if(move_uploaded_file($_FILES['Image1']['tmp_name'],$target1))
	{
		$msg = "Image upload successfully";
	}
	
	else
	{
		$msg = "There was a problem uploading image 1";
	}
	
	if(move_uploaded_file($_FILES['Image2']['tmp_name'],$target2))
	{
		$msg = "Image upload successfully";
	}
	
	else
	{
		$msg = "There was a problem uploading image 2";
	}
	
	if(move_uploaded_file($_FILES['Image3']['tmp_name'],$target3))
	{
		$msg = "Image upload successfully";
	}
	
	else
	{
		$msg = "There was a problem uploading image";
	}
	
	if(move_uploaded_file($_FILES['Image4']['tmp_name'],$target4))
	{
		$msg = "Image upload successfully";
	}
						
	else
	{
		$msg = "There was a problem uploading image 4";
	}
						
	if(move_uploaded_file($_FILES['Image5']['tmp_name'],$target5))
	{
		$msg = "Image upload successfully";
	}
						
	else
	{
		$msg = "There was a problem uploading image 5";
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
		
		<script src="js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>
<?php } ?>