<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Receipt</title>
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
  <body>
<?php include("includes/header-navigation.php"); ?>

    <!-- END nav -->
	<?php
				if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					$name = $userData["Studname"];
					$sid = $userData["User_id"];
				}
				?>

    <!-- END nav -->
<style>
.center{
		 display: block;
		  margin-left: auto;
		  margin-right: auto;
		  border-radius:50%;"
	   }
</style>
    <section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');">

<div id="printableArea">
<div id="main-containers">
	<section class="site-section">
	<div class="profile">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
		<div class="heading-section pt-md-5">
				<?php
					if(isset($_GET["id"]))
					{
						$id=$_GET["id"];
						
						$result = mysqli_query($connect, "SELECT * from payment where ID='$id' ");
						$row = mysqli_fetch_assoc($result);
					}
					$stid= $row["StudId"];
					$student = mysqli_query($connect, "SELECT * from studregister where User_id='$stid'");
					$stud = mysqli_fetch_array($student);
				?>
                <form action="#" method="post" id="pro">
				<div class="pro">
                  <div class="row">
					<div class="col-md-12 form-group">
						<img src= "img/Payment/su.jpg">
                    </div>
                    <div class="col-md-12 form-group">
                      <label ><span class="detailsbold">Student Name:</span><?php echo $stud["Studname"]; ?></label><hr>
                    </div>
	
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Payment ID:<?php echo $row['ID']; ?></span></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Total Payment:RM <?php echo $row['Price']; ?></span></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Card Holder Name:<?php echo $row['HolderName']; ?></span></label>
                    </div>
					<div class="col-md-12 form-group">
                      <label><span class="detailsbold">Payment Date:<?php echo $row['PaymentDate']; ?></span></label>
                    </div>
					
					
                    </div>	
                    <div class="col-md-12 form-group">
					  <a class="btn btn-primary" href="index.php" input type="submit" name="exit">Back To Main Page</a>				  
                    </div>
					<div class="col-md-12 form-group">
					  <a class="btn btn-primary" input type="button" target="_blank" href="tcpdf/stud_receipt.php?id=<?php echo $row['ID']; ?>" >Print Receipt</a>  
                    </div>
                  </div>
   
                </form>
              </div>
			 
        </div>
      
    </section>
	</div>
	</div>
	</div>
	</div>
	</div>
   </section>
   
<script>  
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
	<?php 
    
    include("includes/footer.php");
    
    ?>

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