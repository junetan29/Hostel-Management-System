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
	
<script type="text/javascript">
function confirmation()
{
	var answer;
	answer=confirm("Do you want to delete this hostel?");
	return answer;
}
</script>	
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
                                <i class="fas fa-table mr-1"></i>
                                View Hostel
								<form method="post" action="../admin_HOSTEL_BOOKING_SYSTEM/export.php">
									<input class="btn btn-info btn-sm"  style="margin-left:2em; float:right;"  type="submit" name="exhos" value="Export Hostel Data to Excel" >
								</form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Hostel ID.</th>
                                                <th>Hostel Name</th>
																	<th>Category</th>
                                                <th>Room Left</th>
                                                <th>Hostel Image</th>
                                                <th>Hostel Price ( RM )</th>
                                                <th>View</th>
																	<th>Edit</th>
																	<th>Delete</th>
																	<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Hostel ID.</th>
                                                <th>Hostel Name</th>
																	<th>Category</th>
                                                <th>Room Left</th>
                                                <th>Hostel Image</th>
                                                <th>Hostel Price ( RM )</th>
                                                <th>View</th>
																	<th>Edit</th>
																	<th>Delete</th>
																	<th>Status</th>
                                            </tr>
                                        </tfoot>
							
                                        <tbody>
								<?php
						
							$hostel = mysqli_query($connect, "SELECT * from hostel where own_id = '$oid' and  HostelIsDelete=0");
							
							$i=1;
							
							while($userData = mysqli_fetch_array ($hostel))
							{	
								$cid=$userData['Cat_id'];
								$cat=mysqli_query($connect, "SELECT * from category where ID = '$cid'");
								$row = mysqli_fetch_assoc ($cat);
								$cat2 = $row['Category'];
								?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $userData['HosName'];?></td>
												<td><?php echo $cat2;?></td>
                                                <td><?php echo $userData['TotRoom'];?></td>
                                                <td><?php echo "<img src='../img/Hostel/".$userData['Image1']."' width='60px' height='60px'>" ?></td>
                                                <td><?php echo $userData['HosPrice'];?></td>
												<td><a class="btn btn-primary btn-sm" href="view_selected_product.php?id=<?php echo $userData['ID']; ?>">
														  <i class="fas fa-folder">
														  </i>
														  View
													</a>
												</td>
												<td><a class="btn btn-info btn-sm" href="edit_product.php?id=<?php echo $userData['ID']; ?>">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
												<td><a class="btn btn-danger btn-sm" href="view_product.php?id=<?php echo $userData['ID']; ?>" onclick="return confirmation()">
														  <i class="fas fa-trash">
														  </i>
														  Delete
													 </a>
												</td>
												<?php
												if($userData['Status']==0)
												{ 
												?>
												<td><a class="btn btn-warning btn-sm" href="#">
															  <i class="fa fa-hourglass-start">
															  </i>
															  Pending
														 </a></td>
												<?php 
												}
												if($userData['Status']==2)
												{ 
												?>
												<td><a class="btn btn-info btn-sm" href="#">
															  <i class="fa fa-times-circle">
															  </i>
															  Unapprove
														 </a></td>
												<?php 
												}
												else if($userData['Status']==3)
													{ 
												?>
												<td>
													<a class="btn btn-info btn-sm" href="view_selected_product.php?id=<?php echo $row['ID']; ?>">
													<i class="fa fa-exchange"></i>	Resubmit</a>
												</td>
												
												<?php 
													}
												else if($userData['Status']==1)
												{
													?>
												<td><a class="btn btn-success btn-sm" href="#">
															  <i class="fa fa-check-circle">
															  </i>
															  DONE
														 </a></td>
												<?php }?>
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
<script>
function confirmation()
	  {
		  var answer;
		  answer=confirm("Do you want to delete?");
		  return answer;
	  } 
	 </script>
	  <?php
		if(isset($_GET["id"]))			
		{
			$Id=$_GET["id"];
			$hos = mysqli_query($connect, "SELECT * from hostel where ID = '$Id'");
			$hos1 = mysqli_fetch_array($hos);
			$ori = $hos1["OriRoom"];
			$tot = $hos1["TotRoom"];
			if($ori == $tot)
			{
				mysqli_query($connect,"update hostel set HostelIsDelete=1 where ID='$Id'");
				?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Successful Delete!",
						  icon: "success",
						  button: "Review"}).then(function(){window.location.href = "view_product.php";});
					</script>
			  <?php
			}
			else
			{
				?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Hostel been book before!",
							 text:"You cannot delete this hostel",
							  icon: "error",
							  button: "Review"}).then(function(){window.location.href = "view_product.php";});
					</script>
			  <?php
			}
		
		}
	}					
	  ?>