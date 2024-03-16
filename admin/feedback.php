<?php include("connect.php");
$result=mysqli_query($connect,"select * from feedback");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - Feedback</title>
        <link href="design/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
		<style>
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		.switch input { 
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}
		</style>
		
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
                            <li class="breadcrumb-item active">Dashboard > Customer Feedback</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Customer Feedback
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
												<th>Name</th>
												<th>Phone Number</th>
												<th>Date & Time</th>
												<th >Message</th>
												<th>Delete</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
												<th>Name</th>
												<th>Phone Number</th>
												<th>Date & Time</th>
												<th>Message</th>
												<th>Delete</th>
												<th>Status</th>
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
												<td><?php echo $row["Fbname"] ?></td>
												<td><?php echo $row["FbPhnNum"] ?></td>
												<td><?php echo $row["Date"] ?></td>
												<td><?php echo $row["Message"] ?></td>
												
												
												<td><a class="btn btn-danger btn-sm" href="feedback.php?id=<?php echo $row['User_id']; ?>" onclick="return confirmation()">
														  <i class="fas fa-trash">
														  </i>
														  Delete
													 </a>
												</td>
												<?php 
													if($row['Status']=="0")
													{ 
												?>
												<td><!--<a href="feedback.php?fbstatus=" onclick="return confirm('Hide on UI?')">
												<label class="switch">
													  <input type="checkbox" >
													  <span class="slider round"></span>
													</label></a>-->
													<a class="btn btn-info btn-sm" href="feedback.php?fbstatus=<?php echo $row['User_id']; ?>" onclick="return confirm('Hide on User Interface?')">
													<i class="fas fa-eye-slash "></i>	HIDE</a>
												</td>
												
												<?php 
													}
													else
													{ 
												?>
													<td><!--<a href="feedback.php?fbstatus1=" onclick="return confirm('Show on UI?')">
													<label class="switch">
													  <input type="checkbox" checked>
													  <span class="slider round"></span>
													</label></a>-->
													<a class="btn btn-success btn-sm" href="feedback.php?fbstatus1=<?php echo $row['User_id']; ?>" onclick="return confirm('Show on User Interface?')">
													<i class="fas fa-eye"></i>	SHOW</a>
													</td>
												<?php
													}
												?>
												
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
			mysqli_query($connect,"delete from feedback where User_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Delete!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "feedback.php";});
			</script>
	 <?php
			}
		
		if(isset($_GET["fbstatus"]))			
		{
			$Id=$_GET["fbstatus"];
			mysqli_query($connect,"update feedback set Status='1' where User_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Update!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "feedback.php";});
			</script>
	  <?php
		}
		if(isset($_GET["fbstatus1"]))		
		{
			$Id=$_GET["fbstatus1"];
			mysqli_query($connect,"update feedback set Status='0' where User_id='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Update!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "feedback.php";});
			</script>
			<?php
		}
	}				
	  ?>