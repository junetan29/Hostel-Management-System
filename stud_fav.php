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
	<div id="main-containers">
	<div class="col-md-12"><!-- col-md-9 Begin -->
    <h1 style="text-align:center;"><p>My Favourite's Hostel<i class="fa fa-heart"></i></p></h1> 
        <form name="hos" method="post" action="">    
        <div class="row">
		<?php
			if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					$name = $userData["Studname"];
					$id = $userData["User_id"];
				}
				$host = mysqli_query($connect, "SELECT * from hostel where TotRoom !=0 and HostelIsDelete='0'");
				while($host1 = mysqli_fetch_array($host))
				{
					$hidd = $host1["ID"];
					$fav = mysqli_query($connect, "SELECT * from favourite where HosId='$hidd' and HosIsDelete='0' and StudId = '$id'; ");
					while ($row1 = mysqli_fetch_array($fav))
					{
						$fid = $row1["Id"];
						$hid = $row1["HosId"];
						$result = mysqli_query($connect, "SELECT  * from hostel where ID = '$hid' ");
						$row= mysqli_fetch_array($result);
						$own = $row["Own_id"];
						$ownn = mysqli_query($connect, "SELECT * from owner where owner_id = '$own'");
						$ownn1 = mysqli_fetch_array($ownn);
					?>
					
					<div class="col-lg-4 col-sm-6 mb-4">
							  <div class="card h-100">
							  <?php echo "<img src='img/Hostel/".$row['Image1']."' width='100%' height='300px'>" ?>
								<div class="card-body">
								  <h4 class="card-title">
									<a href="details.php?id=<?php echo $row['ID'] ?>"> <?php echo $row["HosName"]; ?> </a>
									<br><h5><?php  echo  $cate['Category']; ?>
									<br><h5><?php echo $row["HosName"]; ?> </h5>
									<br><h5><p><?php echo $ownn1["owner_name"]; ?></h5>
									<h5>RM <?php  echo  $row['HosPrice']; ?></h5><br>
											</h5><br><br><br><br><br>
								  </h4>
								  
								</div>
								<a style="margin:5px;" class="btn btn-primary btn-sl px-1 py-2" href="details.php?id=<?php echo $hid?>">View Details</a>
								<a style="margin:5px;" href="stud_fav.php?id=<?php echo $fid; ?>"  class="btn btn-danger btn-sl px-1 py-2" name="delete" onclick="return confirmation()"><i class= "glyphicon glyphicon-trash"></i> Remove Hostel</a>
							  </div>
							</div>
							
											<script>
											  function confirmation()
											  {
												  var answer;
												  answer=confirm("Do you want to delete?");
												  return answer;
											  } 
											 </script>
											  <?php
												if(isset($_GET["id"]))			
												{
													$Id=$_GET["id"];
													mysqli_query($connect,"UPDATE favourite SET HosIsDelete=1 where Id='$Id'");
											  ?>
													<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
													<script type="text/javascript">
													swal({title: "Successful Delete!",
														  icon: "success",
														  button: "Review"}).then(function(){window.location.href = "stud_fav.php";});
													</script>
											  <?php

												}
									
												?>	
										
									
						<?php
					}
				}
			?>
			</div>
			</form>
		</div>
		
    </div><!-- col-md-9 Finish -->
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
<?php include("connect.php");
	if(!isset($_SESSION['student']))
	{
        
        echo "<script>window.open('stud_login.php','_self')</script>";
        
    }
	else
	{}
?>