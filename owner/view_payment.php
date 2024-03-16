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
        <title>View Payment</title>
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
                            <li class="breadcrumb-item active">Dashboard > Payment Record</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Payment Record
								<form method="post" action="export.php">
									<input class="btn btn-info btn-sm"  style="margin-left:2em; float:right;"  type="submit" name="expay" value="Export Payment Record to Excel" >
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
												<th>Price ( RM )</th>
												<th>Received Amount ( RM )</th>
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
												<th>Price ( RM )</th>
												<th>Received Amount ( RM )</th>
												<th>Bank</th>
												<th>Payment Date</th>
												<th>Print</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
								<?php
							$result=mysqli_query($connect, "select * from payment where OwnId = '$oid'");
							
							$i=1;
							
							while($row = mysqli_fetch_array ($result))
							{
								$sid=$row['StudId'];
								$bid=$row['BookId'];
								
								$sql3 ="select * from book where Id = '$bid'";
								$result3 = mysqli_query($connect,$sql3);
								$row3 = mysqli_fetch_assoc($result3);
								$num=$row3['TotRoom'];
								$hid=$row3['HosId'];
								
								$sql2 ="select * from studregister where User_id = '$sid'";
								$result2 = mysqli_query($connect,$sql2);
								$row2 = mysqli_fetch_assoc($result2);
								
								$sql1="select * from hostel where ID = '$hid'";
								$result1=mysqli_query($connect,$sql1);
								$row1=mysqli_fetch_assoc($result1);
								$price1=$row1['HosPrice'];
								$price=$price1*$num;
								?>
                                            <tr>
                                                <td><?php echo $i;?></td>
												<td><?php echo $row2['Studname'];?></td>
												<td><?php echo $row['HolderName'];?></td>
												<td><?php echo $price ?></td>
												<td><?php echo $price*0.9; ?></td>
												<td><?php echo $row['Bank'];?></td>
												<td><?php echo $row['PaymentDate'];?></td>
												<td><a class="btn btn-warning btn-sm" href="tcpdf/receipt.php?id=<?php echo $row['ID']; ?>" target="_blank">
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
    </body>
</html>
<?php } ?>