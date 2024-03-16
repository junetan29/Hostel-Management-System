<?php

if(isset($_POST["submitbtn"]))
{
	function CheckCaptcha($userResponse) 
	{
		$fields_string = '';
		$fields = array(
			'secret' => "6LfAL84ZAAAAAF1AyaL7bcVx32eyLzWV1_18YMiK",
			'response' => $userResponse
		);
		foreach($fields as $key=>$value)
		$fields_string .= $key . '=' . $value . '&';
		$fields_string = rtrim($fields_string, '&');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

		$res = curl_exec($ch);
		curl_close($ch);

		return json_decode($res, true);
	}
	$res =CheckCaptcha($_POST['g-recaptcha-response']);
	if ($res['success'])
	{
		
		//codes here if success
		$name  = $_POST["studname"];
		
		$sex   = $_POST["gender"];
		$phnum = $_POST["studphnum"];
		$course= $_POST["studcourse"];
		$curadd= $_POST["studcurrentaddress"];
		$state = $_POST["state"];
		$code  = $_POST["postcode"];
		$email = $_POST["studemail"];
		$pass1 = $_POST["newpass"];
		$pass2 = $_POST["conf"];
		$na = $_POST["nation"];
		
		
		if($na=="Malaysian")
		{
			 if (empty($_POST["studic"])) 
			 {
			 }
			 else 
			{
					$ic = $_POST["studic"];
					$ps ="";
			}
		}
		else if($na=="Non-Malaysian")
		{
			 if (empty($_POST["pp"])) 
			 {
			 }
			 else 
			{
					$ps = $_POST["pp"];
					$ic ="";
			}
		}
		
		//image
		$profile = $_FILES['profile']['name'];
		$Offerletter = $_FILES['Offerletter']['name'];
		
		$target1 = "img/Student/".basename($profile);
		$target2 = "img/Student/".basename($Offerletter);
		
		
		$result=mysqli_query($connect, "SELECT * from studregister where Studemail='$email'");
		$resu   =mysqli_query($connect, "SELECT * from studregister where StudPassport = '$ps'");
		$res   =mysqli_query($connect, "SELECT * from studregister where Studic = '$ic'");
		if($na =='Malaysian')
		{
			if(mysqli_num_rows($result)!=0)
			{
				?>
					
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
				<script type="text/javascript">
					swal({
					title: "Your Email Is Already Exist !",
					text:"Please Try Again!",
					icon:"error"
					});
				</script>
					
				<?php
			}
			else if (mysqli_num_rows($res)!=0)
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
				<script type="text/javascript">
					swal({
					title: "Your Ic Is Already Exist !",
					text:"Please check!",
					icon:"error"
					});
				</script>
					
				<?php
			}
		
			else
			{
				if($pass1 !=$pass2)
				{
					?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
					<script type="text/javascript">
						swal({
						title: "Password Does Not Match	!",
						text:"Please Try Again!",
						icon:"error"
						});
					</script>
					<?php
							
				}
				else
				{
					
						$result=mysqli_query($connect,"INSERT INTO studregister (Studname, Nation, Studic, StudPassport, Gender, Studphnum, CousId, StudOfferLetter, StudProfile, Studaddress, StaId, Postcode, Studemail, Password) 
												values ('$name', '$na', '$ic', '$ps','$sex', '$phnum', '$course', '$Offerletter','$profile', '$curadd', '$state', '$code', '$email', '$pass1');");
						
						move_uploaded_file($_FILES['profile']['tmp_name'], $target1); 
						move_uploaded_file($_FILES['Offerletter']['tmp_name'], $target2);
						
						?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Successful !",
							  text : "You Will Be Lead To Security Question!",
							  icon: "success",
							  button: "Proceed"}).then(function(){window.open('stud_ansque.php?id=<?php echo $email ?>','_self');});
						</script>
						<?php
					
				}				

			}
		}
		else
		{
			if(mysqli_num_rows($result)!=0)
			{
				?>
					
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
				<script type="text/javascript">
					swal({
					title: "Your Email Is Already Exist !",
					text:"Please Try Again!",
					icon:"error"
					});
				</script>
					
				<?php
			}
			else if (mysqli_num_rows($resu)!=0)
			{
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
				<script type="text/javascript">
					swal({
					title: "Your Passport Is Already Exist !",
					text:"Please check!",
					icon:"error"
					});
				</script>
					
				<?php
			}
		
			else
			{
				if($pass1 !=$pass2)
				{
					?>
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
					<script type="text/javascript">
						swal({
						title: "Password Does Not Match	!",
						text:"Please Try Again!",
						icon:"error"
						});
					</script>
					<?php
							
				}
				else
				{
					
						$result=mysqli_query($connect,"INSERT INTO studregister (Studname, Nation, Studic, StudPassport, Gender, Studphnum, CousId, StudOfferLetter, StudProfile, Studaddress, StaId, Postcode, Studemail, Password) 
												values ('$name', '$na', '$ic', '$ps','$sex', '$phnum', '$course', '$Offerletter','$profile', '$curadd', '$state', '$code', '$email', '$pass1');");
						
						move_uploaded_file($_FILES['profile']['tmp_name'], $target1); 
						move_uploaded_file($_FILES['Offerletter']['tmp_name'], $target2);
						
						?>
						<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
						<script type="text/javascript">
						swal({title: "Successful !",
							  text : "You Will Be Lead To Security Question!",
							  icon: "success",
							  button: "Proceed"}).then(function(){window.open('stud_ansque.php?id=<?php echo $email ?>','_self');});
						</script>
						<?php
					
				}				

			}
		}
	}
		else
		{
			//codes here if fail
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
			<script type="text/javascript">
				swal({
				title: "Please Try Again !",
				text:"Please Complete The Captcha!",
				icon:"error"
				});
			</script>
				
			<?php
		}
		
	
	
}
?>