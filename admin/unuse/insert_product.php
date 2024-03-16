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
                            <li class="breadcrumb-item active">Dashboard > Insert Product</li>
                        </ol>
							
							
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-fw fa-cart-plus"></i> Insert Product
                            </div>
                            <div class="card-body">
                                <div class="panel-body"><!-- panel-body Begin -->
										   
										   <form><!-- form-horizontal Begin -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Title </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_title" type="text" class="form-control" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Category </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <select name="manufacturer" class="form-control"><!-- form-control Begin -->
														  
														  <option selected disabled> Select a Apartment </option>
														  
														
														  
													  </select><!-- form-control Finish -->
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Block </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <select name="product_cat" class="form-control"><!-- form-control Begin -->
														  
														  <option selected disabled> Select Block </option>
														  
														  
														  
													  </select><!-- form-control Finish -->
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Image 1 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_img1" type="file" class="form-control" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Image 2 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_img2" type="file" class="form-control">
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Image 3 </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_img3" type="file" class="form-control form-height-custom">
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Price </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="product_price" type="text" class="form-control" required>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Product Desc </label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <textarea name="product_desc" cols="19" rows="9" class="form-control"></textarea>
													  
												  </div><!-- col-md-9 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"></label> 
												  
												  <div class="col-md-9"><!-- col-md-9 Begin -->
													  
													  <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
													  
												  </div><!-- col-md-9 Finish -->
												   
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
