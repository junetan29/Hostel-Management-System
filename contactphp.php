<?php include ("connect.php"); 

if(isset($_POST["submitbtn"]))
{
	$name    = $_POST["name"];
	$email   = $_POST["email"];
	$subject = $_POST["subject"];
	$mss     = $_POST["message"];
	
	mysqli_query ($connect, "INSERT INTO contact (Name, Email, Subject, Message) values ('$name', '$email', '$subject', '$mss')");
	
	?>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>		
		<script type="text/javascript">
			swal({
			title: "Respond had been sent	!",
			icon:"success"
			});
		</script>
	<?php
}

?>