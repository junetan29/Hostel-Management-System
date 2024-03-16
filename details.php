<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hostel Details</title>
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
	
	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" style="font-size:24px"></i></button>

</head>
<style>
#ic{
    border: 1px solid white;
    background-color: #45C052;
	height:50px;
	width :50px;
    color: white;
    font-size: 30px;
    border-radius: 6px;
    cursor: pointer;
    margin-right: 50px;
}
#ic:hover 
{ background-color:#d1e0e0;}
#dc{
    border: 1px solid white;
    background-color: #45C052;
	height:50px;
	width :50px;
    color: white;
    font-size: 30px;
    border-radius: 6px;
    cursor: pointer;
    margin-left: 50px;
}
#dc:hover 
{ background-color:#d1e0e0;}

#qty{
		border: 1px solid white;
		width:50px;
	}
.cart {
			box-sizing: border-box;
			padding: 10px;
			border: solid 1px #45C052;
			font-weight :bold;
			border-radius :5px;
			background-color:#45C052;
			color:white;
			width :250px;
}
.columnn {
  float: left;
  padding: 10px;
  height: 1000px; /* Should be removed. Only for demonstration */
}

.leftt {
  width: 50%;
}

.rightt {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

  <body>
	 <?php include("includes/header-navigation.php");
	 if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					
				}
		if(isset($_GET["id"]))
		{
			$hid=$_GET["id"];
			$result = mysqli_query($connect, "SELECT * from hostel where ID='$hid'");
			$row = mysqli_fetch_assoc($result);
		}
		
			$cat = $row["Cat_id"];
			$category = mysqli_query($connect, "SELECT * from category where ID ='$cat'");
			$cate = mysqli_fetch_array($category);
	?>
    <!-- END nav -->
	<form name="editfrm" method="POST" enctype="" >
	<h1 style="text-align:center;" > <?php echo $row["HosName"];?></h1><!--hostel name-->

	<div class="row" >
		<div class="columnn leftt" >
		
		<div class="col-md-12">
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" ></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		 <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4" ></li>

    </ol>
    <div class="carousel-inner" role="listbox">
	<?php
	if(isset($_GET["id"]))
		{
			$hid=$_GET["id"];
			$result = mysqli_query($connect, "SELECT * from hostel where ID='$hid'");
			$row = mysqli_fetch_assoc($result);
		}
	?>

      <!-- Slide One - Set the background image for this slide in the line below -->
     <div class="carousel-item active" style="background-image: url(img/Hostel/<?php echo $row["Image1"]?>)">
      </div> 
	  <div class="carousel-item " style="background-image: url(img/Hostel/<?php echo $row["Image2"]?>)">
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url(img/Hostel/<?php echo $row["Image3"]?>)">
		</div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url(img/Hostel/<?php echo $row["Image4"]?>)">
      </div>
	    <div class="carousel-item" style="background-image: url(img/Hostel/<?php echo $row["Image5"]?>)">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
    </div>
		</div>
		<div class="columnn rightt">
			<h1 ><p><?php echo $cate["Category"];?></p></h1><!-- hostel type--> 
			<hr>
			<?php
			$result = mysqli_query($connect, "SELECT * FROM rate where HosId= '$hid'");
			$num = 0;
			$rate = 0;
			while ($row2 = mysqli_fetch_array($result))
			{
				$num = $num+1;
				$rate = $rate + $row2["Rating"];	
			}
			$avg = $rate/$num;
			$oid = $row["Own_id"];
			$owner = mysqli_query($connect, "SELECT *from owner where owner_id='$oid'");
			$own = mysqli_fetch_array($owner);
			?>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<label for="name">Average Rating: <?php echo  $avg ?><i class = "fa fa-star"></i></label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<label for="name">Hostel Id : <?php echo $row["ID"]; ?></label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<label for="name">Hostel Owner Name : <?php echo $own["owner_name"]; ?></label>
						
					</div>
				</div>
			</div>
			<style>
			.box4{
			background: #ffffff;
			border: solid 1px #D8D8D8;
			box-sizing: border-box;
			width :500px;
			border-radius:5px;
			color:black;
			}
			</style>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<label for="name">Hostel Details : <?php echo $row["HosDetails"]; ?></label>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<label for="name">Total Room:	<?php echo $row["TotRoom"]; ?></label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="form-label-group">
						<label for="name">RM <?php echo $row["HosPrice"]; ?></label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6">
					<div class="form-label-group">
						<label for="name">Number Of Room You Want:</label>
						<p><input type="radio" name="numroom" value="1"> One Room</p>
						<p><input type="radio" name="numroom" value="<?php echo $row["TotRoom"]; ?>"> Whole Unit</p>
					</div>
				</div>
				
			</div>
			
			
			<p><div id="container">
				
			</div></p>
			
			<p></p>
			
			<p><button class="cart" id="wish" name="wishlist" ><i class="fa fa-heart"></i> Add To Wishlist</button> <button class="cart" name="addcart"  ><i class="fa fa-shopping-cart"></i> Add to Cart</button> </p>
		</div>
	</div>
	</form>
	
    <?php 
    if(isset($_POST["addcart"]))
	{
		$result = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
		$row  = mysqli_fetch_assoc($result);
		$sid   = $userData["User_id"];
		$hid   = $row["ID"];
		$num  = $_POST["numroom"];
		$tot   = $row["TotRoom"];
		$ori   = $row["OriRoom"];
		$balance  = $tot - $num; 
		
		$check = mysqli_query($connect, "SELECT * from cart where StudId = '$sid'and HosIsDelete='0' and HosId = '$hid' and NumOfRoom = '$num'");
		if(mysqli_num_rows($check)!=0)
		{
			?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({
							  title: "Please Check You Had Add Into Cart before",
							  text: "Press Ok To View Cart\n Cancel To Continue View Hostel",
							  icon: "warning",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href = 'stud_cart.php';
							  } else {
								window.location.href = '#';
							  }
							});
					</script>
				<?php
		}
		else
		{
			if($num==1)
			{
				if($balance >=0)
				{
					$ins=mysqli_query($connect,"INSERT INTO cart (StudId, HosId, NumOfRoom)
													 VALUES ('$sid','$hid', '$num')");
					if($ins)
					{
						?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
							<script type="text/javascript">
							swal({
							  title: "Successful Add Into Cart",
							  text: "Press Ok To View Cart\n Cancel To Continue View Hostel",
							  icon: "success",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href = 'stud_cart.php';
							  } else {
								window.location.href = '#';
							  }
							});
							</script>
					<?php
					}
				}
				else
				{
					?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
							swal({title : "Out Of Rooms!",
								  text  : "Please Enter correct Amount",
								  icon  : "error",
								  button: "Cancel"}).then(function(){window.location.href = "#";});
						</script>
					<?php
				}
			}
			else
			{
				if($ori != $tot)
				{
					{
							?>
							<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
								<script type="text/javascript">
									swal({title: "Someone Book This Room Before!",
											  text:"You Are Unabled To Book Whole Unit.",
											  icon: "error",
											  button: "Retry"});
								</script>
						<?php
					}
				}
				else
				{
					if($balance >=0)
				{
					$ins=mysqli_query($connect,"INSERT INTO cart (StudId, HosId,  NumOfRoom)
													 VALUES ('$sid','$hid', '$num')");
					if($ins)
					{
						?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
							<script type="text/javascript">
							swal({
							  title: "Successful Add Into Cart",
							  text: "Press Ok To View Cart\n Cancel To Continue View Hostel",
							  icon: "success",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href = 'stud_cart.php';
							  } else {
								window.location.href = '#';
							  }
							});
							</script>
					<?php
					}
				}
				else
				{
					?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
							swal({title : "Out Of Rooms!",
								  text  : "Please Enter correct Amount",
								  icon  : "error",
								  button: "Cancel"}).then(function(){window.location.href = "#";});
						</script>
					<?php
				}
				}
			}
		}
		
	}
	
	if(isset($_POST["wishlist"]))
	{
		$sid       = $userData["User_id"];
		$id            = $row["ID"];
		
		$check = mysqli_query($connect, "SELECT * from favourite where StudId='$sid' and HosIsDelete = '0' and HosId = '$id'");
		
		if(mysqli_num_rows($check)!=0)
		{
			?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
					swal({
							  title: "You Had Add Into Favorite before!",
							  text: "Press Ok To View My Favorite\n Cancel To Continue View Hostel",
							  icon: "warning",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href = 'stud_fav.php';
							  } else {
								window.location.href = '#';
							  }
							});
							</script>
				<?php
		}
		else
		{
			?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<script type="text/javascript">
						swal({
							  title: "Successful Add To Favourite!",
							  text: "Press Ok To View My Favourite\n Cancel To Continue View Hostel",
							  icon: "success",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href = 'stud_fav.php';
							  } else {
								window.location.href = '#';
							  }
							});
							</script>
				<?php
			mysqli_query($connect,"INSERT INTO favourite (StudId, HosId)
												 VALUES ('$sid', '$id')");
				
		}
	}
    include("includes/footer.php");
    
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