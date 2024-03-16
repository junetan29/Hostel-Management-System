<?php
	include("connect.php");
	if(isset($_POST["export"]))
	{
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Student List.csv');
		$output = fopen("php://output", "w");
		fputcsv($output, array('ID','Student Name','Nation','Gender','Student Email'));
		$result = mysqli_query($connect,"SELECT User_id ,Studname,Nation,Gender,Studemail FROM studregister where StudIsDelete=0");
		while($row = mysqli_fetch_assoc($result))
		{
			fputcsv($output,$row);
		}
		fclose($output);
	}
	if(isset($_POST["exown"]))
	{
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Owner List.csv');
		$outown = fopen("php://output", "w");
		fputcsv($outown, array('ID','Owner Name','Nation','Gender','Owner Email'));
		$own = mysqli_query($connect,"SELECT owner_id ,owner_name,HOwner_nationality,gender,owner_email FROM owner where OwnerIsDelete=0");
		while($own1 = mysqli_fetch_assoc($own))
		{
			fputcsv($outown,$own1);
		}
		fclose($outown);
	}
	if(isset($_POST["expay"]))
	{
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Payment List.csv');
		$outpay = fopen("php://output", "w");
		fputcsv($outpay, array('Id','Holder Name','Bank','Card Type','Payment Price(RM)','Payment Date','Move In Date','Duration'));
		$pay = mysqli_query($connect,"SELECT ID , HolderName, Bank, CardType, Price, PaymentDate, MoveIn, Duration FROM payment");
		while($pay1 = mysqli_fetch_assoc($pay))
		{
			fputcsv($outpay,$pay1);
		}
		fclose($outpay);
	}
?>