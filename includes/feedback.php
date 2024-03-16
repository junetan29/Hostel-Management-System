<?php
	if(isset($_SESSION["student"]))
	{
		$userData = $_SESSION["student"];
		$name = $userData["Studname"];
		$cn = $userData["Studphnum"];
	}
?>
<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(images/consult.png);">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex justify-content-end">
    			<div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
    				<h2 class="mb-4">Feedback</h2>
    				<form action="#" method="post" class="contact">
    					<div class="row">
    						
						
								<div class="col-md-6">
									<div class="form-group">
			              <input type="text" class="form-control" placeholder="Your Name" name="name" value="<?php echo $name ?>">
			            </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			              <input type="text" class="form-control" placeholder="Contact Number" name="cn" value ="<?php echo $cn ?>">
			            </div>
								</div>
								
								
								<div class="col-md-12">
									<div class="form-group">
			              <textarea name="mss" cols="30" rows="7" class="form-control" placeholder="Message" ></textarea>
			            </div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" name="smbtn" value="Send message" class="btn btn-primary py-3 px-4">
			            </div>
								</div>
    					</div>
	          </form>
			  <?php include("feed.php"); ?>
    			</div>
    		</div>
    	</div>
    </section>