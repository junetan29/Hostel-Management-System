<?php include("connect.php");
$result=mysqli_query($connect,"select * from admin where AdminIsDelete=0");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - Admin List</title>
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
						$AID = $userData["Admin_id"];
												
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
                            <li class="breadcrumb-item active">Dashboard > Admin List</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Admin List
								<a class="btn btn-warning btn-sm" style="margin-left:2em; float:right;" href="admin_delete.php"><i class="fas fa-user"></i> Deleted Admin List</a>
								<a class="btn btn-info btn-sm" style=" float:right;" href="add_admin.php"><i class="fas fa-user"></i> Add New Admin</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>View</th>
																	<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>View</th>
																	<th>Delete</th>
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
                                                <td><?php echo $row["Name"] ?></td>
                                                <td><?php echo $row["Email"] ?></td>
																	
                                                <?php 
																	if($row['AdminType']=="Admin")
																	{ 
																?>
																		<td><a class="btn btn-info btn-sm" href="admin_list.php?admin=<?php echo $row['Admin_id']; ?>" onclick="return confirm('Update to Super Admin?')">
																			<i class="fa fa-user"></i><?php echo $row["AdminType"] ?></a>
																		</td>
																<?php 
																	}
																	else
																	{ 
																?>
																		<td ><a class="btn btn-success btn-sm" href="admin_list.php?superadmin=<?php echo $row['Admin_id']; ?>" onclick="return confirm('Change to Admin?')">
																			<i class="fas fa-user-tie"></i><?php echo $row["AdminType"] ?></a>
																		</td>
																<?php
																}
																?>
															
															<td><a class="btn btn-primary btn-sm" href="super_admin_view.php?id=<?php echo $row['Admin_id']?>">
																	<i class="fas fa-folder"></i> View</a>
															</td>
															<td><a class="btn btn-danger btn-sm" href="admin_list.php?id=<?php echo $row['Admin_id']; ?>" onclick="return confirmation()">
																<i class="fas fa-trash"></i>Remove </a>
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
			$aidd = $userData["Admin_id"];
			if($AID==$Id)
			{ 
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "You are not allowed to Delete Yourself",
				  icon: "error",
				  button: "Back"}).then(function(){window.location.href = "admin_list.php";});
			</script>
			<?php
			}
			else
			{
			mysqli_query($connect,"update admin set AdminIsDelete=1, AdminDel='$aidd' where Admin_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Delete!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "admin_delete.php";});
			</script>
	  <?php
			}
		} 
		
		if(isset($_GET["admin"]))			
		{
			$Id=$_GET["admin"];
			mysqli_query($connect,"update admin set AdminType='SuperAdmin' where Admin_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Update!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "admin_list.php";});
			</script>
	  <?php

		}
		
		if(isset($_GET["superadmin"]))			
		{
			$Id=$_GET["superadmin"];
			if($AID==$Id)
			{ 
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "You are not allowed to Change Yourself",
				  icon: "error",
				  button: "Back"}).then(function(){window.location.href = "admin_list.php";});
			</script>
			<?php
			}
			else
			{
			mysqli_query($connect,"update admin set AdminType='Admin' where Admin_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Update!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "login/login.php";});
			</script>
	  <?php
			session_destroy();
			}
		}
	}				
	  ?>
