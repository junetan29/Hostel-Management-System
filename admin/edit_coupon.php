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
        <title>JTY HOSTEL - Courses Edit</title>
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
                            <li class="breadcrumb-item active">Dashboard > Edit Coupon</li>
                        </ol>
							
							
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-fw fa-edit"></i> Edit Coupon
                            </div>
                            <div class="card-body">
                                <div class="panel-body"><!-- panel-body Begin -->
										   
										   <form method="post" enctype="multipart/form-data"><!-- form-horizontal Begin --><!-- form-horizontal Begin -->
											<?php
												if(isset($_GET["id"]))
												{
												$id=$_GET["id"];
												$result=mysqli_query($connect,"SELECT * from coupon where coupon_id='$id'");
												$row=mysqli_fetch_assoc($result);
												}
											?>    
											   <div class="row">
													<div class="col-xl-6">
														<label > Coupon Title </label> 
														<input type="text" id="coupon_title" name="coupon_title" class="form-control" value="<?php echo $row['coupon_title']?>" >
													</div>
													
													<div class="col-xl-6">
														<label > Coupon Discount </label>
														<input type="text" id="coupon_discount" name="coupon_discount" class="form-control" value="<?php echo $row['coupon_discount']?>"  >
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-xl-6">
														<label > Coupon Code </label> 
														<input type="text" id="coupon_code" name="coupon_code" class="form-control" value="<?php echo $row['coupon_code']?>" >
													</div>
													
													<div class="col-xl-6">
														<label > Coupon Limit Person </label>
														<input type="text" id="coupon_limit" name="coupon_limit" class="form-control" value="<?php echo $row['coupon_limit']?>"  >
													</div>
												</div>
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"></label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="submit" value="UPDATE" type="submit" class="btn btn-info form-control">
													  </div><br>
													<div class="col-md-12"><!-- col-md-12 Begin -->
													  <a href="coupon.php" class="btn btn-primary form-control" id="btn">Back</a>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
										   </form><!-- form-horizontal Finish -->
										   
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
		
    </body>
</html>
<?php 

if(isset($_POST['submit'])){  
    $coupon_title = $_POST['coupon_title'];
	$coupon_discount = $_POST['coupon_discount'];
	$coupon_code = $_POST['coupon_code'];
	$coupon_limit = $_POST['coupon_limit'];
    
    $update_coupon = "update coupon set coupon_title='$coupon_title', coupon_discount='$coupon_discount', coupon_code='$coupon_code', coupon_limit='$coupon_limit' where coupon_id='$id'";
	
    
    $run_coupon = mysqli_query($connect,$update_coupon);
    
    if($run_coupon){
       
        
		?>
			
		
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Coupon has been updated sucessfully",
						  icon: "success",
						  button: "Back"}).then(function(){window.location.href = "coupon.php";});
					</script>
					
			
		<?php
        
    }
    
}


?>
<?php } ?>