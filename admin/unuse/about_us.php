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
                        <h1 class="mt-4">ABOUT US</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > ABOUT US</li>
                        </ol>
							
						
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                ABOUT US ADMIN PART
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Admin ID</th>
                                                <th>Name</th>
												<th>Email</th>
                                                <th>Picture</th>
                                                <th>Contact</th>
												<th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Admin ID</th>
                                                <th>Name</th>
												<th>Email</th>
                                                <th>Picture</th>
                                                <th>Contact</th>
												<th>Edit</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>TAN XIN HUI</td>
												<td>1181201016@student.mmu.edu.my</td>
                                                <td><img src="labi.jpg" alt="" width="60" height="60"></td>
                                                <td>01151036496</td>
												<td><a class="btn btn-info btn-sm" href="edit_about_admin.php">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
                                            </tr>
											<tr>
                                                <td>2</td>
                                                <td>YAP JUN HI</td>
												<td>1181201807@student.mmu.edu.my</td>
                                                <td><img src="labi.jpg" alt="" width="60" height="60"></td>
                                                <td>0182741811</td>
												<td><a class="btn btn-info btn-sm" href="edit_about_admin.php">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
                                            </tr>
											<tr>
                                                <td>1</td>
                                                <td>TAN JUN ZHI</td>
												<td>1181201916@student.mmu.edu.my</td>
                                                <td><img src="labi.jpg" alt="" width="60" height="60"></td>
                                                <td>0163298536</td>
												<td><a class="btn btn-info btn-sm" href="edit_about_admin.php">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
												</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>	


						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                ABOUT US
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Question</th>
												<th>Answer</th>
												<th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Who are we?</td>
												<td>We are students from Multimedia University. We studied Diploma in Information Technology and this is our last semester. The reason we do this webpage is for our Final Year Project.</td>
												<td><a class="btn btn-info btn-sm" href="edit_about.php">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
												
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                ABOUT COMPANY
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Question</th>
												<th>Answer</th>
												<th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2</td>
                                                <td>What we provide to our user</td>
												<td>Our webpage is use to provide conveniece to user. Our user mostly are student and house owner. We use to help house owner to rent their house and help student to find their satisfied hostel anytime anywhere via our webpage.</td>
												<td><a class="btn btn-info btn-sm" href="edit_about.php">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
												
                                            </tr>
											
                                        </tbody>
                                    </table>
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
