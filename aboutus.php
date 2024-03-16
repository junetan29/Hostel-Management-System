<?php include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
	<link href="css/agency.min.css" rel="stylesheet">

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

<?php
$result=mysqli_query($connect,"SELECT* from about where Id=1");
 $row=mysqli_fetch_assoc($result)
?>

 <section class="ftco-section testimony-section" style="background-image: url('images/mmu.jpg');" id="aboutus">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2><?php echo $row["Question"]; ?></h2>
			<h4 style="color:white;"><br> <?php echo $row["Answer"]; ?></h4>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              
			  <?php
			  $result = mysqli_query ($connect, "SELECT * from admin where Admin_id=1");
			  $row  =mysqli_fetch_assoc ($result);
			  ?>
			    <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-address-card-o"></span></div>
                  <div class="text">
                    <p class="mb-4">Group Leader</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(img/Admin/<?php echo $row["Pic"]?>)"></div>
                    	<div class="pl-3">
		                    <p class="name"><?php echo $row["Name"]; ?></p>
		                    <span class="position">Email <br><small><?php echo $row["Email"]; ?></small></span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
			
				<?php
			  $result = mysqli_query ($connect, "SELECT * from admin where Admin_id=3");
			  $row  =mysqli_fetch_assoc ($result);
			  ?>
			
			  <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-address-card-o"></span></div>
                  <div class="text">
                    <p class="mb-4">Group Member 2</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(img/Admin/<?php echo $row["Pic"]?>)"></div>
                    	<div class="pl-3">
		                    <p class="name"><?php echo $row["Name"]; ?></p>
		                    <span class="position">Email <br><small><?php echo $row["Email"]; ?></small></span>
		                  </div>
	                  </div>
                  </div>
                </div>
              </div>
              
			  <?php
			  $result = mysqli_query ($connect, "SELECT * from admin where Admin_id=2");
			  $row  =mysqli_fetch_assoc ($result);
			  ?>
			  
			  <div class="item">
                <div class="testimony-wrap py-4">
                	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-address-card-o"></span></div>
                  <div class="text">
                    <p class="mb-4">Group Member1</p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(img/Admin/<?php echo $row["Pic"]?>)"></div>
                    	<div class="pl-3">
		                    <p class="name"><?php echo $row["Name"]; ?></p>
		                    <span class="position">Email <br><small><?php echo $row["Email"]; ?></small></span>
		                  </div>
	                  </div>
                  </div>
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

<?php
    $result=mysqli_query($connect,"SELECT* from about where Id=2");
	$row=mysqli_fetch_assoc($result)
?>
<section class="ftco-section testimony-section" style="background-image: url('images/mmu.jpg');" id="aboutcom">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2><?php echo $row["Question"]; ?></h2>
			<h4 style="color:white;"><br><?php echo $row["Answer"]; ?></h4>
          </div>
        </div>
        
            </div>    
    </section>

		
		 <section class="ftco-section bg-light ftco-faqs" id="qna">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 order-md-last">
    				
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/qna.jpg);">
    					
    				
    				</div>
    			</div>
<?php
$result=mysqli_query ($connect,"SELECT * from about where Id=4");
$row= mysqli_fetch_assoc ($result);
?>
    			<div class="col-lg-6">
    				<div class="heading-section mb-5 mt-5 mt-lg-0">
	            <h2 class="mb-3"><?php echo $row["Question"]; ?></h2>
	            <p><p>
    				</div>
    				<div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
						  <?php 
						  $result= mysqli_query($connect, "SELECT * from about where Id in ('5' ,'6', '7' ,'8')");
						  while($row=mysqli_fetch_assoc($result))
						  {
						  ?>
						  
						  <div class="card">
						    <div class="card-header p-0" id="1">
						      <h2 class="mb-0">
						        <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
						        	<p class="mb-0"><?php echo $row["Question"]; ?></p>
						          <i class="fa" aria-hidden="true"></i>
						        </button>
						      </h2>
						    </div>
						    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
						      <div class="card-body py-3 px-0" style="text-align:center;">
						      	<p><?php echo $row["Answer"]; ?> </p>
						       
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

   <?php 
					 if(isset($_SESSION['student']) && !empty($_SESSION['student']))
						{
							$userData = $_SESSION['student'];
							include ("includes/feedback.php");
						}
						else
						{}
			  ?>
		
  <?php 
					
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