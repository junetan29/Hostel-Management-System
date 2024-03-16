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
        <title>JTY HOSTEL - Hostel</title>
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
                            <li class="breadcrumb-item active">Dashboard > View Product</li>
                        </ol>
							
							
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-fw fa-cart-plus"></i> View Product
                            </div>
                            <div class="card-body">
                                <div class="panel-body"><!-- panel-body Begin -->
									<?php
									if(isset($_GET["id"]))
									{
									$hid=$_GET["id"];
									$result=mysqli_query($connect,"SELECT * from hostel where ID='$hid'");
									$row=mysqli_fetch_array($result);
									$cat = $row["Cat_id"];
									$own = $row["Own_id"];
									 
									$ra =mysqli_query($connect, "SELECT * from rate where HosId = '$hid'");
									$ra2=0;
									$num=0;
									}
									while($rara = mysqli_fetch_array($ra))
									{
										$num = $num+1;
										$ras = $rara["Rating"];
										$ra2 = $ras + $ra2;
									}
									$avg = $ra2/$num;
									$res = mysqli_query($connect, "SELECT * from category where ID = '$cat'");
									$row2 = mysqli_fetch_array($res);
									
									$res2 = mysqli_query($connect, "SELECT * from owner where owner_id = '$own'");
									$row3 = mysqli_fetch_array($res2);
									
									?>	   
										   <form method="post" name="view_selected_product" enctype="multipart/form-data">
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Average: <?php echo $avg ?><i class ="fa fa-star"></i></label> 
												  
												   
											   </div><!-- form-group Finish -->
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Title </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="product_title" type="text" class="form-control" value="<?php echo $row["HosName"] ?>" disabled>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label" disabled> Category </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="category" type="text" class="form-control" value="<?php echo $row2["Category"] ?>" disabled>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Owner Name </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="owner_name" type="text" class="form-control" value="<?php echo $row3["owner_name"] ?>" disabled>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->


											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label" disabled> Total Room </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="total_room" type="text" class="form-control" value="<?php echo $row['OriRoom'];?>" disabled>

												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label" disabled>Left Room </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="left" type="text" class="form-control" value="<?php echo $row['TotRoom'];?>" disabled>

												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 1 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <br><a href="#" id="pop">
																<embed id="imagesource" src="../img/Hostel/<?php echo $row["Image1"]; ?>" style="width:150px; height:150px;" alt="No Offer Letter">
															 </a>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 2 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													    <br><a href="#" id="pop2">
																<embed id="imagesource2" src="../img/Hostel/<?php echo $row["Image2"]; ?>" style="width:150px; height:150px;" alt="No Offer Letter">
															 </a>
													  
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 3 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													    <br><a href="#" id="pop3">
																<embed id="imagesource3" src="../img/Hostel/<?php echo $row["Image3"]; ?>" style="width:150px; height:150px;" alt="No Offer Letter">
															 </a>
													  
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 4 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													    <br><a href="#" id="pop4">
																<embed id="imagesource4" src="../img/Hostel/<?php echo $row["Image4"]; ?>" style="width:150px; height:150px;" alt="No Offer Letter">
															 </a>
													  
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Hostel Image 5 </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <br><a href="#" id="pop5">
																<embed id="imagesource5" src="../img/Hostel/<?php echo $row["Image5"]; ?>" style="width:150px; height:150px;" alt="No Offer Letter">
															 </a>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Price </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="product_price" type="text" class="form-control"  value="<?php echo $row["HosPrice"] ?>" disabled>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Desc </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <textarea name="product_desc" cols="112" rows="12" class="form-control" disabled><?php echo $row["HosDetails"] ?></textarea>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"></label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <?php if($row['Status']=="0" )
													  { ?>
																<button class="btn btn-info d-block px-2 py-3" name="checked" id="btn" style="width:100%;"> Approve</button>
																<br>
																<button class="btn btn-info d-block px-2 py-3" name="can" id="btn" style="width:100%;"> Unapprove</button>

																<br>
																<a href="view_product.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php }
																else if($row['Status']=="3" )
																	{ ?>
																<button class="btn btn-info d-block px-2 py-3" name="checked" id="btn" style="width:100%;"> Approve</button>
																<br>
																<button class="btn btn-info d-block px-2 py-3" name="can" id="btn" style="width:100%;"> Unapprove</button>

																<br>
																<a href="view_product.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php }
																else { ?>
																<a href="view_product.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php }?>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
										   </form><!-- form-horizontal Finish -->
										   
										   <?php
													if(isset($_POST["can"]))
													{
														$Id=$row["ID"];
														$email = $row3["owner_email"];
														$name = $row3["owner_name"];
														$HosName = $row["HosName"];
														$Category = $row2["Category"];
														$image = $row["Image1"];
														
														mysqli_query($connect,"update hostel set Status=2 where ID='$Id'");
														?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "You Have Unapprove This Hostel!",
															  icon: "success",
															  button: "Review"}).then(function(){window.location.href = "view_product.php";});
														</script>
												  <?php
													$subject = "JTYHostel";
													$message = "Hi ".$name.",\nYour hostel has been unapprove. \n\nHostel Title :".$HosName."\nCategory :".$Category."\nPlease check you hostel details and change it to a correct information.\n\nThank you for Choosing Us";
													$from = "From: JTYHostel <jtyhostel@gmail.com>";
															
													mail($email,$subject,$message,$from);	
													}
													if(isset($_POST["checked"]))
													{
														$Id=$row["ID"];
														$email = $row3["owner_email"];
														$name = $row3["owner_name"];
														$HosName = $row["HosName"];
														$Category = $row2["Category"];
														$image = $row["Image1"];
														
														mysqli_query($connect,"update hostel set Status=1 where ID='$Id'");
														?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "Successful Approved!",
															  icon: "success",
															  button: "Review"}).then(function(){window.location.href = "view_product.php";});
														</script>
												  <?php
													$subject = "JTYHostel";
													$message = "Hi ".$name.",\nYour hostel has been approve. \n\nHostel Title :".$HosName."\nCategory :".$Category."\n\n\nThank you for Choosing Us";
													$from = "From: JTYHostel <jtyhostel@gmail.com>";
															
													mail($email,$subject,$message,$from);	
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
		
		<script src="js/tinymce/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:830px;" >
    <div class="modal-content">
      <div class="modal-header"> 
		<h4 class="modal-title" id="myModalLabel">Hostel Preview</h4>
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
   $('#imagepreview').attr('src', $('#imagesource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop2").on("click", function() {
   $('#imagepreview').attr('src', $('#imagesource2').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop3").on("click", function() {
   $('#imagepreview').attr('src', $('#imagesource3').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop4").on("click", function() {
   $('#imagepreview').attr('src', $('#imagesource4').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

$("#pop5").on("click", function() {
   $('#imagepreview').attr('src', $('#imagesource5').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>
<?php } ?>
