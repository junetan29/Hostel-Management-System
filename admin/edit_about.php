<?php include("connect.php");
if(!isset($_SESSION['ADMINAREAID'])){
        
        echo "<script>window.open('login/login.php','_self')</script>";
        
    }else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JTY HOSTEL - About</title>
        <link href="design/design.css" rel="stylesheet" />
		<link rel="shortcut icon" href="https://img.icons8.com/plasticine/50/000000/home.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
		
    </head>
	<body class="sb-nav-fixed">
	<?php include("includes/header-nav.php"); ?>
        <div id="layoutSidenav">
			<?php
					if(isset($_SESSION["ADMINAREAID"]))
					{
						$userData = $_SESSION["ADMINAREAID"];
												
					}
					if($userData['AdminType']=='SuperAdmin')
					{
					include("includes/side-nav.php");
					}
					else
					{
					include("includes/side-nav-normaladmin.php");
					}
			?> 
			
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Details Edit</li>
                        </ol>
							
							
							<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-pencil-alt"></i> Details Edit 
                            </div>
                            <div class="card-body">
                                <div class="panel-body"><!-- panel-body Begin -->
										   
										   <form method="post" enctype="multipart/form-data"><!-- form-horizontal Begin --><!-- form-horizontal Begin -->
											<?php
												if(isset($_GET["id"]))
												{
												$id=$_GET["id"];
												$result=mysqli_query($connect,"select * from about where Id='$id'");
												$row=mysqli_fetch_assoc($result);
												}
											?>   
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Question </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="question" type="text" class="form-control"  value="<?php echo $row['Question']?>">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"> Answer </label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  <textarea name="answer" cols="112" rows="6" class="form-control"><?php echo $row['Answer']?></textarea>
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
											   
											   
											   
											   <div class="form-group"><!-- form-group Begin -->
												   
												  <label class="col-md-3 control-label"></label> 
												  
												  <div class="col-md-12"><!-- col-md-12 Begin -->
													  
													  <input name="submit" value="UPDATE" type="submit" class="btn btn-primary form-control">
													  
												  </div><!-- col-md-12 Finish -->
												   
											   </div><!-- form-group Finish -->
											   
										   </form><!-- form-horizontal Finish -->
										   
									   </div><!-- panel-body Finish -->
                            </div>
                        </div>
							
							
							
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <a class="btn btn-info btn-sm" href="frequently_questions.php"><i class="fa fa-arrow-left "> </i>Back to Frequently Asks Questions</a>
							<a class="btn btn-success btn-sm" href="why_choose_us.php"><i class="fa fa-arrow-left "> </i>Back to Why Choose Us</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php 

if(isset($_POST['submit'])){
    
	
	$question = $_POST['question'];
	$answer = $_POST['answer'];

    $update_answer = "update about set Answer='$answer',Question='$question' where Id='$id'";
	
    
    $run_slide = mysqli_query($connect,$update_answer);
    
    if($run_slide){
        
        echo "<script>alert('Details has been updated sucessfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        
        
    }
    
}


?>
<?php } ?>