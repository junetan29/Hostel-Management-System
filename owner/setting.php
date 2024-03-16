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
        <title>Security Question</title>
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
                            <li class="breadcrumb-item active">Dashboard > Security Question</li>
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
			$secure=mysqli_query($connect, "SELECT * from secureque where Id = '$q1'");
			$secure2=mysqli_query($connect, "SELECT * from secureque where Id = '$q2'");
			$secure3=mysqli_query($connect, "SELECT * from secureque where Id = '$q3'");
			$row = mysqli_fetch_assoc ($secure);
			$row2 = mysqli_fetch_assoc ($secure2);
			$row3 = mysqli_fetch_assoc ($secure3);
		}
	?>
    <section class="ftco-section testimony-section">

<div id="main-containers">
		<form class="form-signin" method="post" name="ques" enctype="multipart/form-data">
		<h2 style="margin-left:250px;text-align:center;"><input type="text" name="nm" style="border:1px solid white;" value=" Hi <?php echo $name ?>"><h2>
        <h3 class="card-title text-center"><b>Security Question</b></h3>
							
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="studcourse">Question 1</label>
											<input type="text" id="question" name="ques1" class="form-control" value="<?php echo $row["Question"]; ?>" disabled>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 1 </label>
											<input type="text" id="ans" name="ans1" class="form-control" value="<?php echo $a1 ?>" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="question">Question 2</label>
											<input type="text" id="question" name="ques2" class="form-control" value="<?php echo $row2["Question"]; ?>" disabled>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 2 </label>
											<input type="text" id="ans" name="ans2" class="form-control" value="<?php echo $a2 ?>" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="question">Question 3</label>
											<input type="text" id="question" name="ques3" class="form-control" value="<?php echo $row3["Question"]; ?>" disabled>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-12">
										<div class="form-label-group">
											<label for="ans">Answer 3 </label>
											<input type="text" id="ans" name="ans3" class="form-control" value="<?php echo $a3 ?>" disabled>
										</div>
									</div>
								</div>
								<br>
						  <a href="index.php" class="btn btn-primary d-block px-1 py-2 " id="btn">Back</a>
							<div class="row">
									<div class="col-xl-12">
										
									</div>
								</div>
						  <!--<hr class="my-4">-->
				</form>
</div>
   </section>
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