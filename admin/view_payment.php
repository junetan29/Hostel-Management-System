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
        <title>JTY HOSTEL - Payment</title>
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
                            <li class="breadcrumb-item active">Dashboard > Payment Record</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Payment Record
												<form method="post" action="export.php">
													<input class="btn btn-info btn-sm"  style="margin-left:2em; float:right;"  type="submit" name="expay" value="Export Payment to Excel" >
												</form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Student Name</th>
												<th>Holder Name</th>
												<th>Price (RM)<br><small>Paid by student</small></th>
												<th>Price (RM)<br><small>Earn by JTY Hostel</small></th>
												<th>Price (RM)<br><small>Given by Owner</small></th>
												<th>Price (RM)<br><small>Discount Given</small></th>
												<th>Bank</th>
												<th>Payment Date</th>
												<th>Print</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Student Name</th>
												<th>Holder Name</th>
												<th>Price (RM)<br><small>Paid by student</small></th>
												<th>Price (RM)<br><small>Earn by JTY Hostel 10%</small></th>
												<th>Price (RM)<br><small>Given by Owner 90%</small></th>
												<th>Price (RM)<br><small>Discount Given</small></th>
												<th>Bank</th>
												<th>Payment Date</th>
												<th>Print</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
								<?php
									
									$pay = mysqli_query($connect,"select * from payment ");
						
									$i=1;
									
									while($pay1 = mysqli_fetch_array ($pay))
									{
										$sid = $pay1["StudId"];
										$stud = mysqli_query($connect, "SELECT * from studregister where User_id = '$sid'");
										$stud1 = mysqli_fetch_array($stud);
										$vou = $pay1["VouId"];
											$disprice=$pay1["Price"];
											$hid = $pay1["HosId"];
											$bid = $pay1["BookId"];
											$vou1 = mysqli_query($connect, "SELECT * from voucher where Id ='$vou'");
											$vou2 = mysqli_fetch_array($vou1);
											$coid = $vou2["Coupid"];
											$coup = mysqli_query($connect, "SELECT * from coupon where coupon_id='$coid'");
											$coup1= mysqli_fetch_array($coup);
											$cdis = $coup1["coupon_discount"];
											$bok = mysqli_query($connect, "SELECT * from book where Id = '$bid'");
											$bok1 = mysqli_fetch_array($bok);
											$troom = $bok1["TotRoom"];
											$hoss = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
											$hoss1= mysqli_fetch_array($hoss);
											$price = $hoss1["HosPrice"];
											
											$p1 = $price * $troom;
												$totowner= $p1*0.9;
														
											$disc_given = $p1 - $pay1['Price'];
											
											if($vou==0)
											{
												$p = $price * $troom;
												$tot= $p*0.1;	
											}
											else
											{
												$p = $price * $troom;
												$admin= $p*0.1;
												$dis = $p -$disprice;
												$tot = $admin - $dis;
											}
											
											
											
										?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $stud1['Studname'];?></td>
														<td><?php echo $pay1['HolderName'];?></td>
														<td><?php echo number_format($pay1['Price'], 2, '.', '');?></td>
														<td><?php echo number_format($tot, 2);;?></td>
														<td><?php echo number_format($totowner, 2);;?></td>
														<td><?php echo number_format($disc_given, 2);;?></td>
														<td><?php echo $pay1['Bank'];?></td>
														<td><?php echo $pay1['PaymentDate'];?></td>
														<td><a class="btn btn-warning btn-sm" href="tcpdf/receipt.php?id=<?php echo $pay1['ID']; ?> " target="_blank">
																  <i class="fa fa-print">
																  </i>
																  Print
															 </a></td>
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