<!DOCTYPE html>


<?php 

    $file = "design/design.css"; 

    if(file_exists($file)){

        $data = file_get_contents($file);
     
    }

?>

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
                            <li class="breadcrumb-item active">Dashboard > CSS editor</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                CSS editor
                            </div>
                            
							
							<div class="card-body"><!-- panel-body begin -->

								<form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
									<div class="form-group"><!-- form-group begin -->

										<div class="col-lg-12"><!-- col-lg-12 begin -->
											<textarea name="newdata" id="" rows="15" class="form-control">

												<?php echo $data; ?>

											</textarea>
										</div>  <!-- col-lg-12 finish -->                  
									
									</div><!-- form-group finish -->

									<div class="form-group"><!-- form-group begin -->
									
										<label  class="control-label col-md-3"></label>

										<div class="col-md-12"><!-- col-md-6 begin -->
										<input type="submit" name="update" value="Update CSS" class="btn btn-primary form-control">
										</div><!-- col-md-6 finish -->
									
									</div><!-- form-group finish -->

								</form><!-- form-horizontal finish -->

							</div><!-- panel-body finish -->
							
							
							
                        </div>		
							
						<?php 

						if(isset($_POST['update'])){

							$newdata = $_POST['newdata'];
							$handle = fopen($file, "w");
							fwrite($handle, $newdata);
							fclose($handle);

							echo "<script>alert('Your CSS Has Been Updated')</script>";
							echo "<script>window.open('index.php?edit_css','_self')</script>";

						}

						?>





						
							
							
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
