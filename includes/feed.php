<?php
include ("connect.php");

if(isset($_POST["smbtn"]))
{
	$name = $_POST["name"];
	$cn   = $_POST["cn"];
	$mss  = $_POST["mss"];
	
	$currdate = date("Y-m-d H:i:s");  	
	
	mysqli_query($connect,"INSERT INTO feedback (Fbname, FbPhnNum, Date,  Message) 
		 values ('$name', '$cn','$currdate',  '$mss')");
	
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