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
        <title>JTY HOSTEL</title>
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
                        <h2 class="mt-4"></h2>
                        
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-blue">
									<div class="inner">
                                    <?php
									  $result=mysqli_query($connect,"SELECT ID from hostel");
									  $count=mysqli_num_rows($result);
									?>
										<h3> <?php echo $count;?> </h3>
										<p> Room Avliable </p>
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
									  $result=mysqli_query($connect,"SELECT User_id from studregister");
									  $count1=mysqli_num_rows($result);
									?>
										<h3> <?php echo $count1;?> </h3>
										<p> Student Register </p>
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
									  $result1=mysqli_query($connect,"SELECT owner_id from owner");
									  $count2=mysqli_num_rows($result1);
									?>
										<h3> <?php echo $count2;?> </h3>
										<p> Owner Register </p>
									</div>
									<div class="icon">
										<i class="fa fa-user-plus" aria-hidden="true"></i>
									</div>
									<a href="owner_list.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-orange">
									<div class="inner">
									<?php
									  $result1=mysqli_query($connect,"SELECT Id from book");
									  $count3=mysqli_num_rows($result1);
									?>
										<h3> <?php echo $count3;?> </h3>
										<p> Total Booking </p>
									</div>
									<div class="icon">
										<i class="fa fa-dollar-sign"></i>
									</div>
									<a href="view_booking.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-info">
									<div class="inner">
                          <?php
									  	$pay = mysqli_query($connect, "SELECT * from payment ");
										$totpricestudent =0;
										while($pay1=mysqli_fetch_array($pay))
										{
											$disprice=$pay1["Price"];
											
											$totpricestudent += $disprice;
										}
									  
									?>
										<h3>RM <?php echo number_format($totpricestudent, 2);;?></h3>
									
										<p> Total Payment <br><small>by Student</small> </p>
									</div>
									<div class="icon">
										<i class="fa fa-dollar-sign" aria-hidden="true"></i>
									</div>
									<a href="view_payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-success">
									<div class="inner">
                          <?php
									  	$pay = mysqli_query($connect, "SELECT * from payment ");
										$totpriceowner = 0;
										while($pay1=mysqli_fetch_array($pay))
										{
											$sid = $pay1["StudId"];
											$stud = mysqli_query($connect, "SELECT * from studregister where User_id = '$sid'");
											$stud1 = mysqli_fetch_array($stud);
											$disprice=$pay1["Price"];
											$hid = $pay1["HosId"];
											$bid = $pay1["BookId"];
											
											$bok = mysqli_query($connect, "SELECT * from book where Id = '$bid'");
											$bok1 = mysqli_fetch_array($bok);
											$troom = $bok1["TotRoom"];
											$hoss = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
											$hoss1= mysqli_fetch_array($hoss);
											$price = $hoss1["HosPrice"];
											
											$p1 = $price * $troom;
											$totowner= $p1*0.9;
											$totpriceowner += $totowner;
										}
									  
									?>
										<h3>RM <?php echo number_format($totpriceowner, 2);;?> </h3>
									
										<p> Total Payment<br><small>to Owner</small> </p>
									</div>
									<div class="icon">
										<i class="fa fa-dollar-sign" aria-hidden="true"></i>
									</div>
									<a href="view_payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-danger">
									
									<div class="inner">
                          <?php
									  	$pay = mysqli_query($connect, "SELECT * from payment ");
										$totprice = 0;
										while($pay1=mysqli_fetch_array($pay))
										{
											$vou = $pay1["VouId"];
											$disprice=$pay1["Price"];
											$hid = $pay1["HosId"];
											$bid = $pay1["BookId"];
											$vou1 = mysqli_query($connect, "SELECT * from voucher where Id ='$vou'");
											$vou2 = mysqli_fetch_array($vou1);
											$coid = $vou2["Coupid"];
											$coup = mysqli_query($connect, "SELECT * from coupon where coupon_id='$coid'");
											$coup1= mysqli_fetch_array($coup);
											$cdis = $coup1["coupon_discount"];
											$bok = mysqli_query($connect, "SELECT * from book where Id = '$bid'");
											$bok1 = mysqli_fetch_array($bok);
											$troom = $bok1["TotRoom"];
											$hoss = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
											$hoss1= mysqli_fetch_array($hoss);
											$price = $hoss1["HosPrice"];
											if($vou==0)
											{
												$p = $price * $troom;
												$tot= $p*0.1;
											}
											else
											{
												$p = $price * $troom;
												$admin= $p*0.1;
												$dis = $p -$disprice;
												$tot = $admin - $dis;
											}
											$totprice = $totprice + $tot;
										}
									  
									?>
										<h3>RM <?php echo number_format($totprice, 2);;?></h3>
									
										<p> Total Income <br><small>JTY Hostel</small></p>
									</div>
									<div class="icon">
										<i class="fa fa-dollar-sign" aria-hidden="true"></i>
									</div>
									<a href="view_payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card-box bg-warning">
									<div class="inner">
                          <?php
									  	$pay = mysqli_query($connect, "SELECT * from payment ");
										$totdiscount = 0;
										while($pay1=mysqli_fetch_array($pay))
										{
											$disprice=$pay1["Price"];
											$hid = $pay1["HosId"];
											$bid = $pay1["BookId"];
											
											$bookk = mysqli_query($connect, "SELECT * from book where Id = '$bid'");
											$bookk1 = mysqli_fetch_array($bookk);
											$room = $bookk1["TotRoom"];
											$hoss = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
											$hoss1= mysqli_fetch_array($hoss);
											$price = $hoss1["HosPrice"]*$room;
											
											$disc_given = $price - $pay1['Price'];
											$totdiscount += $disc_given;
										}
									  
									?>
										<h3>RM <?php echo number_format($totdiscount, 2);;?></h3>
									
										<p> Total Discount Given <br><small>to Student</small></p>
									</div>
									<div class="icon">
										<i class="fa fa-dollar-sign"></i>
									</div>
									<a href="view_payment.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						
                        
						
						
                        <div class="row">
                            <div class="col-xl-6 ">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Admin
                                    </div>
                                    <div class="card-body pt-1">
									  <div class="row">
										<div class="col-8">
										<?php
											if(isset($_SESSION["ADMINAREAID"]))
											{
												$userData = $_SESSION["ADMINAREAID"];
												
											}
										?> 
										  <p ><b>Admin Name:</b><p><h4 class="text-muted text-sm"><?php echo $userData['Name']; ?></h4>
										  <p><b>Email Adress:</b><br> <?php echo $userData['Email']; ?><p>
										  <p ><b>Phone Number:</b><br><i class="fas fa-lg fa-phone"></i> <?php echo $userData['Contact']; ?><p>
										  
										</div>
										<div class="col-4 text-center">
										  <img src="../img/Admin/<?php echo $userData["Pic"]; ?>" class="img-circle img-fluid">
										</div>
									  </div>
									</div>
									<div class="card-footer">
									  <div class="text-right">
										<a href="view_admin.php" class="btn btn-sm btn-primary">
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
                                        Total Room Available by Category In Pie Chart
                                    </div>
                                    <div id="piechart"></div>

								<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

								<script type="text/javascript">
								// Load google charts
								google.charts.load('current', {'packages':['corechart']});
								google.charts.setOnLoadCallback(drawChart);

								// Draw the chart and set the chart values
								function drawChart() {
								  var data = google.visualization.arrayToDataTable([
								  <?php
											  $result11=mysqli_query($connect,"SELECT Cat_id from hostel where Cat_id='1'");
											  $count11=mysqli_num_rows($result11);
											  
											  $result12=mysqli_query($connect,"SELECT Cat_id from hostel where Cat_id='2'");
											  $count12=mysqli_num_rows($result12);
											  
											  $result13=mysqli_query($connect,"SELECT Cat_id from hostel where Cat_id='3'");
											  $count13=mysqli_num_rows($result13);
											  
											  $result14=mysqli_query($connect,"SELECT Cat_id from hostel where Cat_id='4'");
											  $count14=mysqli_num_rows($result14);
											?>
								  ['Task', 'Total Room by Category'],
								  ['Ixora Apartment', <?php echo $count11;?>],
								  ['Pangsapuri Bukit Beruang Permai', <?php echo $count12;?>],
								  ['The Height Resident', <?php echo $count13;?>],
								  ['Other', <?php echo $count14;?>]
								]);

								  // Optional; add a title and set the width and height of the chart
								  var options = {'title':'Total Room by Category', 'width':540, 'height':300};

								  // Display the chart inside the  element with id="piechart"
								  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
								  chart.draw(data, options);
								}
								</script>
                            </div>
						</div>
							
							
                        </div>
						
						
						
						
                        
						
						
						
						
						<div class="row">
						<div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Total Room Rented by Category In Donut Chart
                                    </div>
                                    <script type="text/javascript">
									  window.onload = function () {
										var chart = new CanvasJS.Chart("chartContainer",
										{
										  title:{
											text: "RENTED HOSTEL REPORT",
											fontFamily: "Times New Roman",
											fontWeight: "Bold"
										  },

										  legend:{
											verticalAlign: "bottom",
											horizontalAlign: "center"
										  },
										  data: [
										  {
											//startAngle: 45,
										   indexLabelFontSize: 15,
										   indexLabelFontFamily: "Times New Roman",
										   indexLabelFontColor: "darkgrey",
										   indexLabelLineColor: "darkgrey",
										   indexLabelPlacement: "outside",
										   type: "doughnut",
										   showInLegend: true,
										   dataPoints: [
										   <?php
											  $result201=mysqli_query($connect,"SELECT * from payment ");
											  $cat1=0;
											  $cat2=0;
											  $cat3=0;
											  $cat4=0;
											  while($pay201 = mysqli_fetch_array($result201))
											  {
												  $hid2 = $pay201["HosId"];
												  $hos2 = mysqli_query($connect, "SELECT * from hostel where ID = '$hid2'");
												  $hos22 = mysqli_fetch_array($hos2);
												  $cat = $hos22["Cat_id"];
												  if($cat =='1')
												  {
													  $cat1=$cat1+1;
												  }
												  else if($cat =='2')
												  {
													  $cat2=$cat2+1;
												  }
												  else if($cat =='3')
												  {
													  $cat3=$cat3+1;
												  }
												  else if($cat =='4')
												  {
													  $cat4=$cat4+1;
												  }
											  }
												  
												  
											?>
										   {  y: <?php echo $cat1;?>, legendText:"Ixora Apartment", indexLabel: "Ixora Apartment: <?php echo $cat1;?>" },
										   {  y: <?php echo $cat2;?>, legendText:"Pangsapuri Bukit Beruang Permai", indexLabel: "Pangsapuri Bukit Beruang Permai: <?php echo $cat2;?>" },
										   {  y: <?php echo $cat3;?>, legendText:"The Height Resident", indexLabel: "The Height Resident: <?php echo $cat3;?>" },
										   {  y: <?php echo $cat4;?>, legendText:"Other", indexLabel: "Other: <?php echo $cat4;?>" },
										   ]
										 }
										 ]
									   });

										chart.render();
									  }
									  </script>
									  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
									  <div id="chartContainer" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
									</div>
                                </div>
                            </div>
							
							<div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Data Analysis of JTY Hostel
                                    </div>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
									<script type="text/javascript">
									  google.charts.load('current', {'packages':['bar']});
									  google.charts.setOnLoadCallback(drawStuff);

									  function drawStuff() {
										var data = new google.visualization.arrayToDataTable([
										  ['Data Analysis', 'Total Number'],
										  <?php
											  $result100=mysqli_query($connect,"SELECT Admin_id from admin where AdminType='Admin'");
											  $count100=mysqli_num_rows($result100);
											?>
										  ["Admin", <?php echo $count100;?>],
										  
										  <?php
											  $result1=mysqli_query($connect,"SELECT owner_id from owner");
											  $count2=mysqli_num_rows($result1);
											?>
										  ["Owner", <?php echo $count2;?>],
										  
										  <?php
										  $result=mysqli_query($connect,"SELECT User_id from studregister");
										  $count1=mysqli_num_rows($result);
											?>
										  ["Student", <?php echo $count1;?>],
										  
										  <?php
											  $result101=mysqli_query($connect,"SELECT Admin_id from admin where AdminType='SuperAdmin'");
											  $count101=mysqli_num_rows($result101);
											?>
										  ["Super Admin", <?php echo $count101;?>],
										  
										  <?php
											  $result=mysqli_query($connect,"SELECT ID from hostel");
												$count=mysqli_num_rows($result);
											?>
										  ["Hostel", <?php echo $count;?>]
										]);

										var options = {
										  width: 540,
										  legend: { position: 'none' },
										  chart: {
											title: 'JTY Hostel',
											},
										  
										  bar: { groupWidth: "90%" }
										};

										var chart = new google.charts.Bar(document.getElementById('top_x_div'));
										// Convert the Classic options to Material options.
										chart.draw(data, google.charts.Bar.convertOptions(options));
									  };
									</script>
									  <div id="top_x_div" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
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
							
								$result=mysqli_query($connect,"SELECT * from book where Status='paid'");
							
								$i=1;
							
							while($userData = mysqli_fetch_array ($result))
							{
								$hid = $userData["HosId"];
								$sid = $userData["StudId"];
								$hos = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
								$hos1 = mysqli_fetch_array($hos);
								$cid = $hos1["Cat_id"];
								$stud = mysqli_query($connect, "SELECT * from studregister where User_id='$sid'");
								$stud1 = mysqli_fetch_array($stud);
								$cat = mysqli_query($connect, "SELECT * from category where ID = '$cid'");
								$cat1 = mysqli_fetch_array($cat);
								?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $stud1['Studname'];?></td>
												<td><?php echo $hos1['HosName'];?></td>
                                                <td><?php echo $cat1['Category'];?></td>
                                                <td><?php echo "<img src='../img/Hostel/".$hos1['Image1']."' width='60px' height='60px'>" ?></td>
                                                <td><?php echo $userData['Date'];?></td>
                                                <td><a class="btn btn-success btn-sm" href="#">
														<i class="fa fa-check-circle">
														</i>
															  DONE
														</a></td>
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

<?php } ?>
