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
        <title>JTY HOSTEL - Booking List</title>
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
                            <li class="breadcrumb-item active">Dashboard > View Booking</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Booking
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
                                                <th>Student Name</th>
                                                <th>Room</th>
                                                <th>Category</th>
                                                <th>Owner</th>
                                                <th>Date Book</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
                                                <th>Student Name</th>
												<th>Room</th>
                                                <th>Category</th>
                                                <th>Owner</th>
                                                <th>Date Book</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
											$i=1;
                                            $result=mysqli_query($connect,"select * from book where  Status !='cancel'  ");
											while($row=mysqli_fetch_array($result))
											{
												$hid = $row["HosId"];
												$sid = $row["StudId"];
												
												$stud = mysqli_query($connect, "SELECT * from studregister where User_id= '$sid'");
												$stud1 = mysqli_fetch_array($stud);
												
												$hos = mysqli_query($connect, "SELECT * from hostel where ID= '$hid'");
												$hos1 = mysqli_fetch_array($hos);
												$cid = $hos1["Cat_id"];
												$oid = $hos1["Own_id"];
												
												$cat = mysqli_query($connect, "SELECT * from category where ID= '$cid'");
												$cat1 = mysqli_fetch_array($cat);
												
												$own = mysqli_query($connect , "SELECT * from owner where owner_id = '$oid'");
												$own1 = mysqli_fetch_array($own);
										?>
                                            <tr>
												<td><?php echo $i;?></td>
                                                <td><?php echo $stud1["Studname"] ?></td>
																	<td><?php echo $hos1["HosName"] ?></td>
                                                <td><?php echo $cat1["Category"] ?></td>
                                                <td><?php echo $own1["owner_name"] ?></td>
                                                <td><?php echo $row["Date"] ?></td>
                                                <?php 
																		if($row['Status']=="view")
																		{
																		?>
																			<td><a class="btn btn-warning btn-sm" href="#">
																						  <i class="fa fa-hourglass-start">
																						  </i>
																						  Student View Hostel
																					</a>
																			</td>
																		<?php
																		}
																		else if($row['Status']=="proceed")
																		{
																		?>
																			<td><a class="btn btn-warning btn-sm" href="#">
																						  <i class="fa fa-hourglass-start">
																						  </i>
																						  Pending
																					</a>
																			</td>
																		<?php
																		}
																		else 
																		{ 
																		?>
																		<td ><a class="btn btn-success btn-sm" href="#">
																					  <i class="fa fa-check-circle">
																					  </i>
																					  DONE
																				 </a></td>
														 <?php 
																		}
																		?></td>
                                                
                                            </tr>
                                            <?php
											$i++;}
										?>	
                                            
                                            
											
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

<?php } ?>
