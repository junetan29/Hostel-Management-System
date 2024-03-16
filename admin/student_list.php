<?php include("connect.php"); 
$result=mysqli_query($connect,"select * from studregister where StudIsDelete=0 ");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - Student List</title>
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
                            <li class="breadcrumb-item active">Dashboard > Student List</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Student List
								<form method="post" action="export.php">
									<input class="btn btn-info btn-sm"  style="margin-left:2em; float:right;"  type="submit" name="export" value="Export Student list to Excel" >
								</form>
								<a class="btn btn-warning btn-sm" style="margin-left:2em; float:right;" href="student_appoint.php"><i class="fas fa-user"></i> View Student Appoinment Status</a>
								<a class="btn btn-success btn-sm" style="margin-left:2em; float:right;" href="student_delete.php"><i class="fas fa-user"></i> View Removed Student</a>
								
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>View</th>
												<th>Remove</th>
												<th>Status</th>
												<th>Admin Approve</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>View</th>
												<th>Remove</th>
												<th>Status</th>
												<th>Admin Approve</th>
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
                                                <td><?php echo $row["Studname"] ?></td>
                                                <td><?php echo $row["Studemail"] ?></td>
																	<td><a class="btn btn-primary btn-sm" href="view_student.php?id=<?php echo $row['User_id']?>">
																	  <i class="fas fa-folder"></i>View</a>
																	</td>
																	<td><a class="btn btn-danger btn-sm" name= "dlt" href="student_list.php?id=<?php echo $row['User_id']; ?>" onclick="return confirmation()">
																		<i class="fas fa-trash"></i> Remove</a>
																	</td>
																	<?php
																	if($row['StudStatus']=="0")
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
																	$aid = $row["Admin_id"];
																	$admin = mysqli_query($connect, "SELECT * from admin where Admin_id = '$aid'");
																	$admin1 = mysqli_fetch_array($admin);
																	?>
																	<td><?php echo $admin1["Name"] ?></td>
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
			mysqli_query($connect,"update studregister set StudIsDelete=1, AdminDel = '$aidd' where User_id='$Id'");
			$result=mysqli_query($connect, "select * from studregister where User_id='$Id'");
			$row = mysqli_fetch_array($result);
			$name = $row["Studname"];
			$email = $row["Studemail"];
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Delete!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "student_delete.php";});
			</script>
	  <?php
			$subject = "Notice";
			$message = "Hi ".$name.". \nI am sorry to told you that your acccount has been barred by our admin due to did not follow our terms and condition.\n\nIf you want to unbarred your accunt please contact our admin by email or link below :  \n\n http://localhost/jty/contact.php \n\n Sorry if we bring you inconveniece. ";
			$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
			mail($email,$subject,$message,$from);	
		}
		
	}					
	  ?>
