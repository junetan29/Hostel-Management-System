<?php include ("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JTY Hostel</title>
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
    

    <section class="ftco-section bg-light ftco-no-pt ftco-intro">
    	<div class="container">
    		<div class="row">
			<?php 
			$result = mysqli_query($connect, "Select * from details ");
				while($row = mysqli_fetch_assoc ($result))
			{
			?>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services text-center">
              <div class="icon d-flex align-items-center justify-content-center">
            		<span class="fa fa-home"></span>
              </div>
              <div class="media-body">
                <h3 class="heading"><?php echo $row["Hostel"]; ?></h3>
                <p><?php echo $row["Details"]; ?></p>
              </div>
            </div>      
          </div>
          <?php
			}
			?>
		  
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-5 d-flex">
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/why.jpg); background-size:100%;">
    				</div>
    			</div>
				<?php 
				$result = mysqli_query($connect, "Select * from about where Id= 9");
				$row    = mysqli_fetch_assoc ($result);
				?>
    			<div class="col-md-7 pl-md-5 py-md-5">
    				<div class="heading-section pt-md-5">
	            <h2 class="mb-4"><?php echo $row["Question"]; ?></h2>
    				</div>
    				<div class="row">
					<?php 
					$result = mysqli_query($connect, "Select * from about where Id= 10");
					$row    = mysqli_fetch_assoc ($result);
					?>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-search"></span></div>
	    					<div class="text pl-3">
	    						<h4><?php echo $row["Question"]; ?></h4>
	    						<p><?php echo $row["Answer"]; ?></p>
	    					</div>
	    				</div>
						<?php 
						$result = mysqli_query($connect, "Select * from about where Id= 11");
						$row    = mysqli_fetch_assoc ($result);
						?>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
	    					<div class="text pl-3">
	    						<h4><?php echo $row["Question"]; ?></h4>
	    						<p><?php echo $row["Answer"]; ?></p>
	    					</div>
	    				</div>
						<?php 
						$result = mysqli_query($connect, "Select * from about where Id= 12");
						$row    = mysqli_fetch_assoc ($result);
						?>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-home"></span></div>
	    					<div class="text pl-3">
	    						<h4><?php echo $row["Question"]; ?></h4>
	    						<p><?php echo $row["Answer"]; ?></p>
	    					</div>
	    				</div>
						<?php 
						$result = mysqli_query($connect, "Select * from about where Id= 13");
						$row    = mysqli_fetch_assoc ($result);
						?>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-heart"></span></div>
	    					<div class="text pl-3">
	    						<h4><?php echo $row["Question"]; ?></h4>
	    						<p><?php echo $row["Answer"]; ?></p>
	    					</div>
	    				</div>
	    			</div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-counter" id="section-counter">
    	<div class="container">
				<div class="row">
		  <?php
		  $student = mysqli_query ($connect,"SELECT * from studregister where StudStatus = '1' and StudIsDelete='0'");
		  $owner = mysqli_query ($connect,"SELECT * from owner where OwnerStatus = '1' and OwnerIsDelete='0'");
		  $hostel = mysqli_query ($connect,"SELECT * from hostel ");
		  $host = 0;
		  $own=0;
		  $stud =0;
		  while($row = mysqli_fetch_assoc($student))
		  {
			  $stud= $stud+1;
		  }
		  while($row = mysqli_fetch_assoc($owner))
		  {
			  $own= $own+1;
		  }
		  while($row = mysqli_fetch_assoc($hostel))
		  {
			  $hos= $hos+1;
		  }
		  ?>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="<?php echo $own;?>">0</strong>
              </div>
              <div class="text">
              	<span>Owner</span>
              </div>
            </div>
          </div>
		  
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="<?php echo $stud;?>">0</strong>
              </div>
              <div class="text">
              	<span>Student</span>
              </div>
            </div>
          </div>
		 
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="<?php echo $hos;?>">0</strong>
              </div>
              <div class="text">
              	<span>Products</span>
              </div>
            </div>
          </div>
          
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section" style="background-image: url('images/student.jpg');">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Happy Clients &amp; Feedbacks</h2>
          </div>
        </div>
		
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
				<?php
					$result = mysqli_query($connect, "SELECT * FROM feedback where Status='0'");
					while($row=mysqli_fetch_array($result))
					{
				?>
              <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Name: <?php echo $row["Fbname"];?></p>
                    <div class="d-flex align-items-center">
                    	<div class="pl-3">
									Client Feedback:
		                    <p class="name"><?php echo $row["Message"]; ?></p>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
				<?php
					}
				?>
              
            </div>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section" id="gallery">
			<div class="container">
				<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Hostel Gallery</h2>
          </div>
        </div>
				<div class="row">
				<?php
				$result = mysqli_query($connect, "SELECT * from gallery");
				while($row = mysqli_fetch_assoc ($result))
				{
				?>
				  
				  
				  <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url('img/Gallery/<?php echo $row["Pic"]?>');">
            	<a href="img/Gallery/<?php echo $row["Pic"]?>" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span><?php echo $row["Hostel"]; ?></span>
	              	<h2><a href="work-single.html"><?php echo $row["Room"]; ?></a></h2>
	              </div>
              </div>
            </div>
          </div>
				<?php
				}
				?>
          		  
        </div>
			</div>
		</section>


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