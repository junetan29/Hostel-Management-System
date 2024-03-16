<?php include ("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hostel</title>
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
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" style="font-size:24px"></i></button>

  </head>

<body>

    <?php include("includes/header-navigation.php"); ?>
    <!-- END nav -->
	<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
	
	<?php
	$result = mysqli_query($connect, "SELECT * from slide where Slidecode='S01'");
	$row= mysqli_fetch_assoc($result);
	?>
	
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url(img/Slide/<?php echo $row["Pic"]?>)">
		<div class="carousel-caption d-none d-md-block">
          <h3 class="display-444"><?php echo $row["Hostel"]; ?></h3>
          <p class="leaddd"><?php echo $row["Distance"]; ?></p>
        </div>
      </div>
	  
      <!-- Slide Two - Set the background image for this slide in the line below -->
	  
	  <?php
		$result = mysqli_query($connect, "SELECT * from slide where Slidecode='S02'");
		$row= mysqli_fetch_assoc($result);
	  ?>
	
      <div class="carousel-item" style="background-image: url(img/Slide/<?php echo $row["Pic"]?>)">
		<div class="carousel-caption d-none d-md-block">
          <h3 class="display-444"><?php echo $row["Hostel"]; ?></h3>
          <p class="leaddd"><?php echo $row["Distance"]; ?></p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
	  
	  <?php
		$result = mysqli_query($connect, "SELECT * from slide where Slidecode='S03'");
		$row= mysqli_fetch_assoc($result);
	  ?>
	  
      <div class="carousel-item" style="background-image: url(img/Slide/<?php echo $row["Pic"]?>)">
		<div class="carousel-caption d-none d-md-block">
          <h3 class="display-444"><?php echo $row["Hostel"]; ?></h3>
          <p class="leaddd"><?php echo $row["Distance"]; ?></p>
        </div>
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
</header>
		<div class="row" style="margin-top:50px;">
		<div class="col-lg-3 mb-4">
			<?php
			$result1 = mysqli_query($connect, "SELECT * FROM category");
			while($row1= mysqli_fetch_array($result1))
			{
				?>
				 <div class="list-group">
						<a href="hostel.php?id=<?php echo $row1['ID'] ?>" class="list-group-item "><?php echo $row1["Category"]; ?></a>
				</div>
				<?php
			}
			?>
       
       
		  </div>
		  <div class="col-lg-8 mb-7">
			 <form name="hos" method="post" action="">    
				<div class="row">
				<?php
				$own = mysqli_query($connect, "SELECT * from owner where OwnerIsDelete = '0'");
				while($own1=mysqli_fetch_array($own))
				{
					$oid = $own1["owner_id"];
						if(isset($_GET["id"]))
						{
							$cat = $_GET["id"];
							$result = mysqli_query($connect, "SELECT * FROM hostel where cat_id = '$cat' and Own_id='$oid' and Status='1' and TotRoom !=0 and HostelIsDelete='0'");
						}
						$category= mysqli_query($connect, "SELECT * from category where ID ='$cat'");
						$cate = mysqli_fetch_array($category);
					while ($row = mysqli_fetch_array($result))
					{
					?> 
					
						<div class="col-lg-4 col-sm-6 mb-4">
					  <div class="card h-100">
					  <?php echo "<img src='img/Hostel/".$row['Image1']."' width='100%' height='200px'>" ?>
						<div class="card-body">
						  <h4 class="card-title">
							<a href="details.php?id=<?php echo $row['ID'] ?>"> <?php echo $row["HosName"]; ?> </a>
							<br><h5><?php  echo  $cate['Category']; ?></h5>
							<h5>RM <?php  echo  $row['HosPrice']; ?></h5><br>
							<br><br><br><br><br>
						  </h4>
						  
						</div>
						<a style="margin:5px;" class="btn btn-info btn-sl px-1 py-2" href="details.php?id=<?php echo $row['ID'] ?>">View Details</a>
					  </div>
					</div>	
						<?php
					}
				}
					?>
					
				</div>
			 </form>
		  </div>
		</div>
		 <?php
    
    
	 if(isset($_SESSION['student']) && !empty($_SESSION['student']))
	{
		$userData = $_SESSION['student'];
		include ("includes/feedback.php");
	}
	else
	{}
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

</body>
</html>
<?php include("connect.php");
	if(!isset($_SESSION['student']))
	{
        
        echo "<script>window.open('stud_login.php','_self')</script>";
        
    }
	else
	{ }
?>