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
        <title>View Hostel</title>
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
                            <li class="breadcrumb-item active">Dashboard > View Hostel</li>
                        </ol>
							
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-fw fa-cart-plus"></i> View Hostel
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
										   <form><!-- form-horizontal Begin -->
												<?php
												$result2 = mysqli_query($connect, "SELECT * FROM rate where HosId= '$id'");
												$num = 0;
												$rate = 0;
												while ($row2 = mysqli_fetch_array($result2))
												{
													$num = $num+1;
													$rate = $rate + $row2["Rating"];	
												}
												$avg = $rate/$num;
												$cid=$row['Cat_id'];
												$cat=mysqli_query($connect, "SELECT * from category where ID = '$cid'");
												$row1 = mysqli_fetch_assoc ($cat);
												$cat2 = $row1['Category'];
												?>
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <label for="name">Average Rating : <?php echo $avg ?> <i class = "fa fa-star"></i></label>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Title </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="product_title" type="text" class="form-control" value="<?php echo $row['HosName'];?>">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label" disabled> Category </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="manufacturer" type="text" class="form-control" value="<?php echo $cat2;?>">

												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label" disabled> Number of Rooms </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="ori_room" type="text" class="form-control" value="<?php echo $row['OriRoom'];?>">

												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label" disabled> Room Left </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="total_room" type="text" class="form-control" value="<?php echo $row['TotRoom'];?>">

												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 1 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <br><a href="#" id="pop">
																<embed id="image1" src="../img/Hostel/<?php echo $row["Image1"]; ?>" style="width:150px; height:150px;" alt="No Image">
															 </a>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 2 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													    <br><a href="#" id="pop2">
																<embed id="image2" src="../img/Hostel/<?php echo $row["Image2"]; ?>" style="width:150px; height:150px;" alt="No Image">
															 </a>
													  
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 3 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													    <br><a href="#" id="pop3">
																<embed id="image3" src="../img/Hostel/<?php echo $row["Image3"]; ?>" style="width:150px; height:150px;" alt="No Image">
															 </a>
													  
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 4 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													    <br><a href="#" id="pop4">
																<embed id="image4" src="../img/Hostel/<?php echo $row["Image4"]; ?>" style="width:150px; height:150px;" alt="No Image">
															 </a>
													  
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 5 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <br><a href="#" id="pop5">
																<embed id="image5" src="../img/Hostel/<?php echo $row["Image5"]; ?>" style="width:150px; height:150px;" alt="No Image">
															 </a>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Price </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="product_price" type="text" class="form-control"  value="RM <?php echo $row['HosPrice'];?>">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Description </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <textarea name="product_desc" cols="112" rows="12" class="form-control" disabled><?php echo nl2br($row['HosDetails']);?></textarea>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"></label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <a href="view_product.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
										   </form><!-- form-horizontal Finish -->
										   
									   </div><!-- panel-body Finish -->
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
		
		<script src="js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:830px;" >
    <div class="modal-content">
      <div class="modal-header"> 
		<h4 class="modal-title" id="myModalLabel">Image Preview</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 100%; height: 100%;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#image1').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop2").on("click", function() {
   $('#imagepreview').attr('src', $('#image2').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop3").on("click", function() {
   $('#imagepreview').attr('src', $('#image3').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop4").on("click", function() {
   $('#imagepreview').attr('src', $('#image4').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop5").on("click", function() {
   $('#imagepreview').attr('src', $('#image5').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>
<?php } ?>