<?php
	error_reporting(0);
	session_start();
	$connect = mysqli_connect("localhost","root","","fyp");
	
	if($connect)
	{
	}
	else
	{
		die("Could not connect".mysql_error());
	}

?>