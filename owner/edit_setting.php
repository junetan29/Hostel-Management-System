<?php
			include("connect.php");
			$userData = $_SESSION["OWNDETAIL"];
			$name     = $userData['owner_name'];
			$oid     = $userData['owner_id'];
			if(!isset($_SESSION['OWNDETAIL']))
			{
					echo "<script>window.open('owner_login.php','_self')</script>";
			}
			else
			{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Edit Security Question</title>
        <link href="css/style.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
		
    </head>
	
    <body class="sb-nav-fixed">
	<?php include("includes/header-nav.php"); ?>
        <div id="layoutSidenav">
            <?php include("includes/side-nav.php"); ?>
			
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Edit Security Question</li>
                        </ol>
<?php
		if(isset($_SESSION["OWNDETAIL"]))
		{
			$q1 = $userData["Que1"];
			$q2 = $userData["Que2"];
			$q3 = $userData["Que3"];
			$a1 = $userData["Ans1"];
			$a2 = $userData["Ans2"];
			$a3 = $userData["Ans3"];
		}
		
	?>
    <section class="ftco-section testimony-section">

<div id="main-containers">
		<form class="form-signin" method="post" name="ques" enctype="multipart/form-data">
        <h3 class="card-title text-center"><b>Security Question</b></h3>
							
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="studcourse">Question 1</label>
											<select id="question" name="ques1" class="form-control">
											<option>--Select Question--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM secureque ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Question']; ?>" 
															<?php if($q1 == $row['Question'])
																echo "selected";
															?>><?php echo $row["Question"]; ?></option>
													
													<?php
												}
											?>
										</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 1 </label>
											<input type="text" id="ans" name="ans1" class="form-control" placeholder="Answer For Question1" value="<?php echo $a1 ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="question">Question 2</label>
											<select id="question" name="ques2" class="form-control">
											<option>--Select Question--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM secureque ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Question']; ?>" 
															<?php if($q2 == $row['Question'])
																echo "selected";
															?>><?php echo $row["Question"]; ?></option>
													
													<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 2 </label>
											<input type="text" id="ans" name="ans2" class="form-control" placeholder="Answer For Question 2 " value="<?php echo $a2 ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="question">Question 3</label>
											<select id="question" name="ques3" class="form-control">
											<option>--Select Question--</option>
											<?php
												
												$select = mysqli_query($connect,"SELECT * FROM secureque ");
												while($row = mysqli_fetch_assoc($select))
												{
													?>
													
													<option value="<?php echo $row['Question']; ?>" 
															<?php if($q3 == $row['Question'])
																echo "selected";
															?>><?php echo $row["Question"]; ?></option>
													
													<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 3 </label>
											<input type="text" id="ans" name="ans3" class="form-control" placeholder="Answer For Question 3" value="<?php echo $a3 ?>" required>
										</div>
									</div>
								</div>
								<br>
						  <button id="submitbtn" name="submitbtn" class="btn btn-primary btn-block signup" type="submit"><i></i> Submit</button>
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <!--<hr class="my-4">-->
				</form>
</div>
   </section>
<?php

if(isset($_POST["submitbtn"]))
{
	$que1  = $_POST["ques1"];
	$ans1= $_POST["ans1"];
	$que2  = $_POST["ques2"];
	$ans2= $_POST["ans2"];
	$que3  = $_POST["ques3"];
	$ans3= $_POST["ans3"];
	
	if($que1 == $que2)
	{
		?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Retry !",
				  text : "You Are Not Allow To Use Same Security Question",
				  icon: "error",
				  button: "Retry"}).then(function(){window.location.href = "setting.php";});
			</script>
			<?php
	}
	else if($que1 == $que3)
	{
		?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Retry !",
				  text : "You Are Not Allow To Use Same Security Question",
				  icon: "error",
				  button: "Retry"}).then(function(){window.location.href = "setting.php";});
			</script>
			<?php
	}
	else if($que2 == $que3)
	{
		?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Retry !",
				  text : "You Are Not Allow To Use Same Security Question",
				  icon: "error",
				  button: "Retry"}).then(function(){window.location.href = "setting.php";});
			</script>
			<?php
	}
	else
	{
			$result=mysqli_query($connect,"update owner set Que1='$que1',  Ans1='$ans1', Que2='$que2',  Ans2='$ans2', Que3='$que3',  Ans3='$ans3' where owner_id= '$oid'") 
			
			?>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script type="text/javascript">
			swal({title: "Successful !",
				  text : "Security Question Has Been Save! Please Relogin to view security question.",
				  icon: "success",
				  button: "Relogin"}).then(function(){window.location.href = "owner_login.php";});
			</script>
			<?php
	}
}
?>
                    </div>
                </main>
				<?php include("includes/footer.php"); ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php } ?>