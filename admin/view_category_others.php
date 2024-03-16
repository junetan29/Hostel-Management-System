<?php include("connect.php");
$result=mysqli_query($connect,"select * from hostel where TotRoom >0 and HostelIsDelete=0 and Cat_id='4'");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - Other</title>
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
                            <li class="breadcrumb-item active">Dashboard > View Others</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                View Others
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
                                                <th>Product Title</th>
												<th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Room</th>
                                                <th>Product Image</th>
                                                <th>Product Price</th>
                                                <th>View</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
                                                <th>Product Title</th>
												<th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Room</th>
                                                <th>Product Image</th>
                                                <th>Product Price</th>
                                                <th>View</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php
										$i=1;
                                            while($row=mysqli_fetch_assoc($result))
											{
												$oid = $row["Own_id"];
												$cid = $row["Cat_id"];
												$res = mysqli_query($connect,"SELECT * from owner where owner_id = '$oid'");
												$row2 = mysqli_fetch_array($res);
												$res3 = mysqli_query($connect, "SELECT * from category where ID = '$cid'");
												$row3 = mysqli_fetch_array($res3);
										?>
                                            <tr>
												<td><?php echo $i;?></td>
                                                <td><?php echo $row['HosName'];?></td>
																	<td><?php echo $row3["Category"] ?></td>
                                                <td><?php echo $row2["owner_name"] ?></td>
                                                <td><?php echo $row['TotRoom'];?></td>
                                                <td><?php echo "<img src='../img/Hostel/".$row['Image1']."' width='60px' height='60px'>" ?></td>
                                                <td><?php echo $row['HosPrice'];?></td>
												<td><a class="btn btn-primary btn-sm" href="view_selected_product.php?id=<?php echo $row['ID']?>">
														  <i class="fas fa-folder">
														  </i>
														  View
													</a>
												</td>
												<!--<td><a class="btn btn-info btn-sm" href="edit_product.php?id=?php echo $row['ID']?>">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>-->
																	<?php
																	if($row['Status']=="0")
																	{ 
																	?>
																	<td><a class="btn btn-warning btn-sm" href="#">
																			<i class="fa fa-hourglass-start"> </i>Pending</a>
																	</td>
																	<?php 
																	}
																	else 
																	{ 
																	?>
																	<td ><a class="btn btn-success btn-sm" href="#">
																				  <i class="fa fa-check-circle"> </i>DONE</a>
																	</td>
																	<?php 
																	}
																	?>
												<td><a class="btn btn-danger btn-sm" href="view_product.php?id=<?php echo $row['ID']; ?>" onclick="return confirmation()">
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
	}					
	  ?>