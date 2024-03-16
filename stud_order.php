<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/box.css">
	<link rel="stylesheet" href="css/cart.css">
	
	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" style="font-size:24px"></i></button>


</head>

<body style="background-color:#F4F4F4;">
	<?php include("includes/header-navigation.php"); ?>
	<?php
				if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					$name = $userData["Studname"];
					$email = $userData["Studemail"];
					$sid = $userData["User_id"];
				}
				?>
	 <h1 style="text-align:center;"><p><i class="fa fa-credit-card"></i>Booking</p></h1> 
	
	<h6 style="text-align:center;">Attention!!<br> You Can Only Check Out With One Hostel</h6>
		  <?php
		$host = mysqli_query($connect, "SELECT * from hostel where TotRoom !=0 and HostelIsDelete='0'");
		$totalpay = 0;
		$totroompay =0;
		$totalroom = 0;
		$num = 0;
		while($host1=mysqli_fetch_array($host))
		{
			$hidd = $host1["ID"];
			$result= mysqli_query($connect,"SELECT * from book where  HosId='$hidd' and StudId='$sid' and Status!='cancel' and Status!='v' and Status!='proceed' and HosIsDelete='0' ");
			
			
			while($row = mysqli_fetch_array($result))
			{
				$bid = $row["Id"];
				$hid= $row["HosId"];
				$res= mysqli_query($connect, "SELECT * from hostel where ID = '$hid'");
				$hos = mysqli_fetch_array($res);
				$cat = $hos["Cat_id"];
				$category = mysqli_query($connect, "SELECT * from category where ID ='$cat'");
				$cate = mysqli_fetch_array($category);
				$owner = $hos["Own_id"];
				$ownner =mysqli_query($connect, "SELECT * from owner where owner_id = '$owner'");
				$own = mysqli_fetch_array($ownner);
				?>
			  <div id="hos1">
				<h4><b>Booking <input type="text" id="bok" style="border:1px solid white; background-color:white; color:white" name="id" value="<?php echo $row["Id"]?>";></b></h4>
					<div class="column left" >
						
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<?php echo "<img src='img/Hostel/".$hos['Image1']."' width='200px' height='160px'>" ?>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<?php echo $hos["HosName"]; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Hostel Owner Name: <?php echo $own["owner_name"]; ?>
								</div>
							</div>
						</div>
					</div>
					  <div class="column middle">
						
						
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Hostel Category: <?php echo $cate["Category"]; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Booking Date: <?php echo $row["Date"]; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Total Number Of Room: <?php echo $hos["TotRoom"]; ?>
								</div>
							</div>
						</div>
						<p>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
								<a href="stud_order.php?id=<?php echo $row['Id']; ?>" class="cart" name="delete" onclick="return confirmation()"><i class= "glyphicon glyphicon-trash"></i> Remove Hostel</a>
								</div>
							</div>
						</div>
					  </div>
					  <form method="post">
					  <div class="column right" >
						<p><div id="container">
								<p>Number Of Room You Want: </p>
								<input style= "border:solid 1px grey; width:50px; height:50px; text-align:center; border-radius:6px;" type="text" name="numroom"  value="<?php echo $row["TotRoom"];?>">
							</div></p>
							<?php
								if($hos["OriRoom"]!=$hos["TotRoom"])
								{
									if($hos["TotRoom"]>=$row["TotRoom"])
									{
										
									}
									else
									{
									?>
										<button class="cart" name="reroom" > Submit</button></a></p>
									<?php
									}
								}
								else
								{}
							?>
														
							
							</form>
							
							<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
								Price Per Room: RM <?php echo $hos["HosPrice"]; ?>
								</div>
							</div>
						</div>
					  </div>
					  
					<hr>
					<?php
					$num = $num+1;
					$totalroom = $row["TotRoom"] + $totalroom;
					$totroompay = $hos["HosPrice"] * $row["TotRoom"];
					$totalpay = $totalpay + $totroompay;
					$id = $row["Id"];
					?>
			</div>
			<?php
			}
		}
			?>
	<form name="book" method="post">
		<?php
			$result= mysqli_query($connect,"SELECT * from book where StudID='$sid' and Status!='cancel' and Status!='v' and Status!='proceed' and HosIsDelete='0'");
			$row=mysqli_fetch_array($result);
			?>
		
		<div id="hos2" style=" margin-bottom:20px;">
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<p> <h3 style="margin-left:10px;"> <b> The Total Amount Is </b></h3></p>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<input type="text" id="hos" name="totprice" class="form-control"  value="Temporary Amount : RM <?php echo $totalpay?>" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<input type="text" id="hos" name="totroom" class="form-control"  value="Total Room : <?php echo $totalroom ?>" >
					</div>
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<p> <h4 style="margin-left:10px;"> <b> The Total Amount To Pay: RM <?php echo $totalpay ?></b></h4></p>
					</div>
				</div>
			</div> 
			
				<div class="row">
					<div class="col-xl-12">
						<div class="form-label-group">
							<p> Redeem voucher: </p>
							<input type="text" name="coupun" placeholder="Enter Promo Code">
						</div>
					</div>
				</div> 
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<button class="cart" name="book" style="margin-left:20px; margin-right:20px; width:350px"><i class= "fa fa-credit-card-alt"></i> Check Out</button></a></p>

					</div>
				</div>
			</div> 
			
			
		</div>
	
	</form>
	<?php
	if (isset($_POST["reroom"]))
	{
		$room = $_POST["numroom"];				
		$tot = $hos["TotRoom"];
		if($room>$tot)
		{
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Sorry!",
					 text:"Rooms Left Is Less Than Room You Required ",
					  icon: "error",
					  button: "Retry"}).then(function(){window.location.href = "stud_order.php";});
			</script>
			 <?php
		}
		else
		{
				mysqli_query($connect, "UPDATE book set TotRoom ='$room' where Id = '$bid'");
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
					swal({title: "Room Number Has Been Change!",
					    	  icon: "success",
						      button: "Review"}).then(function(){window.location.href = "stud_order.php";});
				</script>
				 <?php
		}
								
	}
	?>
	<?php
	if(isset($_POST["book"]))
	{
		$voucher = $_POST["coupun"];
		$coup = mysqli_query($connect, "SELECT * from coupon where coupon_code = '$voucher' and CouponIsDelete=0 and coupon_limit >= coupon_used ");
		
		$qry = mysqli_query($connect,"SELECT * from book where StudID='$sid' and Status='Proceed' and HosIsDelete='0' ");
		
		$result= mysqli_query($connect,"SELECT * from book where StudID='$sid' and Status!='cancel' and Status!='v' and Status!='proceed' and HosIsDelete='0'");
		$row=mysqli_fetch_array($result);
		$id= $row["Id"];
		$hid = $row["HosId"];
		$sta = proceed;
		
		$res = mysqli_query($connect, "SELECT * from hostel where ID = '$hid'");
		$row = mysqli_fetch_array($res);
		$tot = $row["TotRoom"];
		
		$host = mysqli_query($connect, "SELECT * from payment where StudID = '$sid'");
		$host1 = mysqli_fetch_array($host);
		$host2 = $host1["HosId"];
		$tel = mysqli_query($connect, "SELECT * from hostel where ID ='$host2'");
		$tel1 = mysqli_fetch_array($tel);
		$tel2 - $tel1["HosName"];
		if(mysqli_num_rows($host) =='1')
		{
			?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({title: "You are not allow to purchase twice in a year!",
						 icon: "error",
						 button: "Ok"}).then(function(){window.location.href = "#";});
				</script>
			<?php
		}
		else
		{
			if($num>1)
			{
				 ?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "You Can Only Proceed With One Hostel!",
							  icon: "error",
							  button: "Retry"}).then(function(){window.location.href = "stud_order.php";});
					</script>
				 <?php
			}
			
			else
			{
				if(mysqli_num_rows($qry)=='1')
				{
					 ?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
								swal({title: "You Have Unpaid Hostel!",
										 text:"Please Proceed To Payment",
									  icon: "error",
									  button: "Make Payment"}).then(function(){window.location.href = "stud_payment.php";});
								</script>
						  <?php
				}
				else
				{
					if ($totalroom > $tot)
					{
						?>
										<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
										<script type="text/javascript">
										swal({title: "Sorry!",
												 text:"Rooms Left Is Less Than Room You Required ",
											  icon: "error",
											  button: "Retry"}).then(function(){window.location.href = "stud_order.php";});
										</script>
								  <?php
					}
					else
					{
						if($voucher !='')
						{
							if(mysqli_num_rows($coup) == '1')
							{
								$cou = mysqli_fetch_array($coup);
								$cid = $cou["coupon_id"];
								$vou = mysqli_query($connect, "SELECT * from voucher where CoupId = '$cid' and StudId='$sid' ");
								if(mysqli_num_rows($vou)== '1')
								{
									$vou1 = mysqli_fetch_array($vou);
									$vv1 =$vou1["VouIsUse"];
									if($vv1=='0')
									{
										$vouid = $vou1["Id"];
										mysqli_query($connect,"UPDATE book set Status =  '$sta' where Id = '$id'");
										?>
											<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
											<script type="text/javascript">
											swal({title: "Move To Payment!",
													 button: "Payment"}).then(function(){window.open('stud_payment.php?id=<?php echo $vouid ?>','_self');});
											</script>
										<?php
									}
									else
									{
										 ?>
											<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
											<script type="text/javascript">
											swal({title: "Please enter other voucher !",
													 icon: "error",
													 button: "Reenter"}).then(function(){window.location.href = "#";});
											</script>
										<?php
									}
								}
									else
									{
										mysqli_query($connect,"UPDATE book set Status =  '$sta' where Id = '$id'");
											$v=mysqli_query($connect, "INSERT INTO voucher (CoupId, StudId) VALUES ('$cid', '$sid')");
											$vv = mysqli_query($connect, "SELECT * from voucher where CoupId= '$cid' and StudId ='$sid'");
											$v1 = mysqli_fetch_array($vv);
												 ?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "Move To Payment!",
																 button: "Payment"}).then(function(){window.open('stud_payment.php?id=<?php echo $v1["Id"] ?>','_self');});
														</script>
												  <?php
									}
								}
							
							else
							{
								 ?>
									<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
									<script type="text/javascript">
									swal({title: "Please enter other voucher !",
											 icon: "error",
											 button: "Reenter"}).then(function(){window.location.href = "#";});
									</script>
								<?php
							}
						}
						else
						{
								mysqli_query($connect,"UPDATE book set Status =  '$sta' where Id = '$id'");
							 ?>
									<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
									<script type="text/javascript">
									swal({title: "Move To Payment!",
											 button: "Payment"}).then(function(){window.open('stud_payment.php?id=<?php echo 0 ?>','_self');});
									</script>
							<?php
						}
					}
				}
			}
		}
		
	}
	?>
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
			$sta = 'cancel';
			$up=mysqli_query($connect,"UPDATE book SET HosIsDelete='1', Status='$sta' where Id='$Id'");
			$del = mysqli_query($connect, "UPDATE appointment set AppoinIsDelete ='1', AppointDone='1' where BookId= '$Id'");
			if($up)
			{
			  ?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({title: "Successful Delete!",
						  icon: "success",
						  button: "Review"}).then(function(){window.location.href = "stud_order.php";});
					</script>
			  <?php
			}
		}
							
	  ?>	
		<div id="hos3">
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<p> <h4 style="margin-left:10px;"> <b> We Accept </b></h4></p>
						<p><img src="img/Payment/master.png" style="margin-left:20px;" width="50px";>&nbsp; &nbsp;<img src="img/Payment/visa.png" width="50px";>
					</div>
				</div>
			</div>
		</div>
  <!-- loader -->
  
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  
  </body>

</html>
<?php include("connect.php");
	if(!isset($_SESSION['student']))
	{
        
        echo "<script>window.open('stud_login.php','_self')</script>";
        
    }
	else
	{}
?>