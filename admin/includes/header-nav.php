<?php include("connect.php") ?>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element')
	}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><img src="https://img.icons8.com/plasticine/50/000000/home.png"/>ADMIN AREA</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
				<?php 
					  if(isset($_SESSION['ADMINAREAID']) && !empty($_SESSION['ADMINAREAID']))
						{
							$userData = $_SESSION['ADMINAREAID'];
							$name = $userData['Name'];
						}
				?>
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $name; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="view_admin.php"><i class="fa fa-fw fa-user"></i>Profile</a>
						<?php
									  $result1=mysqli_query($connect,"SELECT ID from hostel");
									  $count2=mysqli_num_rows($result1);
									?>
						<a class="dropdown-item" href="view_product.php"><i class="fa fa-fw fa-cart-plus"></i>Product<span class="badge"><?php echo $count2;?></span></a>
						<?php
									  $result2=mysqli_query($connect,"SELECT owner_id from owner");
									  $count1=mysqli_num_rows($result2);
									?>
						<a class="dropdown-item" href="owner_list.php"><i class="fa fa-fw fa-address-book"></i>Owner<span class="badge"><?php echo $count1;?></span></a>
						<?php
									  $result3=mysqli_query($connect,"SELECT User_id from studregister");
									  $count=mysqli_num_rows($result3);
									?>
						<a class="dropdown-item" href="student_list.php"><i class="fa fa-fw fa-users"></i>Student<span class="badge"><?php echo $count;?></span></a>
						<?php
									  $result3=mysqli_query($connect,"SELECT ID from category");
									  $count3=mysqli_num_rows($result3);
									?>
                        <a class="dropdown-item" href="view_category.php"><i class="fa fa-fw fa-tasks"></i>Product Category<span class="badge"><?php echo $count3;?></span></a>
						
                        <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="javascript:;" onClick="javascript:logout();"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                    </div>
                </li>
            </ul>
				<div id="google_translate_element">
					<div class="skiptranslate goog-te-gadget" dir="ltr">
						<div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;">
						<span style="vertical-align: middle; margin:left"></span>
						</div>
					</div>
				</div>
        </nav>
		<script>
	  function logout(){
		document.location = "logout.php";
	}
		
	</script>
		
<!-- Navbar Search
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
-->