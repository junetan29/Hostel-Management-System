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
        <title>Dashboard - Owner</title>
        <link href="css/design.css" rel="stylesheet" />
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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
						
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-blue">
									<div class="inner">
                                    <?php
									  $result2=mysqli_query($connect,"SELECT * from hostel where Own_id='$oid' and HostelIsDelete=0");
									  $count2=mysqli_num_rows($result2);
									?>
										<h3> <?php echo $count2;?> </h3>
										<p> Total Hostels </p>
									</div>
									<div class="icon">
										<i class="fa fa-home" aria-hidden="true"></i>
									</div>
									<a href="view_product.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-green">
									<div class="inner">
									<?php
									  $result21=mysqli_query($connect,"SELECT * from hostel where Own_id='$oid' and Status!=0");
									  $tot=0;
									  while($row=mysqli_fetch_array($result21))
									  {
										  $hid=$row['ID'];
										  $result1=mysqli_query($connect,"SELECT * from book where HosId = '$hid' and Status!='Cancel' and Status!='view'");
										  $count=mysqli_num_rows($result1);
										  $tot=$tot+$count;
									  }
									?>
										<h3> <?php echo $tot;?> </h3>
										<p> Total Students Booking</p>
									</div>
									<div class="icon">
										<i class="fa fa-graduation-cap" aria-hidden="true"></i>
									</div>
									<a href="student_list.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-red">
									<div class="inner">
                                    <?php
									  $result22=mysqli_query($connect,"SELECT * from payment where OwnId = '$oid'");
									  $totroom =0;
									  while($count4=mysqli_fetch_array($result22))
									  {
										  $bid = $count4["BookId"];
										  $book = mysqli_query($connect, "SELECT * from book where Id='$bid'");
										  $book1 = mysqli_fetch_array($book);
										  $troom = $book1["TotRoom"];
										  $totroom = $totroom + $troom;
									  }
									?>
										<h3> <?php echo $totroom;?> </h3>
										<p> Total Room Booked </p>
									</div>
									<div class="icon">
										<i class="fa fa-users"></i>
									</div>
									<a href="view_payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-orange">
									<div class="inner">
									<?php
									  $pay = mysqli_query($connect, "SELECT * from payment where OwnId = '$oid'");
									  
									  $count1=0;
									  while($pay1 = mysqli_fetch_array($pay))
									  {
										  $bid=$pay1['BookId'];
										  
										  $sql3 ="select * from book where Id = '$bid'";
										  $result3 = mysqli_query($connect,$sql3);
										  $row3 = mysqli_fetch_assoc($result3);
										  $num=$row3['TotRoom'];
										  
										  $hid= $pay1["HosId"];
										  $price=mysqli_query($connect,"SELECT * from hostel where ID = '$hid'");
										  $row5=mysqli_fetch_assoc($price);
										  
										  $payment=$row5['HosPrice']*$num*0.9;
										  $count1=$count1+$payment;
									  }
									?>
										<h3> RM <?php echo number_format($count1, 2);;?> </h3>
										<p> Total Income </p>
									</div>
									<div class="icon">
										<i class="fas fa-dollar-sign" aria-hidden="true"></i>
									</div>
								</div>
							</div>
							
						</div>
						
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i>
                                        Owner
                                    </div>
                                    <div class="card-body pt-1">
									  <div class="row">
										<div class="col-8">
										  <h2 class="lead"><b><?php echo $name;?></b></h2>
										  <p class="text-muted text-sm"><b>Email:</b> <?php echo $userData['owner_email']; ?></p>
										  <ul class="ml-4 mb-0 fa-ul text-muted">
											<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : +6<?php echo $userData['owner_phnum']; ?></li>
										  </ul>
										</div>
										<div class="col-4 text-center">
										<?php echo "<img src='../img/Owner/".$userData['owner_image']."' width='150px' height='150px'>" ?>

										</div>
									  </div>
									</div>
									<div class="card-footer">
									  <div class="text-right">
										<a href="view_owner.php" class="btn btn-sm btn-primary">
										  <i class="fas fa-user"></i> View Profile
										</a>
									  </div>
									</div>
					
                                </div>
                            </div>
							
							<div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Total Hostels by Category
                                    </div>
								<script>
								window.onload = function () {

								var chart = new CanvasJS.Chart("chartContainer", {
									exportEnabled: true,
									animationEnabled: true,
									title:{
										text: "Total Hostels by Category"
									},
									legend:{
										cursor: "pointer",
										itemclick: explodePie
									},
									data: [{
										type: "pie",
										showInLegend: true,
										toolTipContent: "Number : <strong>{y}</strong>",
										indexLabel: "{y}",
										dataPoints: [
										<?php
											  $result11=mysqli_query($connect,"SELECT * from hostel where Cat_id='1' and Own_id = '$oid'");
											  $count11=mysqli_num_rows($result11);
											  
											  $result12=mysqli_query($connect,"SELECT * from hostel where Cat_id='2' and Own_id = '$oid'");
											  $count12=mysqli_num_rows($result12);
											  
											  $result13=mysqli_query($connect,"SELECT * from hostel where Cat_id='3' and Own_id = '$oid'");
											  $count13=mysqli_num_rows($result13);
											  
											  $result14=mysqli_query($connect,"SELECT * from hostel where Cat_id='4' and Own_id = '$oid'");
											  $count14=mysqli_num_rows($result14);
										?>
											{  y: <?php echo $count11;?>, legendText:"Ixora Apartment", indexLabel: "Ixora Apartment : <?php echo $count11;?>" },
											{  y: <?php echo $count12;?>, legendText:"Pangsapuri Bukit Beruang Permai", indexLabel: "Pangsapuri Bukit Beruang Permai : <?php echo $count12;?>" },
											{  y: <?php echo $count13;?>, legendText:"The Height Resident", indexLabel: "The Height Resident : <?php echo $count13;?>" },
											{  y: <?php echo $count14;?>, legendText:"Other", indexLabel: "Other : <?php echo $count14;?>" },
										]
									}]
								});
								chart.render();
								}

								function explodePie (e) {
									if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
										e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
									} else {
										e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
									}
									e.chart.render();

								}
								</script>
								<div id="chartContainer" style="height: 230px; max-width: 480px;"></div>
								<script src="js/canvasjs.min.js"></script>
                            </div>
						</div>

                        </div>
						
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                New Order
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Student Name</th>
												<th>Hostel Name</th>
                                                <th>Category</th>
												<th>Hostel Image</th>
                                                <th>Date Booking</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Student Name</th>
                                                <th>Hostel Name</th>
                                                <th>Category</th>
												<th>Hostel Image</th>
                                                <th>Date Booking</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
								<?php
								$own = mysqli_query($connect, "SELECT * from hostel where Own_id = '$oid'");
								$i=1;
								while($own1=mysqli_fetch_array($own))
								{
									$hidd = $own1["ID"];
									$bok=mysqli_query($connect,"SELECT * from book where HosId ='$hidd' and Status='paid'");
									while($userData=mysqli_fetch_array($bok))
									{
										$hid=$userData['HosId'];
										$sid=$userData['StudId'];
										$hos = mysqli_query($connect, "SELECT * from hostel where ID = '$hid' and Own_id = '$oid' ");
										$hos1 = mysqli_fetch_array($hos);
										$cid=$hos1['Cat_id'];
										
										$cat=mysqli_query($connect, "SELECT * from category where ID = '$cid'");
										$row = mysqli_fetch_assoc ($cat);
										
										$result33=mysqli_query($connect, "select * from studregister where User_id = '$sid'");
										$row3=mysqli_fetch_assoc($result33);
								?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row3['Studname'];?></td>
												<td><?php echo $hos1['HosName'];?></td>
                                                <td><?php echo $row['Category'];?></td>
                                                <td><?php echo "<img src='../img/Hostel/".$hos1['Image1']."' width='60px' height='60px'>" ?></td>
                                                <td><?php echo $userData['Date'];?></td>
												<td><a class="btn btn-success btn-sm" href="">
														<i class="fa fa-check-circle">
														</i>
															  DONE
														</a></td>
                                            </tr>
								<?php 
								$i++;	
								}
								}	
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