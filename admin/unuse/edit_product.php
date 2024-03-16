<?php include("connect.php");
$userData = $_SESSION["ADMINAREAID"];
$name     = $userData['owner_name'];
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - Hostel Edit</title>
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
                            <li class="breadcrumb-item active">Dashboard > Edit Hostel</li>
                        </ol>
							
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-fw fa-cart-plus"></i> Edit Hostel
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
										   <form method="post" enctype="multipart/form-data"><!-- form-horizontal Begin -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Title </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="HosName" type="text" class="form-control" required value="<?php echo $row['HosName'];?>">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Category </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <select name="Category" class="form-control"><!-- form-control Begin -->
														  
														  <?php
												
															$select = mysqli_query($connect,"SELECT * FROM category ");
															$cat=$row['Category'];
															while($row1 = mysqli_fetch_assoc($select))
															{
																?>
																<option value="<?php echo $row1['Category']; ?>" <?php if($cat == $row1['Category'])echo "selected";?>><?php echo $row1["Category"]; ?></option>
																<?php
															}
														?>
													  </select><!-- form-control Finish -->
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Room Number </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <select name="TotRoom" class="form-control"><!-- form-control Begin -->
																  <option value="0" <?php if($row['TotRoom']==0){echo "selected";}?>>0</option>
																  <option value="1" <?php if($row['TotRoom']==1){echo "selected";}?>>1</option>
																  <option value="2" <?php if($row['TotRoom']==2){echo "selected";}?>>2</option>
																  <option value="3" <?php if($row['TotRoom']==3){echo "selected";}?>>3</option>
																  <option value="4" <?php if($row['TotRoom']==4){echo "selected";}?>>4</option>
																  <option value="5" <?php if($row['TotRoom']==5){echo "selected";}?>>5</option>
																  <option value="6" <?php if($row['TotRoom']==6){echo "selected";}?>>6</option>
																  <option value="7" <?php if($row['TotRoom']==7){echo "selected";}?>>7</option>
																  <option value="8" <?php if($row['TotRoom']==8){echo "selected";}?>>8</option>
													  </select><!-- form-control Finish -->
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												  <label class="col-md-3 control-label"> Hostel Image 1 </label>
												  
												  <input name="Image1" type="file" class="form-control" ><br>
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <?php if($row['Image1']!="")
													  {
													  echo "<img src='../img/Hostel/".$row['Image1']."' width='150px' height='150px'>";
													  echo $row['Image1'];
													  }
													 else { echo 'No image'; } 
													  ?>
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												  <label class="col-md-3 control-label"> Hostel Image 2 </label>
												  
												  <input name="Image2" type="file" class="form-control" ><br>
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <?php if($row['Image2']!="")
													  {
													  echo "<img src='../img/Hostel/".$row['Image2']."' width='150px' height='150px' >";
													  echo $row['Image2'];
													  }
													 else { echo 'No image'; } 
													  ?>
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 3 </label>
												  
												  <input name="Image3" type="file" class="form-control" ><br>
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <?php if($row['Image3']!="")
													  {
													  echo "<img src='../img/Hostel/".$row['Image3']."' width='150px' height='150px'>";
													  echo $row['Image3'];
													  }
													 else { echo 'No image'; } 
													  ?>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 4 </label>
												  
												  <input name="Image4" type="file" class="form-control" ><br>
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <?php if($row['Image4']!="")
													  {
													  echo "<img src='../img/Hostel/".$row['Image4']."' width='150px' height='150px'>";
													  echo $row['Image4'];
													  }
													 else { echo 'No image'; } 
													  ?>
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 5 </label>
												  
												  <input name="Image5" type="file" class="form-control" ><br>
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <?php if($row['Image5']!="")
													  {
													  echo "<img src='../img/Hostel/".$row['Image5']."' width='150px' height='150px'>";
													  echo $row['Image5'];
													  }
													 else { echo 'No image'; } 
													  ?>
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Price ( RM ) </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="HosPrice" type="text" class="form-control" required value="<?php echo $row['HosPrice'];?>">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Description </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <textarea name="HosDetails" cols="112" rows="12" class="form-control"><?php echo nl2br($row['HosDetails']);?></textarea>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"></label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="submit" value="UPDATE" type="submit" class="btn btn-primary form-control">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
										   </form><!-- form-horizontal Finish -->
							<?php 

			if(isset($_POST["submit"]))
			{
				$name  = $_POST["HosName"];
				$cat   = $_POST["Category"];
				$room = $_POST["TotRoom"];
				$price= $_POST["HosPrice"];
				$detail = $_POST["HosDetails"];
				$id = $_GET["id"];
				
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
				
				
				
				$check = mysqli_query($connect,"SELECT * FROM hostel where HosName = '$name'");
				
						if($name != $userData["HosName"])
						{
							if(mysqli_num_rows($check) > 1)
							{
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Hostel Name has been use!",
									  text: "Please enter another name!",
									  icon: "error",
									  button: "Retry"}).then(function(){window.location.href = "edit_product.php";});
								</script>
								<?php	
							}
						
							else
							{
								mysqli_query($connect,"UPDATE hostel SET HosName='$name',Category='$cat',TotRoom='$room',HosPrice='$price',HosDetails='$detail',
								Image1='$Image1',Image2='$Image2',Image3='$Image3',Image4='$Image4',Image5='$Image5' where ID='$id'");
								
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Edit Successful!",
									  icon: "success",
								button: "View Hostel"}).then(function(){window.location.href = "view_product.php";});
								</script>
								<?php
							}
						}
						
						else
						{
							mysqli_query($connect,"UPDATE hostel SET HosName='$name',Category='$cat',TotRoom='$room',HosPrice='$price',HosDetails='$detail',
							Image1='$Image1',Image2='$Image2',Image3='$Image3',Image4='$Image4',Image5='$Image5' where ID='$id'");
				
								?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "Edit Successful!",
									  icon: "success",
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
							$msg = "There was a problem uploading image 3";
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
									   </div><!-- panel-body Finish -->
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
		
		
		<script src="js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>
<?php } ?>
