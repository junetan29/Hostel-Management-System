<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element')
	}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	
<?php include("connect.php") ?>

		<div class="wrap">
		
			<div class="container">
				<div class="row">
					<div class="col-md-4 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
						<?php 
							$result= mysqli_query($connect, "SELECT * from admin where Admin_id = 1");
							$row = mysqli_fetch_assoc ($result);
						?>
							<a href="tel:+601151036496" class="mr-2"><span class="fa fa-phone mr-1"></span> <?php echo $row["Contact"];  ?></a> 
							<a href="mailto:1181201016@student.mmu.edu.my"><span class="fa fa-paper-plane mr-1"></span><?php echo $row["Email"]; ?></a>
						</p>
						
					</div>
					<?php
								 if(isset($_SESSION['student']) && !empty($_SESSION['student']))
								{
									$userData = $_SESSION['student'];
									?>
						<div class="col-md-5 d-flex align-items-center">
									<marquee behavior="scroll" direction="left" scrollamount="5">
									<?php 
									
									$coupon= mysqli_query($connect,"SELECT * from coupon"); 
									while($coup1=mysqli_fetch_array($coupon))
									{
									?>
										<a style="color:white; margin-top:10px;">Use Code:'<?php echo $coup1["coupon_code"]?>' to get discount for <?php echo $coup1["coupon_title"]?>.&nbsp; &nbsp; &nbsp; </a>
									<?php
									}
									?>
									</marquee>
									<?php
								}
								else
								{}
								?>
						</div>		
						
					<div class="col-md-3 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			 <form class="form-inline" method="post" action="stud_search.php">
								<?php
								 if(isset($_SESSION['student']) && !empty($_SESSION['student']))
								{
									$userData = $_SESSION['student'];
									?>
								<input type="text" name="find" placeholder="Search for hostel" id="search" style="height:1cm; width:150px; margin-top:10px;">
								<button type="submit" name="search" id="searchbtn" style="margin-top:10px; width:28px;"><i class="fa fa-search"></i></button>
								<?php
								}
								else
								{}
								?>
							</form>
							
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>

		
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-warning ftco-navbar-light" id="ftco-navbar" style="position:sticky; top:0;">
		
	   <div class="container">
	    	<a class="navbar-brand" href="index.php"><img src="https://img.icons8.com/plasticine/50/000000/home.png"/>JTY Hostel</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			
	        	<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item" id="dropdown"><a href="#" class="nav-link">About <span class="fa fa-caret-down"></span>	
								<div class="dropdown-content">
									<a href="aboutus.php#aboutus">About Us </a>
									<a href="aboutus.php#aboutcom">About Company</a>
									<a href="aboutus.php#qna">Frequently Ask Question</a>
								</div>
			  </li>
			  
	          <li class="nav-item"><a href="index.php#gallery" class="nav-link">Gallery</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <?php 
			  if(isset($_SESSION['student']) && !empty($_SESSION['student']))
				{
					$userData = $_SESSION['student'];
					?><li class="nav-item" id="dropdown"><a href="stud_product.php" class="nav-link">Hostel Category <span class="fa fa-caret-down"></span>	
							<div class="dropdown-content">
								<?php
									$result = mysqli_query($connect, "SELECT * FROM category");
									while ($row = mysqli_fetch_array($result))
									{
								?>
										<a href="hostel.php?id=<?php echo $row['ID'] ?>""><?php echo $row["Category"]; ?></a>
							
								<?php
									}
								?>
							</div>
					  </li>
					<?php
					?>
					<li class="nav-item" id="dropdown"><a href="javascript:;" class="nav-link"><i class ="fa fa-cart"></i> Order <span class="fa fa-caret-down"></span>	
								<div class="dropdown-content">
									<a href="stud_fav.php">Favourite</a>
									<a href="stud_cart.php">Cart</a>
									<a href="stud_viewhos.php">Appoinment For View Hostel </a>
									<a href="stud_appoin.php">My Appoinment </a>
									<a href="stud_order.php">Booking</a>
									<a href="stud_payment.php">Payment</a>
									<a href="stud_orderdetail.php">My Purchase</a>
									
								</div>
					</li><?php
					?>
					<li class="nav-item" id="dropdown"><a href="javascript:;" class="nav-link"><?php echo $userData["Studname"]; ?> <span class="fa fa-caret-down"></span>	
								<div class="dropdown-content">
									<a href="stud_secure.php">Account Setting</a>
									<a href="javascript:;" onClick="javascript:logout();">Logout</a>
									
								</div>
					</li><?php
				}
				else{
					
					?>
					  <li class="nav-item" id="dropdown"><a href="#" class="nav-link">Sign Up <span class="fa fa-caret-down"></span>	
								<div class="dropdown-content">
									<a href="stud_register.php">As Student</a>
									<a href="owner/owner_register.php">As Owner</a>
								</div>
					  </li>
					 <li class="nav-item" id="dropdown"><a href="#" class="nav-link">Log In <span class="fa fa-caret-down"></span>	
								<div class="dropdown-content">
									<a href="stud_login.php">As Student</a>
									<a href="owner/owner_login.php">As Owner</a>
								</div>
					  </li>
					<?php 
				}
				?>
	        </ul>
	      </div>
	    </div>
		  	<div id="google_translate_element">
				<div class="skiptranslate goog-te-gadget" dir="ltr">
					<div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;">
					<span style="vertical-align: middle; margin:left"></span>
					</div>
				</div>
			</div>
		
	  </nav>
	  <script>
	  function logout(){
		document.location = "logout.php";
	}
		
	</script>