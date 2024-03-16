<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Appointment</title>
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
<style>
#hos5 {
	  border:1px solid white;
	  border-radius:10px;
	  box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
	  background-color:white;
	  width:1300px;
	  margin-left:100px;
	  float:left;
	 }
</style>

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
				<div id="main-containers">
	<form method="post" name="appoint">
	<div class="col-md-9"><!-- col-md-9 Begin -->
	 <h1 style="text-align:center;"><p><i class="fa fa-credit-card"></i>Appointment</p></h1> 
	  <?php
			$book1= mysqli_query($connect,"SELECT * from book where StudId= '$sid' and  HosIsDelete='0' ");
			
			while($book2= mysqli_fetch_array($book1))
			{
				$bid = $book2["Id"];
				$result= mysqli_query($connect,"SELECT * from appointment where StudId= '$sid' and  AppoinIsDelete='0' and AppoinDone='0' and BookId='$bid'");

				while($row= mysqli_fetch_array($result))
				{
					$hid = $row["HosId"];
					$res  = mysqli_query ($connect, "SELECT * FROM hostel where ID= '$hid'");
					$row2 = mysqli_fetch_array($res);
					$owner = $row2["Own_id"];
					$ownner =mysqli_query($connect, "SELECT * from owner where owner_id = '$owner'");
					$own = mysqli_fetch_array($ownner);
					$cat = $row2["Cat_id"];
					$category = mysqli_query($connect, "SELECT * from category where ID ='$cat'");
					$cate = mysqli_fetch_array($category);
					
				?>
					<div id="hos5">
					<h4><b>Appointment </b></h4>
						<div class="column left" >
							
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<?php echo "<img src='img/Hostel/".$row2['Image1']."' width='200px' height='160px'>" ?>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<?php echo $row2["HosName"]; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<p>Hostel Owner Name: <br><?php echo $own["owner_name"]; ?></p>
									</div>
								</div>
							</div>
						</div>
						  <div class="column middle">
							
							
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<p>Hostel Category: <?php echo $cate["Category"]; ?></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<p>Booking Date: <?php echo $row["Date"]; ?></p>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<p>Approve Status:
										<?php
										if($row["Approve"]=='0')
										{
											?> Admin Have Not Approve yet <?php
										}
										else
										{
											?>Your Appointment Has Been Approve!<?php
										}
										?></p>
									</div>
								</div>
							</div>
						  </div>
						  
						  <div class="column right" >
							<p>
							
								<div id="container">
								</div>
								
								<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
									<a href="stud_appoin.php?id=<?php echo $row['Id']; ?>" class="cart" name="delete" onclick="return confirmation()"><i class= "glyphicon glyphicon-trash"></i> Cancel Appoinment</a>
									</div>
								</div>
							</div>
							
								</p>
								
						 </div>
						  
						<hr>
					
				</div>
				<?php				
				}
			}
			?>
	
	
		</div>
		</form>
		</div>
  <!-- loader -->
 <script>
	  function confirmation()
	  {
		var answer;
		answer=confirm("Are You Sure You Want To Cancel Appoinment?");
		return answer;
	  } 
 </script>
	  <?php
		if(isset($_GET["id"]))			
		{
			$Id=$_GET["id"];
			$result= mysqli_query($connect,"SELECT * from appointment where StudId ='$sid' and  AppoinIsDelete='0' ");
			$row=mysqli_fetch_array($result);
			$bid= $row["BookId"];
			$sta = cancel;
			mysqli_query($connect,"update appointment set AppoinIsDelete=1 where Id='$Id'");
			mysqli_query($connect,"UPDATE book set Status = '$sta' , HosIsDelete='1' where Id = '$bid'"); 
	  ?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful Cancel!",
				  icon: "success",
				  button: "Done"}).then(function(){window.location.href = "index.php";});
			</script>
	  <?php
		}	
	  ?>	
  
	
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