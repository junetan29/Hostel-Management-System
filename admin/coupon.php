<?php include("connect.php");
$result=mysqli_query($connect,"select * from coupon where CouponIsDelete =0 ");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - Coupon</title>
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
                            <li class="breadcrumb-item active">Dashboard > View Coupon </li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                View Coupon 
								<a class="btn btn-warning btn-sm" style="margin-left:2em; float:right;" href="add_coupon.php"><i class="fas fa-pencil-alt"></i>Add Coupon</a>
								<a class="btn btn-success btn-sm" style="margin-left:2em; float:right;" href="view_del_coupon.php"><i class="fas fa-user"></i>View Inactive Coupon</a>
								<a class="btn btn-info btn-sm" style=" float:right;" href="view_coupon.php"><i class="fas fa-user"></i>View Coupon Used</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
                                                <th>Coupon Title <br> 
												</th>
													<th>Coupon discount</th>
													<th>Coupon Code</th>
													<th>Coupon Limit</th>
													<th>Coupon Used</th>
													<th>Admin Add</th>
												<th>Edit</th>
												<th>Unactive</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
												<th>Coupon Title</th>
													<th>Coupon discount</th>
													<th>Coupon Code</th>
													<th>Coupon Limit</th>
													<th>Coupon Used</th>
													<th>Admin Add</th>
												<th>Edit</th>
												<th>Unactive</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php
											$i=1;
											while($row=mysqli_fetch_assoc($result))
											{
										?>
                                            <tr>
												<td><?php echo $i;?></td>
												<td><?php echo $row["coupon_title"] ?></td>
												<td><?php echo $row["coupon_discount"] ?></td>
												<td><?php echo $row["coupon_code"] ?></td>
												<td><?php echo $row["coupon_limit"] ?></td>
												<td><?php echo $row["coupon_used"] ?></td>
												<?php 
												$aid = $row["coupon_add"];
												$admin = mysqli_query($connect, "SELECT * from admin where Admin_id = '$aid'");
												$admin1 = mysqli_fetch_array($admin);
												?>
												<td><?php echo $admin1["Name"] ?></td>
												<td><a class="btn btn-info btn-sm" href="edit_coupon.php?id=<?php echo $row['coupon_id']?>">
													  <i class="fas fa-pencil-alt">
													  </i>
													  Edit
													</a>
												</td>
												<td><a class="btn btn-danger btn-sm" href="coupon.php?id=<?php echo $row['coupon_id']; ?>" onclick="return confirmation()">
														  <i class="fas fa-trash">
														  </i>
														  Unactive
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
		  answer=confirm("Do you want to inactive?");
		  return answer;
	  } 
	 </script>
	  <?php
		if(isset($_GET["id"]))			
		{
			$Id=$_GET["id"];
			mysqli_query($connect,"update coupon set CouponIsDelete=1 where coupon_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Unactive!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "view_del_coupon.php";});
			</script>
	  <?php

		}
	}					
	  ?>