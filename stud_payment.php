<?php include("connect.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Payment</title>
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
		<link rel="stylesheet" href="css/cart.css">

	<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" style="font-size:24px"></i></button>
	
<style>
/* The container gender*/
.gender {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.gender input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.gendercheck {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.gender:hover input ~ .gendercheck {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.gender input:checked ~ .gendercheck {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.gendercheck:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.gender input:checked ~ .gendercheck:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.gender .gendercheck:after {
 	top: 5px;
	left: 5px;
	width: 10px;
	height: 10px;
	border-radius: 50%;
	background: white;
}




/* The container TnC*/
.TnC {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 17px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.TnC input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.TnCcheck {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.TnC:hover input ~ .TnCcheck {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.TnC input:checked ~ .TnCcheck {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.TnCcheck:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.TnC input:checked ~ .TnCcheck:after {
  display: block;
}

/* Style the checkmark/indicator */
.TnC .TnCcheck:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


/*Main Container*/
#main-containers{
	margin:auto;
	width:80%;
	border: 1px solod white;
	background-color:white;
	border-radius:10px;
}
#main-containers .row
{
	width:90%;
	margin:auto;
	margin-top:20px;
}
button[type=submit]
{
	width:90%;
	margin:auto;
}
 .box5{
		background: #ffffff;
		margin-top: 1cm ;
		margin-bottom:1cm;
		margin-left:4cm;
		border: solid 1px #e6e6e6;
		box-sizing: border-box;
		padding: 20px;
		box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);
		width:1000px;
		border-radius:10px;
	  }	
</style>

</head>
<script>
	function cardtype()
	{
		var str = document.getElementById('cardnumber').value;
		var res = str.substring(0, 1);
		var res2 = str.substring(0,2);
											 
		if(res==4)
		{
			document.getElementById('cardtype').innerHTML = "VISA";
			document.getElementById('cType').value = "VISA";
		}
		else if(res2 == 51 || res2 == 52 || res2 == 53 || res2 == 54 || res2 == 55 || res2 == 50)
		{
			document.getElementById('cardtype').innerHTML = "MASTERCARD";
			document.getElementById('cType').value = "MASTERCARD";
		}
		else
		{
		document.getElementById('cardtype').innerHTML = "Please use a valid card";
		document.getElementById('cType').value = "Please use a valid card";
		}
	}
</script>
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
				if(isset($_GET["id"]))
				{
					$vid = $_GET["id"];
					$vou = mysqli_query ($connect, "SELECT * FROM voucher where Id='$vid'");
					$coupon = mysqli_fetch_array($vou);
					$cid = $coupon["CoupId"];
					$coup = mysqli_query($connect, "SELECT * from coupon where coupon_id='$cid'");
					$c = mysqli_fetch_array($coup);
					$voucher = $c["coupon_code"];
					$per = $c["coupon_discount"];
					$cused = $c["coupon_used"]+1;
				}
				
				?>
    <section class="ftco-section testimony-section" style="background-image: url('images/login.jpg');">
	<?php
		$result=mysqli_query($connect,"SELECT * from book where StudId='$sid' and Status='Proceed'  and HosIsDelete='0' ");
		$row = mysqli_fetch_assoc($result);
		$hid = $row["HosId"];
		$room = $row["TotRoom"];
		$res = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
		$hos = mysqli_fetch_array($res);
		$owner = $hos["Own_id"];
		$ownner =mysqli_query($connect, "SELECT * from owner where owner_id = '$owner'");
		$own = mysqli_fetch_array($ownner);
		if(mysqli_num_rows($result)!='0')
		{
				?>
				<div class="box5"><!-- box Begin -->
						<h5>Hostel</h5>
						  <div class="row">
										<div class="col-xl-12">
											<div class="form-label-group">
												<?php echo "<img src='img/Hostel/".$hos['Image1']."' width='200px' height='200px'>" ?>
											</div>
										</div>
										<div class="col-xl-12">
											<div class="form-label-group">
											Hostel Name:
												<?php echo $hos['HosName'] ?>
											</div>
										</div>
										<div class="col-xl-12">
											<div class="form-label-group">
											<p >Hostel Owner Name:
												<?php echo $own['owner_name'] ?></p>
											</div>
										</div>
								</div>
								
					</div>
					<?php
					$pricee = $hos["HosPrice"] * $room;
					$dis = $pricee*$per;
					$tot = $pricee-$dis;
					if($vid !='0')
					{
					?>
						<div class="box5"><!-- box Begin -->
							<h5>Voucher</h5>
							  <div class="row">
											<div class="col-xl-12">
												<div class="form-label-group">
												<p>Voucher Type:
													<?php echo $voucher ?></p>
												</div>
											</div>
											<div class="col-xl-12">
												<div class="form-label-group">
												<p >Total Price :
													<?php echo $pricee ?></p>
												</div>
											</div>
											<div class="col-xl-12">
												<div class="form-label-group">
												<p >Discount :
													<?php echo $per*100 ?>%</p>
												</div>
											</div>
											<div class="col-xl-12">
												<div class="form-label-group">
												<p >Price after discount :
													<?php echo $tot ?></p>
												</div>
											</div>
									</div>
									
					  </div>
					<?php
					}
					else
					{
					}
					
					$newstart=date_format("Y-m");
					?>
			<div id="main-containers">
					
					<h3 class="card-title text-center">Your Total Payment is RM <?php echo $tot; ?> </h3>
							<form class="form-signin" method="post" name="pay" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-wrap">
												<label>Move In Date</label>
														<input type="date" class="form-control" 
														name="txtTo" placeholder="Move In Date(dd/mm/yyyy)" 
														min="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); //min date mean you just can select date start from tomorrow
														$date2 = date('Y-m-d');
														$mod_date2 = strtotime($date2."+ 2 days");
														echo date("Y-m-d",$mod_date2);?>"  
														max="<?php echo date("Y-m-d",strtotime("+7months"));?>" required><!--set you maximum can select date in half year -->
											</div>
											<span class="error-text" id="error-date"></span>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<div class="input-wrap">
												<label>Duration </label>
											<input name="dur" class="form-control appointment_date" placeholder="1 Year Contract" value="1 year"disabled>
										</div>
										</div>
									</div>
								</div>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-label-group">
													<h3 style="font-weight:bold;"> Visa / Master Card <img src="img/Payment/visa.png" width="50px"><img src="img/Payment/master.png" width="50px"></h3> 
												</div>
											</div>
											
										</div>
											<div class="row">
												
													<div class="col-xl-12">
														<div class="form-label-group">
															<label for="name">Student Name</label>
															<input type="text" id="sname" name="sname" class="form-control" value="<?php echo $userData["Studname"];?>" required>
														</div>
													</div>
												
												<div class="col-xl-12">
													<div class="form-label-group">
														<label for="bank" style="font-size:20px;">Bank</label>
														<select id="bank" name="bank" class="form-control">
														<option value="bank">Select Bank</option>
														<option value="Maybank">  Maybank</option>
														<option value="CIMB Bank">CIMB Bank</option>
														<option value="Public Bank Berhad">Public Bank Berhad</option>
														<option value="RHB Bank">RHB Bank</option>
														<option value="Hong Leong Bank">Hong Leong Bank</option>
														<option value="AmBank Group">AmBank Group</option>
														<option value="United Overseas Bank (Malaysia)">United Overseas Bank (Malaysia)</option>
														<option value="Bank Rakyat">Bank Rakyat</option>
														<option value="OCBC Bank (Malaysia Berhad)">OCBC Bank (Malaysia Berhad)</option>
														<option value="HSBC Bank Malaysia Berhad">HSBC Bank Malaysia Berhad</option>
														</select>
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-xl-12">
													<div class="form-label-group">
														<label for="name">Card Holder's Name</label>
														<input type="text" id="name" name="name" class="form-control"  pattern="^[A-Za-zÀ-ÿ ,.'-]+$" placeholder="Card Holder's Name" required>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-xl-6">
													<div class="form-label-group">
														<label for="number">Card Number</label>
														<input type="text" placeholder="1234 1234 1234 1234"required class="form-control" name="number" id="cardnumber" onkeyup="cardtype()" maxlength="19" minlength="16" onkeypress="inputnumber(event)" onkeydown="this.value=this.value.replace(/(\d{4})(?=\d)/,'$1 ') ">
														<span style="color:red; font-style:italic;" id="enumber"></span>									
												</div>
												</div>
												<div class="col-xl-6">
													<div class="form-label-group">
														<label for="number">Card Type</label>
														<div style="position: relative; border:1px solid silver; height:50px;padding-top:5px;padding-left:10px;border-radius:3px">
															<span id="cardtype" ></span>
														</div>
														 <input type="hidden" name="card_type"  onkeyup="validcard()" id="cType" />
													  <span id="cctype" style="color:red;font-style:italic;"></span>
												  </div>	
													</div>
												</div>
											
											<div class="row">
												<div class="col-xl-12">
													<div class="form-label-group">
														<label for="cvv">CVV</label>
														<input type="cvv" id="cvv" name="cvv" class="form-control"  maxlength="3" pattern="[0-9]{3}" placeholder="123">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-xl-12">
													<div class="form-label-group">
														<label for="exp">Expired Month/ Year</label>
														<input type="month" name="exp" min="<?php echo  date('Y-m');  ?>" max="2099-12"  value="<?php echo date('Y-m');?>" class="form-control" required>

													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-xl-12">
													<div class="form-label-group">
													<?php 
														$name=$_POST["sname"];
														$date=date("Y-m-d");
														
													?>
													<button class="login100-form-btn" name="submitbtn" style="margin-bottom:1%" >Payment</button>

													</div>
												</div>
												
											</div>
											
								</form>
   <?php
		}
		else
		{
			?>
				<h3 class="card-title text-center">You haven't select any hostel to pay </h3>
			<?php
		}
	if(isset($_POST["submitbtn"]))
	{
		$result = mysqli_query($connect, "SELECT * from book where StudId='$sid' and Status='Proceed'  and HosIsDelete='0' ");
		$row = mysqli_fetch_array($result);
		
		$id  = $row["Id"];
		$hid = $row["HosId"];
		$nroom = $row["TotRoom"];
		$price = $tot;
		$sname= $_POST["sname"];
		$bank = $_POST["bank"];
		$name = $_POST["name"];
		$num  = $_POST["number"];
		$cvv  = $_POST["cvv"];
		$year = date('Y', strtotime($_POST["exp"]));
		$month = date('m', strtotime($_POST["exp"]));
		$exp  = $_POST["exp"];
		$date=date("Y-m-d");
		$md = $_POST["txtTo"];
		$ctype = $_POST["card_type"];
		
		$result2 = mysqli_query($connect, "SELECT * from hostel where ID = '$hid'");
		$row2 = mysqli_fetch_array($result2);
		$room = $row2["TotRoom"];
		$sta = paid;
		
		$leftroom = $room - $nroom;
		
		$stud = mysqli_query($connect, "SELECT * from studregister where User_id='$sid'");
		$stud1=mysqli_fetch_array($stud);
		$email=$stud1["Studemail"];
		
		if($ctype=='Please use a valid card')
		{
			?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
					swal({title: "Please use a valid card!",
							 button: "Retry"});
				</script>
			<?php
		}
		else
		{
			$res=mysqli_query($connect, "INSERT INTO payment (HosId, BookId, StudId, OwnId, VouId, Bank, HolderName, CardNumber,CardType, CVV, ExpireDate, PaymentDate, Price, MoveIn, Duration) 
							VALUES ('$hid', '$id', '$sid', '$owner', '$vid','$bank', '$name', '$num','$ctype', '$cvv', '$exp', '$date', '$price', '$md', '1 year');");
			$test = mysqli_fetch_array($res);
			$up = mysqli_query($connect ,"UPDATE hostel set TotRoom = '$leftroom' where ID = '$hid'");	
			$upd = mysqli_query($connect ,"UPDATE appointment set AppoinDone = '1' where BookId = '$id'");	
			$update = mysqli_query($connect , "UPDATE book set Status = '$sta' , HosIsDelete='1' where Id = '$id'");
			$upda= mysqli_query($connect, "UPDATE voucher set VouIsUse = '1' where Id = '$vid'");
			$upda2= mysqli_query($connect, "UPDATE coupon set coupon_used='$cused' where coupon_id ='$cid'");
			
			$host = mysqli_query($connect, "SELECT * from hostel where ID ='$hid'");
			$host1 = mysqli_fetch_array($host);
			$hname = $host1["HosName"];
			
			if($res)
			{
				$result1 = mysqli_query($connect, "SELECT * FROM payment where StudId='$sid' and PaymentDate='$date' and BookId= '$id' ");
				$row1 = mysqli_fetch_assoc ($result1);
				$pid = $row1['ID'];
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript">
				swal({
					  title: "Payment Successful!",
					  text: "Thank You for your payment",
					  icon: "success",
					  button: "View Receipt"}).then(function(){window.open('stud_resit.php?id=<?php echo $pid ?>','_self');});
											
				</script>

				<?php 
	 
					$subject = "Payment Details";
					$message = "Hi ".$name."\nThank You for choosing us. \n\nHere is you payment details:\nHostel Name : ".$hname."\nPayment Date: ".$date."\nMove In Date: ".$md."\n\nLogin to our website to view more details.";
					$from = "From: JTYHostel <jtyhostel@gmail.com>";
						
						mail($email,$subject,$message,$from);	
					?>
					
				<?php
													
			}
			if($leftroom ==0)
			{
				$stas = cancel;
				$bok = mysqli_query($connect, "SELECT * from book where HosId='$hid' and Status !='paid' and Status !='cancel'");
				while($bok1 = mysqli_fetch_array($bok))
				{
					$bid = $bok1["Id"];
					$sid = $bok1["StudId"];
					$hidd = $bok1["HosId"];
					
					$stud = mysqli_query($connect, "SELECT * from studregister where User_id='$sid'");
					$stud1 = mysqli_fetch_array($stud);
					
					$nm = $stud1["Studname"];
					$em = $stud1["Studemail"];
					
					$bk = mysqli_query($connect, "UPDATE book set Status = '$stas' where Id='$bid'");
					
					$subject = "Sorry";
					$message = "Hi ".$nm."\nSorry to tell you that the hostel that you book (".$hname.") has been totally rent out.\nYou may choose other hostel.\n\nSorry for bringing inconvenient.";
					$from = "From: JTYHostel <jtyhostel@gmail.com>";
							
						mail($em,$subject,$message,$from);	
				}
			}
		}		
	}
	?>
	
		
</div>
   </section>
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