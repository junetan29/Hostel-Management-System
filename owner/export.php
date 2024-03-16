<?php
	include("connect.php");
	$userData = $_SESSION["OWNDETAIL"];
	$oid     = $userData['owner_id'];
	if(isset($_POST["export"]))
	{
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=ProductData.csv');
		$output = fopen("php://output", "w");
		fputcsv($output, array('ID','Student Name','Nation','Gender','Student Email'));
		$hoss = mysqli_query($connect, "SELECT * from hostel where Own_id='$oid'");
		while($hoss1 = mysqli_fetch_array($hoss))
		{
			$hidd = $hoss1["ID"];
			$result=mysqli_query($connect,"SELECT * from book where HosId='$hidd' and Status!='cancel' and Status!='view'");
				while($userDatas = mysqli_fetch_array ($result))
				{
					$sid=$userDatas['StudId'];
					$result1 = mysqli_query($connect,"SELECT User_id ,Studname,Nation,Gender,Studemail FROM studregister where User_id='$sid'");
					$row = mysqli_fetch_array($result1);
					fputcsv($output,$row);
				}
		}
		fclose($output);
	}
	if(isset($_POST["expay"]))
	{
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=ProductData.csv');
		$outpay = fopen("php://output", "w");
		fputcsv($outpay, array('Id','Holder Name','Bank','Card Type','Payment Price(RM)','Payment Date','Move In Date','Duration'));
		$pay = mysqli_query($connect,"SELECT ID , HolderName, Bank, CardType, Price, PaymentDate, MoveIn, Duration FROM payment where OwnId='$oid'");
		while($pay1 = mysqli_fetch_assoc($pay))
		{
			fputcsv($outpay,$pay1);
		}
		fclose($outpay);
	}
?>