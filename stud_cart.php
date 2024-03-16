<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart</title>
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
					$sid = $userData["User_id"];
				}
				?>
	 <h1 style="text-align:center;"><p><i class="fa fa-shopping-cart"></i>Shopping Cart</p></h1> 
	
	<h6 style="text-align:center;">Attention!!<br> Make appointment to view hostel before check out</h6>
	<?php
		
		$host = mysqli_query($connect, "SELECT * from hostel where TotRoom !=0 and HostelIsDelete='0'");
		$totalpay = 0;
		$totalroom = 0;
		$num = 0;
		while($host1=mysqli_fetch_array($host))
		{
			$hidd = $host1["ID"];
			$result= mysqli_query($connect,"SELECT * from cart where HosId='$hidd' and StudId= '$sid' and HosIsDelete=0");
			
			while($row1 = mysqli_fetch_array($result))
			{
				$hid = $row1["HosId"];
				$res = mysqli_query($connect, "SELECT * from hostel where ID = '$hid'");
				$row = mysqli_fetch_array($res);
				$owner = $row["Own_id"];
				$cid = $row["Cat_id"];
				$ownner =mysqli_query($connect, "SELECT * from owner where owner_id = '$owner'");
				$own = mysqli_fetch_array($ownner);
				
			  ?>
			  <div id="hos1">
				<h4><b>Cart</b></h4>
					<div class="column left" >
						
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<p ><?php echo "<img src='img/Hostel/".$row['Image1']."' width='200px' height='200px'>" ?></p>
								</div>
							</div>
						</div>
					</div>
					  <div class="column middle">
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<h5><?php echo $row["HosName"]; ?></h5>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<h5>Hostel Owner Name:<br> <?php echo $own["owner_name"]; ?></h5>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<h5>Total Number Of Room: <?php echo $row["TotRoom"]; ?></h5>
								</div>
							</div>
						</div>
					<p>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
								<a href="stud_cart.php?id=<?php echo $hid; ?>" class="cart" name="delete" onclick="return confirmation()"><i class= "glyphicon glyphicon-trash"></i> Remove Hostel</a>
								</div>
							</div>
						</div>
					  </div>
					  
					  <div class="column right" >
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
									Price Per Room: RM <?php echo $row["HosPrice"]; ?>
									</div>
								</div>
							</div>
					  </div>
					  </div>
					  
				
					<?php
					$num = $num+1;
					$totalroom = $totalroom + $row1["NumOfRoom"];
					$payment = $row["HosPrice"] * $row1["NumOfRoom"];
					$totalpay = $totalpay + $payment;
					?>
			</div>
			<?php
			}
		}
			?>
	<form name="book" method="post">
		<?php
			$result= mysqli_query($connect,"SELECT * from cart where StudId='$sid' and HosIsDelete=0");
			$row=mysqli_fetch_array($result);
			?>
			
		<div id="hos2">
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<p> <h3 style="margin-left:10px;"> <b> The Total Is </b></h3></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<input type="text" id="hos" name="totprice" class="form-control"  value="Total Type Of Hostel :  <?php echo $num?>" >
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
						<p> <h4 style="margin-left:10px;"> <b> The Total Hostel:  <?php echo $num ?></b></h4></p>
					</div>
				</div>
			</div> 
			
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<?php 
							$name=$_POST["sname"];
							$date=date("Y-m-d");		
						?>
						<button class="cart" name="book" style="margin-left:20px; margin-right:20px; width:350px">Proceed To Appointment</button>
						<button class="cart" name="pay" style="margin-left:20px; margin-top:2px; margin-right:20px; width:350px">Proceed To Booking</button></p>

					</div>
				</div>
			</div> 
			
		</div>
	
	</form>
	<?php
			if(isset($_POST["book"]))
			{
				$result= mysqli_query($connect,"SELECT * from cart where StudId = '$sid' and HosIsDelete=0");
				while($row=mysqli_fetch_array($result))
				{
					
					$id    = $row["HosId"];
					$tot=$row["NumOfRoom"];
					$date  = date("Y-m-d");
					$stat  = v;
					
					
						$done=mysqli_query($connect, "INSERT INTO book (HosId,  StudId, TotRoom, Date, Status) 
														  VALUES ('$id',    '$sid', '$tot', '$date', '$stat')");
						mysqli_query ($connect, "UPDATE cart set HosIsDelete='1' where HosId= '$id'");
						?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
							<script type="text/javascript">
								swal({title: "Successful Save !",
									  icon: "success",
									  button: "Please Make Appointment"}).then(function(){window.location.href = "stud_viewhos.php";});
							</script>
						<?php
				}
				
			}
			
		?>
		<?php
			if(isset($_POST["pay"]))
			{
				$result= mysqli_query($connect,"SELECT * from cart where StudId = '$sid' and HosIsDelete=0");
				while($row=mysqli_fetch_array($result))
				{
					
					$id    = $row["HosId"];
					$hos   = $row["HosName"];
					$type  = $row["HosType"];
					$oname = $row["HosOwnName"];
					$pprice = $row["HosPrice"];
					$img = $row["HosMainImg"];
					$price = $payment;
					$tot=$row["NumOfRoom"];
					$date  = date("Y-m-d");
					$stat  = unpaid;
					
					
						$done=mysqli_query($connect, "INSERT INTO book (HosId,   StudId, TotRoom, Date, Status) 
														  VALUES ('$id',   '$sid', '$tot', '$date', '$stat')");
						mysqli_query ($connect, "UPDATE cart set HosIsDelete='1' where HosId= '$id'");
						?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
							<script type="text/javascript">
								swal({title: "Proceed To Booking!",
									  icon: "success",
									  button: "View Booking"}).then(function(){window.location.href = "stud_order.php";});
							</script>
						<?php
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
			mysqli_query($connect,"update cart set HosIsDelete=1 where HosId='$Id'");
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Delete!",
				  icon: "success",
				  button: "Review"}).then(function(){window.location.href = "stud_cart.php";});
			</script>
	  <?php

		}
							
	  ?>	
		
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