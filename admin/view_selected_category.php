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
        <title>JTY HOSTEL </title>
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
                            <li class="breadcrumb-item active">Dashboard > View Hostel</li>
                        </ol>
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                View Hostel
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
												<th>No.</th>
                                                <th>Hostel Title</th>
												<th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Room</th>
                                                <th>Hostel Image</th>
                                                <th>Hostel Price(RM)</th>
                                                <th>View</th>
												<th>Status</th>
												<!--<th>Edit</th>-->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>No.</th>
                                                <th>Hostel Title</th>
												<th>Category</th>
                                                <th>Owner Name</th>
                                                <th>Room</th>
                                                <th>Hostel Image</th>
                                                <th>Hostel Price(RM)</th>
                                                <th>View</th>
												<th>Status</th>
												<!--<th>Edit</th>-->
                                            </tr>
                                        </tfoot>
                                        <tbody>
										<?php
											$i=1;
											if(isset($_GET["id"]))
											{
												$id=$_GET["id"];
												$hos=mysqli_query($connect,"SELECT * from hostel where TotRoom !=0 and HostelIsDelete=0 and Cat_id='$id' ");
											}
											while($row=mysqli_fetch_assoc($hos))
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
												<td>
													<a class="btn btn-info btn-sm" href="view_selected_category.php?status2=<?php echo $row['ID']; ?>" onclick="return confirm('Do you want to Approved?')">
													<i class="fas fa-hourglass-start "></i>	Pending</a>
												</td>
												
												<?php 
													}
													else
													{ 
												?>
													<td>
													<a class="btn btn-success btn-sm" href="view_selected_category.php?status1=<?php echo $row['ID']; ?>" onclick="return confirm('Do you want to unapproved again?')">
													<i class="fas fa-check-circle"></i>	DONE</a>
													</td>
												<?php
													}
												?>
                                            </tr>
										<?php
											$i++;

	
		
		
											}
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
	<?php
		if(isset($_GET["status2"]))			
		{
			$Id=$_GET["status2"];
			
			
			$Hos = mysqli_query($connect,"update hostel set Status=1 where ID='$Id'");
			
			if($Hos)
			{
				$hoss = mysqli_query($connect, "SELECT * from hostel where ID = '$Id'");
				$Hos1 = mysqli_fetch_array($hoss);
				
				$HosName = $Hos1["HosName"];
				$oid = $Hos1["Own_id"];
				$cid = $Hos1["Cat_id"];
				
				
				$Own = mysqli_query($connect,"SELECT * from owner where owner_id = '$oid'");
				$Own1 = mysqli_fetch_array($Own);
				$Cat = mysqli_query($connect, "SELECT * from category where ID = '$cid'");
				$Cat1 = mysqli_fetch_array($Cat);
				$name = $Own1["owner_name"];
				$email = $Own1["owner_email"];
				$Category = $Cat1["Category"];
			}
			
			
						
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Update!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "view_category.php";});
			</script>
			 <?php
					$subject = "JTYHostel";
					$message = "Hi ".$name.",\nYour hostel has been approve. \n\nHostel Title :".$HosName."\nCategory :".$Category."\n\n\nThank you for Choosing Us";
					$from = "From: JTYHostel <jtyhostel@gmail.com>";
															
					mail($email,$subject,$message,$from);	
		}
	
	?>		
	  <?php
		if(isset($_GET["status1"]))		
		{
			$Id=$_GET["status1"];
			$Hos = mysqli_query($connect,"update hostel set Status=0 where ID='$Id'");
			
			if($Hos)
			{
				$hoss = mysqli_query($connect, "SELECT * from hostel where ID = '$Id'");
				$Hos1 = mysqli_fetch_array($hoss);
				
				$HosName = $Hos1["HosName"];
				$oid = $Hos1["Own_id"];
				$cid = $Hos1["Cat_id"];
				
				
				$Own = mysqli_query($connect,"SELECT * from owner where owner_id = '$oid'");
				$Own1 = mysqli_fetch_array($Own);
				$Cat = mysqli_query($connect, "SELECT * from category where ID = '$cid'");
				$Cat1 = mysqli_fetch_array($Cat);
				$name = $Own1["owner_name"];
				$email = $Own1["owner_email"];
				$Category = $Cat1["Category"];
			}
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Update!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "view_category.php";});
			</script>
			<?php
					$subject = "JTYHostel";
					$message = "Hi ".$name.",\nYour hostel has been hidden due didn't follow our rules.Please check the room details. \n\nHostel Title :".$HosName."\nCategory :".$Category."\n\n\nThank you for Choosing Us";
					$from = "From: JTYHostel <jtyhostel@gmail.com>";
															
					mail($email,$subject,$message,$from);
		}
	}				
	  ?>