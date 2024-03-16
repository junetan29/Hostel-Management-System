<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Purchase History</title>
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
	<div class="col-md-9"><!-- col-md-9 Begin -->
	 <h1 style="text-align:center;"><p><i class="fa fa-credit-card"></i>Purchase History</p></h1> 
	  <?php
			$result= mysqli_query($connect,"SELECT * from book where StudId='$sid' and Status='Paid'  and HosIsDelete='1' ");
			
			$totalpay = 0;
			$totalroom = 0;
			$num = 0;
			while($row = mysqli_fetch_array($result))
			{
				$bid = $row["Id"];
				$res = mysqli_query($connect, "SELECT * from payment where BookId ='$bid'");
				$row2 = mysqli_fetch_array($res);
				$hid = $row["HosId"];
				$res3 = mysqli_query($connect, "SELECT * from hostel where ID= '$hid'");
				$row3 = mysqli_fetch_array($res3);
				$own = $row3["Own_id"];
				$cat = $row3["Cat_id"];
				$res4 = mysqli_query($connect, "SELECT * from owner where owner_id= '$own'");
				$row4 = mysqli_fetch_array($res4);
				$res5 = mysqli_query($connect, "SELECT * from category where ID ='$cat'");
				$row5 = mysqli_fetch_array($res5);
				?>
			  <div id="hos5">
				<h4><b>Purchase History </b></h4>
					<div class="column left" >
						
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<?php echo "<img src='img/Hostel/".$row3['Image1']."' width='200px' height='160px'>" ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<?php echo $row3["HosName"]; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Hostel Owner Name: <?php echo $row4["owner_name"]; ?>
								</div>
							</div>
						</div>
					</div>
					  <div class="column middle">
						
						<p>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Hostel Category: <?php echo $row5["Category"]; ?>
								</div>
							</div>
						</div>
						<p>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Booking Date: <?php echo $row["Date"]; ?>
								</div>
							</div>
						</div>
						<p>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Total Room You Purchase: <?php echo $row["TotRoom"]; ?>
								</div>
							</div>
						</div>
						<p>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									Total Price: RM  <?php echo $row2["Price"]; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-label-group">
									<a class="btn btn-primary" input type="button" target="_blank" href="tcpdf/stud_receipt.php?id=<?php echo $row2['ID']; ?>" >View Receipt</a>  
								</div>
							</div>
						</div>
					  </div>
					  
					  <div class="column right" >
						<p>
						<form method = "post" name="rate">
							<div id="container">
								<!--Rating-->
								<?php
								if($row["RateId"]==0)
								{
								?>
								<div class="form-group" style="color:white;text-align:center;">
										<i class="fa fa-star fa-2x" data-index="1"></i>
										<i class="fa fa-star fa-2x" data-index="2"></i>
										<i class="fa fa-star fa-2x" data-index="3"></i>
										<i class="fa fa-star fa-2x" data-index="4"></i>
										<i class="fa fa-star fa-2x" data-index="5"></i>				
								</div>
								<input type="hidden" name="rating" value="-1" id="rating-value" required>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="form-label-group">
										<input type="submit" name="submitbtn" value="Submit Rating" class="btn btn-primary">
									</div>
								</div>
								<?php
								}
								else
								{
								?>
								<div class="col-xl-12">
									<div class="form-label-group">
									You Have Rate This Hostel For
										<?php
										$rid2= $row["RateId"];
										$rate2 = mysqli_query($connect, "SELECT * from rate where Id = '$rid2'");
										$rates2 = mysqli_fetch_array($rate2);
										
										if ($rates2["Rating"] =='1')
										{
											?><i class ="fa fa-star-o" style="color:#5E72EB"></i><?php
										}
										else if($rates2["Rating"] =='2')
										{
											?>
											<i class ="fa fa-star-o" style="color:#5E72EB"></i>
											<i class ="fa fa-star-o" style="color:#24DE88"></i>
											<?php
										}
										else if($rates2["Rating"] =='3')
										{
											?>
											<i class ="fa fa-star-o" style="color:#5E72EB"></i>
											<i class ="fa fa-star-o" style="color:#24DE88"></i>
											<i class ="fa fa-star-o" style="color:#F04393"></i>
											<?php
										}
										else if($rates2["Rating"] =='4')
										{
											?>
											<i class ="fa fa-star-o" style="color:#5E72EB"></i>
											<i class ="fa fa-star-o" style="color:#24DE88"></i>
											<i class ="fa fa-star-o" style="color:#F04393"></i>
											<i class ="fa fa-star-o" style="color:#F9C449"></i>
											<?php
										}
										else if($rates2["Rating"] =='5')
										{
											?>
											<i class ="fa fa-star-o" style="color:#5E72EB"></i>
											<i class ="fa fa-star-o" style="color:#24DE88"></i>
											<i class ="fa fa-star-o" style="color:#F04393"></i>
											<i class ="fa fa-star-o" style="color:#F9C449"></i>
											<i class ="fa fa-star-o" style="color:#FF7B89"></i>
											<?php
										}
										
										?>
									</div>
								</div>
								<?php
								}
								?>
						</div>
						</form>
							</p>
							 <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
								<script>
									var ratedIndex = -1;

									$(document).ready(function () {
										resetStarColors();

										if (localStorage.getItem('ratedIndex') != null) {
											setStars(parseInt(localStorage.getItem('ratedIndex')));
										}

										$('.fa-star').on('click', function () {
										  
										   ratedIndex = parseInt($(this).data('index'));
										   $('#rating-value').val(parseInt($(this).data('index')));
										   alert($('#rating-value').val()); // check if the value changed
										});

										$('.fa-star').mouseover(function () {
											resetStarColors();
											var currentIndex = parseInt($(this).data('index'));
											setStars(currentIndex);
										});

										$('.fa-star').mouseleave(function () {
											resetStarColors();

											if (ratedIndex != -1)
												setStars(ratedIndex);
										});
									});

									
									 function saveToTheDB() {
										$.ajax({
										   url: "comment.php",
										   method: "POST",
										   dataType: 'json',
										   data: {
											   save: 1,
											   ratedIndex: ratedIndex
										   }, success: function (r) {
										   }
										});
									}
									
									function setStars(max) {
										for (var i=0; i <max; i++)
											$('.fa-star:eq('+i+')').css('color', 'yellow');
									}

									function resetStarColors() {
										$('.fa-star').css('color', 'grey');
									}
								</script>
					 </div>
					  
					<hr>
				
			</div>
			
			<?php
				}
			?>
	
	<?php
	if (isset($_POST["submitbtn"]))
	{
		$pay = mysqli_query($connect, "SELECT * from payment where StudId = '$sid'");
		$pay1 = mysqli_fetch_array($pay);
		$bid2 = $pay1["BookId"];
		$rate = $_POST["rating"];
		
		$ratee = mysqli_query($connect, "INSERT INTO rate (HosId, Rating) VALUES ('$hid',  '$rate')");
		if($ratee)
		{
			$r = mysqli_query($connect, "SELECT * from rate where HosId = '$hid' and Rating ='$rate'");
			$r1 = mysqli_fetch_array($r);
			$rid = $r1["Id"];
			mysqli_query($connect, "UPDATE book set RateId = '$rid' WHERE Id ='$bid2'");
		}
		?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Rating Has Been Save!",
							  icon: "success",
							  button: "Thank you!"}).then(function(){window.location.href = "index.php";});
						</script>
				  <?php
	}
	?>
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