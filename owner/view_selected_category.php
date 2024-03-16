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
        <title>View Category</title>
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
			<?php 
			
			if(isset($_GET["id"]))
			{
				$id=$_GET["id"];
									
				$result2 = mysqli_query($connect,"select * from hostel where Cat_id='$id'  and HostelIsDelete=0 and Own_id='$oid' and Status!=0 ");
				
				$sql="select * from category where ID = '$id'";
				$result=mysqli_query($connect,$sql);
				$row=mysqli_fetch_assoc($result);
				$cat=$row["Category"];
			}					

			?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > <?php echo $cat;?></li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                <?php echo $cat;?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Hostel ID.</th>
                                                <th>Hostel Title</th>
												<th>Category</th>
                                                <th>Room</th>
                                                <th>Hostel Image</th>
                                                <th>Hostel Price ( RM )</th>
                                                <th>View</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Hostel ID.</th>
                                                <th>Hostel Title</th>
												<th>Category</th>
                                                <th>Room</th>
                                                <th>Hostel Image</th>
                                                <th>Hostel Price ( RM )</th>
                                                <th>View</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </tfoot>
								
                                        <tbody>
								<?php
								$i=1;
								while($userData = mysqli_fetch_array ($result2))
								{
								?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $userData['HosName'];?></td>
												<td><?php echo $cat;?></td>
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
												<td><a class="btn btn-danger btn-sm" href="view_selected_category.php?del=<?php echo $userData['ID']; ?>" onclick="return confirmation()">
													  <i class="fas fa-trash">
													  </i>
													  Delete
													 </a>
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
<script>
function confirmation()
	  {
		  var answer;
		  answer=confirm("Do you want to delete?");
		  return answer;
	  } 
	 </script>
	  <?php
		if(isset($_GET["del"]))			
		{
			$Id=$_GET["del"];
			mysqli_query($connect,"update hostel set HostelIsDelete=1 where ID='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Delete!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "view_selected_category.php";});
			</script>
	  <?php

		}
	}					
	  ?>