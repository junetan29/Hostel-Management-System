<footer class="footer">
			<div class="container">
				<div class="row">
				<?php 
				$result = mysqli_query($connect, "SELECT * FROM about where Id='2'");
				$row = mysqli_fetch_array($result);
				?>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">JTY Hostel</h2>
						<p><?php echo $row["Answer"]; ?></p>
						
					</div>
					
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="index.php" class="py-2 d-block">Home</a></li>
              <li><a href="aboutus.php" class="py-2 d-block">About</a></li>
              <li><a href="index.php#gallery" class="py-2 d-block">Gallery</a></li>
              <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
			  <?php
			  $result = mysqli_query($connect, "SELECT * FROM admin where Admin_id='1'");
			  $row = mysqli_fetch_array($result);
			  ?>
                <li><span class="icon fa fa-map"></span><span class="text">Multimedia University Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text"><?php echo $row["Contact"]; ?></span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text"> <?php echo $row["Email"]; ?></span></a></li>
              </ul>
            </div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-12 text-center">

            <p class="copyright">
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>

          </div>
        </div>
			</div>
		</footer>