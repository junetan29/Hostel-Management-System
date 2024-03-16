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
        <title>JTY HOSTEL - View Student</title>
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
						$aid = $userData["Admin_id"];						
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
                            <li class="breadcrumb-item active">Dashboard > View Student</li>
                        </ol>
							
							
							
						<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Student Profile
                            </div>
							
									<div class="container bootstrap snippet">
										<div class="row">
										
											<div class="col-sm-12"><h1></h1></div>
											</div>
										<div class="row">
											<div class="col-sm-3"><!--left col-->
											<?php
												if(isset($_GET["id"]))
												{
												$id=$_GET["id"];
												$result=mysqli_query($connect,"SELECT * from studregister where User_id='$id'");
												$row=mysqli_fetch_assoc($result);
												$Sta = $row["StaId"];
												$res = mysqli_query($connect, "SELECT * from state where ID='$Sta'");
												$row1 = mysqli_fetch_array($res);
												
												$Sec1 = $row["Que1"];
												$res1 = mysqli_query($connect, "SELECT * from secureque where Id='$Sec1'");
												$row2 = mysqli_fetch_array($res1);
												
												$Sec2 = $row["Que2"];
												$res2 = mysqli_query($connect, "SELECT * from secureque where Id='$Sec2'");
												$row3 = mysqli_fetch_array($res2);
												
												$Sec3 = $row["Que3"];
												$res3 = mysqli_query($connect, "SELECT * from secureque where Id='$Sec3'");
												$row4 = mysqli_fetch_array($res3);
												
												}
											?> 	  

										  <div class="text-center">
										  <form class="form"  method="post" enctype="multipart/form-data">
											<img src="../img/Student/<?php echo $row["StudProfile"]; ?>" class="avatar img-thumbnail" alt="<?php echo $row["Studname"]; ?>">
											
											<br><br>
											<!--<label class="btn btn-success d-block px-1 py-2">
											<input name="student_image" type="file" style="display:none;" class="text-center center-block file-upload"> Upload Image
				                            </label>
											<input class="btn btn-lg btn-info " type="submit" name="editimage" value="Save Images">-->
				                           </form>
										  </div></hr><br>

											</div><!--/col-3-->
											
											<div class="col-sm-9">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#home"><?php echo $row["Studname"] ?>'s Profile</a></li>
													<!--<li class="active"><a data-toggle="tab" href="#messages">Edit Profile</a></li>-->
												  </ul>
											
												  
											  <div class="tab-content">
												<div class="tab-pane active" id="home">
													<br>
													  <form class="form" action="##" method="post" id="registrationForm">
															<div class="row">
																<div class="col-xl-4">
																	<div class="form-label-group">
																		<label for="studname" >Name</label>
																		<input type="text" id="studname" name="studname" class="form-control" value="<?php echo $row["Studname"] ?>" disabled>
																	</div>
																</div>
																
																<div class="col-xl-3">
																	<div class="form-label-group">
																	<?php
																	if($row["Nation"]=='Malaysian')
																	{
																	?>
																		<label for="studic">Identity Card</label>
																		<input type="text" id="studic" name="studic" class="form-control" value="<?php echo $row["Studic"] ?>" disabled>
																	<?php
																	}
																	else if ($row["Nation"]=='Non-Malaysian')
																	{
																	?>
																		<label for="studic">Passport </label>
																		<input type="text" id="studic" name="pass" class="form-control" value="<?php echo $row["StudPassport"] ?>" disabled>
																	<?php
																	}
																	?>
																	</div>
																</div>
																<div class="col-xl-2">
																	<div class="form-label-group">
																		<label for="studgender">Gender</label>
																		<input type="text" id="studgender" name="studgender" class="form-control"  value="<?php echo $row["Gender"] ?>" disabled>
																	</div>
																</div>
																<div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="studphnum">Phone Number</label>
																		<input type="text" id="studphnum" name="studphnum" class="form-control"  value="<?php echo $row["Studphnum"] ?>" disabled>
																	</div>
																</div>
															</div><br>
															<div class="row">
																	<div class="col-xl-12">
																		<div class="form-label-group">
																		<?php
																		$course = $row["CousId"];
																		$c = mysqli_query($connect, "SELECT * from course where ID = '$course'");
																		$c1 = mysqli_fetch_array($c);
																		?>
																			<label for="studcourse">Student Course</label>
																			<input type="text" id="studcourse" name="studcourse" class="form-control"  value="<?php echo $c1["CourseTitle"] ?>" disabled>
																		</div>
																	</div>
																</div>
																<br>
															<div class="row">
																	
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<label for="Offerletter">Offer Letter</label>
																				<br><a href="#" id="pop">
																					<embed id="imagesource" src="../img/Student/<?php echo $row["StudOfferLetter"]; ?>" style="width:700px; height:700px;" alt="No Offer Letter">
																				</a>
																		</div>
																	</div>
																</div><br>
																<?php
																	if($row["Nation"]=='Malaysian')
																	{
																		?>
																			<div class="row">
																				<div class="col-xl-12">
																					<div class="form-label-group">
																						<label for="studcurrentaddress">Current Address</label>
																						<input type="text" id="studcurrentaddress" name="studcurrentaddress" class="form-control" value="<?php echo $row["Studaddress"] ?>" disabled>
																					</div>
																				</div>
																			</div><br>
																			
																			<div class="row">
																				<div class="col-xl-6">
																					<div class="form-label-group">
																						<label for="state">State</label>
																							<input type="text" id="studcurrentaddress" name="studcurrentaddress" class="form-control" value="<?php echo $row1["State"] ?>" disabled>
																					</div>
																				</div>
																				<div class="col-xl-6">
																					<div class="form-label-group">
																						<label for="postcode">Postcode</label>
																						<input type="text" id="studpostcode" name="studpostcode" class="form-control" value="<?php echo $row["Postcode"] ?>" disabled>
																					</div>
																				</div>
																			</div><br>
																	<?php
																	}
																	else
																	{
																		
																	}
																	?>
																	
																
					
																<div class="row">
																	<div class="col-xl-8">
																		<div class="form-label-group">
																			<label for="sq1">Secruity Question 1</label>
																			<input type="email" id="sq1" name="sq1" class="form-control" value="<?php echo $row2["Question"] ?>" disabled>
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Answer</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="<?php echo $row["Ans1"] ?>" disabled >
																					
																		</div>
																	</div>
																	
																</div><br>

																<div class="row">
																	<div class="col-xl-8">
																		<div class="form-label-group">
																			<label for="sq2">Secruity Question 2</label>
																			<input type="email" id="sq2" name="sq2" class="form-control" value="<?php echo $row3["Question"] ?>" disabled>
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Answer</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="<?php echo $row["Ans2"] ?>" disabled >
																					
																		</div>
																	</div>
																	
																</div><br>

																<div class="row">
																	<div class="col-xl-8">
																		<div class="form-label-group">
																			<label for="sq3">Secruity Question 3</label>
																			<input type="email" id="sq3" name="sq3" class="form-control" value="<?php echo $row4["Question"] ?>" disabled>
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Answer</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="<?php echo $row["Ans3"] ?>" disabled >
																					
																		</div>
																	</div>
																	
																</div><br>

																<div class="row">
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<label for="studemail">Email address</label>
																			<input type="email" id="studemail" name="studemail" class="form-control" value="<?php echo $row["Studemail"] ?>" disabled>
																		</div>
																	</div>
																	
																	<!--<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Password</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="?php echo $row["Password"] ?>" disabled >
																					
																		</div>
																	</div>-->
																	
																</div><br>		  
														 
														  
														  <div class="col-md-12"><!-- col-md-12 Begin -->

								
													  
																<?php if($row['StudStatus']=="0" && $row['StudIsDelete']=="0"){ ?>
																<button class="btn btn-primary d-block px-2 py-3" name="checked" id="btn" style="width:100%;"> Approve</button>
																<br>
																<a href="student_list.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php } else if($row['StudIsDelete']=="1"){ ?>
																<button class="btn btn-primary d-block px-2 py-3" name="unremove" id="btn" style="width:100%;"> Unremove</button>
																<br>
																<a href="student_delete.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<br>
																<?php }
																else { ?>
																<a href="student_list.php" class="btn btn-primary d-block px-2 py-3 " id="btn">Back</a>
																<?php }?>
																  
															</div><!-- col-md-12 Finish -->

												</form>



												<?php
												
													if(isset($_POST["checked"]))
													{
														$Id=$row["User_id"];
														$aid = $userData["Admin_id"];
														$name = $row["Studname"];
														$email = $row["Studemail"];
														$cou = mysqli_query($connect, "SELECT * from coupon where coupon_title = 'NEW USER DISCOUNT'");
														$cou1 = mysqli_fetch_array($cou);
														$cid = $cou1["coupon_id"];
														$ctot = $cou1["coupon_limit"];
														$cuse = $cou1["coupon_used"];
														$coup = $cou1["coupon_code"];
														mysqli_query($connect,"update studregister set StudStatus=1, Admin_id = '$aid' where User_id='$Id'");
														if($ctot > $cuse)
														{
															mysqli_query ($connect, "INSERT INTO voucher (CoupId, StudId) VALUES('$cid', '$Id')");
															$subject = "JTYHostel";
															$message = "Hi ".$name.".\nYour registration has been approve.\n\nHere is your voucher :".$coup.". \nYou may use it for your first purchase.\n\nClick the link at below to login our webpage:\n http://localhost/jty/stud_login.php  \n\n Thank you for Choosing Us";
															$from = "From: JTYHostel <jtyhostel@gmail.com>";
																	
															mail($email,$subject,$message,$from);	
														}
														else
														{
															$subject = "JTYHostel";
															$message = "Hi ".$name.".\nYour registration has been approve.\n\nClick the link at below to login our webpage:\n http://localhost/jty/stud_login.php  \n\n Thank you for Choosing Us";
															$from = "From: JTYHostel <jtyhostel@gmail.com>";
																	
															mail($email,$subject,$message,$from);	
														}
														?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "Successful Approved!",
															  icon: "success",
															  button: "Review"}).then(function(){window.location.href = "student_list.php";});
														</script>
												  <?php
												
													}	
													if(isset($_POST["unremove"]))
													{
														$Id=$row["User_id"];
														$name = $row["Studname"];
														$email = $row["Studemail"];
														mysqli_query($connect,"update studregister set StudIsDelete=0, AdminDel = 0 where User_id='$Id'");
														?>
														<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
														<script type="text/javascript">
														swal({title: "Unremove Successful!",
															  icon: "success",
															  button: "Review"}).then(function(){window.location.href = "student_list.php";});
														</script>
													  <?php
														$subject = "JTYHostel";
														$message = "Hi ".$name.".\nYour account has been unbarred.\nYou may click the link at below to login our webpage:\n\n http://localhost/jty/stud_login.php  \n\nHope you can follow our terms and condition in future.\nThank you for Choosing Us. ";
														$from = "From: JTYHostel <jtyhostel@gmail.com>";
																
														mail($email,$subject,$message,$from);	
													}
													?>
												  
												  <hr>
												  
												 </div><!--/tab-pane-->
												 <!--<div class="tab-pane" id="messages">
												   
												   <br>
													  <form class="form"  method="post"  enctype="multipart/form-data">
															<div class="row">
																	  <div class="col-xl-4">
																	  <div class="form-label-group">
																		  <label for="first_name">Name</label>
																		  <input type="text" class="form-control" id="studname" name="studname"  value="?php echo $row["Studname"] ?>">
																	  </div>
																	  </div>
																  
																	  <div class="col-xl-3">
																	<div class="form-label-group">
																		<label for="studphnum">Phone Number</label>
																		<input type="text" id="studphnum" name="studphnum" class="form-control"  value="?php echo $row["Studphnum"] ?>" >
																	</div>
																</div>
																<div class="col-xl-5">
																		<div class="form-label-group">
																			<label for="studcourse">Student Course</label>
																			<select id="studcourse" name="studcourse" class="form-control">
																				<option>--Select--</option>
																				?php
																					
																					$select = mysqli_query($connect,"SELECT * FROM course ");
																					$course=$row["Studcourse"];
																					while($row2 = mysqli_fetch_assoc($select))
																					{
																						?>
																						
																						<option value="?php echo $row2['CourseTitle']; ?>" 
																								?php if($course == $row2['CourseTitle'])
																									echo "selected";
																								?>>?php echo $row2["CourseTitle"]; ?></option>
																						
																						?php
																					}
																				?>
																			</select>
																		</div>
																</div>
															</div>
															<br>
															
																
																<div class="row">
																	<div class="col-xl-12">
																		<div class="form-label-group">
																			<label for="studcurrentaddress">Current Address</label>
																			<input type="text" id="studcurrentaddress" name="studcurrentaddress" class="form-control" value="?php echo $row["Studaddress"] ?>" >
																		</div>
																	</div>
																</div><br>
																
																<div class="row">
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="state">State</label>
																				<select id="state" name="state" class="form-control">
																					<option>State</option>
																					?php
																						
																						$select = mysqli_query($connect,"SELECT * FROM state ");
																						$state = $row["State"];
																						while($row3 = mysqli_fetch_assoc($select))
																						{
																							?>
																							
																							<option value="?php echo $row3['State']; ?>" 
																									?php if($state == $row3['State'])
																										echo "selected";
																									?>>?php echo $row3["State"]; ?></option>
																							
																							?php
																						}
																					?>
																				</select>
																		</div>
																	</div>
																	<div class="col-xl-6">
																		<div class="form-label-group">
																			<label for="postcode">Postcode</label>
																			<input type="text" id="studpostcode" name="studpostcode" class="form-control" value="?php echo $row["Postcode"] ?>" maxlength="5">
																		</div>
																	</div>
																</div><br>
																
																

																

																

																

																<div class="row">
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studemail">Email address</label>
																			<input type="email" id="studemail" name="studemail" class="form-control" value="?php echo $row["Studemail"] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Current Password</label>
																			<input type="text" id="studpassword" name="studpassword" class="form-control" value="?php echo $row["Password"] ?>"  >
																					
																		</div>
																	</div>
																	
																	<div class="col-xl-4">
																		<div class="form-label-group">
																			<label for="studpassword">Reset Password</label>
																			<input type="text" id="studsetpassword" name="studsetpassword" class="form-control" value="?php echo $row["Password"] ?>"  >
																					
																		</div>
																	</div>
																	
																</div><br>
																
														  
														 
														  
														  <div class="row">
															   <div class="col-xs-6">
																	<br>
																	<input name="update" value="Update User" type="submit" class="btn btn-primary form-control">
																</div>
																<div class="col-xs-6">
																	<br>
																	<input name="reset" value="Reset" type="reset" class="btn btn-warning form-control">
																</div>
																
														  </div>
													</form>
												  
												  <hr>
												   
												 </div>--><!--/tab-pane-->
												
												   
												  </div><!--/tab-pane-->
											  </div><!--/tab-content-->

											</div><!--/col-9-->
										</div><!--/row-->			
										
								
								
						</div>




						
							
							
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            
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
		<script src="js/images.js"></script>
    </body>
</html>

<?php 

/*if(isset($_POST['editimage'])){
    
    $student_images = $_FILES['student_image']['name'];
    $temp_student_image = $_FILES['student_image']['tmp_name'];
    
    move_uploaded_file($temp_student_image,"../img/Student/$student_images");
    
    
    
    $update_student = "update studregister set StudProfile='$student_images' where User_id='$id'";
    
    $run_student_images = mysqli_query($connect,$update_student);
    
    if($run_student_images){
        
        echo "<script>alert('Student images has been updated sucessfully')</script>";
        echo "<script>window.open('login/login.php','_self')</script>";
        
        session_destroy();
        
    }
    
}

if(isset($_POST['update'])){
    
    $studname = $_POST['studname'];
	$studphnum = $_POST['studphnum'];
	$studcourse = $_POST['studcourse'];
	$studcurrentaddress = $_POST['studcurrentaddress'];
	$state = $_POST['state'];
	$studpostcode = $_POST['studpostcode'];
	$studemail = $_POST['studemail'];
	$studsetpassword = $_POST['studsetpassword'];
	
	
    
    $update_students = "update studregister set Studname='$studname',Studphnum='$studphnum',Studcourse='$studcourse',Studaddress='$studcurrentaddress',State='$state',Postcode='$studpostcode',Studemail='$studemail',Password='$studsetpassword' where User_id='$id'";
	
    
    $run_student = mysqli_query($connect,$update_students);
    
    if($run_student){
        
        echo "<script>alert('Student details has been updated sucessfully')</script>";
        echo "<script>window.open('student_list.php','_self')</script>";
        
        
    }
    
}*/


?>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:830px;" >
    <div class="modal-content">
      <div class="modal-header"> 
		<h4 class="modal-title" id="myModalLabel">Offer Letter Preview</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 100%; height: 100%;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#imagesource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>

<?php } ?>
