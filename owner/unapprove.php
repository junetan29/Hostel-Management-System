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
        <title>Unapprove Hostel</title>
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
                            <li class="breadcrumb-item active">Dashboard > Unapprove Hostel</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Hostel been unapprove
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Hostel Name</th>
																		<th>Category</th>
																		<th>Total Room</th>
																		<th>Hostel Image</th>
																		<th>Hostel Price</th>
																		<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID.</th>
                                                <th>Hostel Name</th>
																		<th>Category</th>
																		<th>Total Room</th>
																		<th>Hostel Image</th>
																		<th>Hostel Price</th>
																		<th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
								<?php
							$result=mysqli_query($connect, "select * from hostel where Status != '1' and Status != '0' and Own_Id='$oid'");
							
							$i=1;
							
							while($row = mysqli_fetch_array ($result))
							{
								$cid = $row["Cat_id"];
								$cat = mysqli_query($connect, "SELECT * from category where ID='$cid'");
								$cat1 = mysqli_fetch_array($cat);
								?>
                                            <tr>
																		<td><?php echo $i;?></td>
																		<td><?php echo $row['HosName'];?></td>
																		<td><?php echo $cat1['Category'];?></td>
																		<td><?php echo $row["OriRoom"]; ?></td>
																		<td><?php echo $row["Image1"]; ?></td>
																		<td><?php echo $row['HosPrice'];?></td>
																		<td>
																		<?php
																		if($row['Status']=="2")
																		{
																		?>
																		<a class="btn btn-warning btn-sm" href="edit_product.php?id=<?php echo $row['ID']; ?>">
																				  <i class="fa fa-pen">
																				  </i>
																				  Edit 
																			 </a>
																		<?php
																		}
																		else if($row['Status']=="3")
																		{
																			?>
																			<a class="btn btn-info btn-sm" href="#">
																				  <i class="fa fa-exchange">
																				  </i>
																				  Resubmit 
																			 </a>
																			 <?php
																		}
																	?>
																			 </td>
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