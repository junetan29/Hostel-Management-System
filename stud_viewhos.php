<?php include ("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Make Appointment</title>
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
			<?php
				if(isset($_SESSION["student"]))
				{
					$userData = $_SESSION["student"];
					$name = $userData["Studname"];
					$sid = $userData["User_id"];
					
				}
				?>
	<div class="col-md-12"><!-- col-md-9 Begin -->
    <h1 style="text-align:center;"><p><i class="fa fa-meetup"></i>Make Appointment</p></h1> 
        <form name="hos" method="post" action="">    
        <div class="row">
		<?php
		$host = mysqli_query($connect, "SELECT * from hostel where TotRoom !=0 and HostelIsDelete='0'");
		while($host1=mysqli_fetch_array($host))
		{
			$hidd = $host1["ID"];
			$view = mysqli_query($connect, "SELECT * from book where HosId='$hidd' and StudId= '$sid' and Status='v'  and HosIsDelete='0'");
		
			while ($row1 = mysqli_fetch_array($view))
			{
				$hid = $row1["HosId"];
				$res = mysqli_query($connect, "SELECT * from hostel where ID='$hid'");
				$row = mysqli_fetch_array($res);
				$hosname = $row["HosName"];
				$owner = $row["Own_id"];
				$ownner =mysqli_query($connect, "SELECT * from owner where owner_id = '$owner'");
				$own = mysqli_fetch_array($ownner);
				$onm = $own["owner_name"];
				$oem  = $own["owner_email"];
				
			?>
			
			<div class="col-lg-4 col-sm-6 mb-4">
							  <div class="card h-100">
							  <?php echo "<img src='img/Hostel/".$row['Image1']."' width='100%' height='300px'>" ?>
								<div class="card-body">
								  <h4 class="card-title">
									<h6><input type="text" id ="vmk"name="hid" value="Hostel ID : <?php echo $row["ID"]; ?>" disabled></h6>
									<h5><input type="text" id ="vmk" name="hname" value="<?php echo $row["HosName"]; ?>" disabled> </h5>
									<h5><input type="text" id ="vmk" name="oname" value="<?php echo $own["owner_name"]; ?>" disabled></h5><br><br><br><br><br>
								  </h4>
								  
								</div>
								<a style="margin:5px;" class="btn btn-primary btn-sl px-1 py-2" href="details.php?id=<?php echo $row['ID'] ?>">View Details</a>
								<a style="margin:5px;" href="stud_viewhos.php?id=<?php echo $row1['Id']; ?>"  class="btn btn-danger btn-sl px-1 py-2" name="delete" onclick="return confirmation()"><i class= "glyphicon glyphicon-trash"></i> Remove Hostel</a>
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
											mysqli_query($connect,"UPDATE book SET HosIsDelete=1 where Id='$Id'");
									  ?>
											<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
											<script type="text/javascript">
											swal({title: "Successful Delete!",
												  icon: "success",
												  button: "Review"}).then(function(){window.location.href = "stud_viewhos.php";});
											</script>
									  <?php

										}
															
									  ?>	
								
				<?php
			}
		}
			?>
		</div>
		
		<style>
		.appoint
		{
			background-color:#F4F4F4;
		}
		.app
		{
			border:1px solid white;
		   border-radius:10px;
		   box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		   background-color:white;
		   width:1000px;
		   margin-left:250px;
		   float:left;
		   margin-bottom:2cm;
		   
	 }
	 .mk
	 {
		 font-style:italic;
		 font-weight :bold;
		 color : #4080bf
	 }
	 #vmk
	 {
		 border :1px solid white;
		 background-color :white;
	 }
		</style>
		<div class="app">	
		
    					<h2 class="mk">Make Appointment</h2>
						<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label> Name <i class="fa fa-user"></i></label>
										<input type="text" class="form-control" value="<?php echo $userData['Studname'] ?>" name="name" disabled>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			    					<div class="input-wrap">
										<label>Appointment Date <i class="fa fa-calendar"></i></label>
											<input type="date" class="form-control" 
											name="txtTo" placeholder="To Date(dd/mm/yyyy)" 
											min="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); //min date mean you just can select date start from tomorrow
											$date2 = date('Y-m-d');
											$mod_date2 = strtotime($date2."+ 2 days");
											echo date("Y-m-d",$mod_date2);?>"  
											max="<?php echo date("Y-m-d",strtotime("+7months"));?>" required><!--set you maximum can select date in half year -->
									</div>
			    				</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			    					<div class="input-wrap">
										<label> Appointment Time <i class="fa fa-clock-o"></i></label>
										<select id="time" name="time" class="form-control">
											<option value="bank">Select Time</option>
											<option value="8 am">8 am</option>
											<option value="9 am">9 am</option>
											<option value="10 am">10 am</option>
											<option value="11 am">11 am</option>
											<option value="12 pm">12 pm</option>
											<option value="1 pm">1 pm</option>
											<option value="2 pm">2 pm</option>
											<option value="3 pm">3 pm</option>
											<option value="4 pm">4 pm</option>
											<option value="5 pm">5 pm</option>
											<option value="6 pm">6 pm</option>
											<option value="7 pm">7 pm</option>
											<option value="8 pm">8 pm</option>
											</select>
									</div>
			    				</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									<label> Message <i class="fa fa-envelope-o"></i></label>
			              <textarea name="mss" cols="30" rows="7" class="form-control" placeholder="Message" ></textarea>
			            </div>
								</div>
								<div class="col-md-12">
									<div class="form-group">

			              <input type="submit" name="smbtn" value="Submit Appointment" class="btn btn-primary py-3 px-4">
			            </div>
								</div>
    					</div>
	   </form>
	   </div>
   </div><!-- col-md-9 Finish -->
	<?php

	if(isset($_POST["smbtn"]))
	{
		$result = mysqli_query($connect, "SELECT * from book where StudID='$sid' and Status='v'  and HosIsDelete='0'");
		while($row = mysqli_fetch_array($result))
		{
			
			$id        = $row["HosId"];
			$id2 	 = $row["Id"];
			$sid        = $userData["User_id"];
			$adate  = $_POST["txtTo"];
			$atime  = $_POST["time"];
			$msg    = $_POST["mss"];
			$sta  = view;
			$email = $userData["Studemail"];
			
			$ins=mysqli_query($connect, "INSERT INTO appointment (HosId, BookId, StudId, OwnId, Date, Time, Message)
																					values('$id', '$id2', '$sid', '$owner',  '$adate', '$atime', '$msg')");
			$up=mysqli_query($connect,"UPDATE book set Status =  '$sta' where Id = '$id2'");		
				if($ins)
				{
				?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({
							  title: "Successful Make Appointment!",
							  text: "Press Ok To View Appointment\n Cancel To Index Page",
							  icon: "success",
							  buttons: true,
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href = 'stud_appoin.php';
							  } else {
								window.location.href = 'index.php';
							  }
							});
						</script>
				  <?php
			
			}
		}
			$subject = "Appointment Details";
			$message = "Hi ".$name."\nYou had make an appointment on : ".$adate."   ".$atime." \n\nPlease wait for admin to approve your appointment. \n\nSorry if we bring you inconvenient.";
			$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
			mail($email,$subject,$message,$from);	
			
			$subject = "Hostel Appointment";
			$message = "Hi ".$onm."\nSome one has make an appoinment on your hostel (".$hosname.") on : ".$adate."   ".$atime.".\n\nPlease pass your key to our admin before the date. \n\nThank you!.";
			$from = "From: JTYHostel <jtyhostel@gmail.com>";
			
			mail($oem,$subject,$message,$from);
	}
	
	
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