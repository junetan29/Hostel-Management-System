<?php include("connect.php") ?>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
							
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Room
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view_product.php">View Room</a>
                                </nav>
                            </div>
							
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view_category.php">View Category</a>
                                </nav>
                            </div>
							
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="false" aria-controls="student">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-users"></i></div>
                                Student 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="student" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="student_list.php">Student List</a>
													<a class="nav-link" href="student_delete.php">Student Blacklist</a>
													<a class="nav-link" href="student_appoint.php">Student Appointment</a>
                                </nav>
                            </div>
							
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#owner" aria-expanded="false" aria-controls="owner">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-users"></i></div>
                                Owner List
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="owner" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="owner_list.php">Owner List</a>
									<a class="nav-link" href="owner_delete.php">Owner Blacklist</a>
                                </nav>
                            </div>
							
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#others" aria-expanded="false" aria-controls="others">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Others
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
							<div class="collapse" id="others" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
													<a class="nav-link" href="state.php">State</a>
											<a class="nav-link" href="courses.php">Courses</a>
											<a class="nav-link" href="coupon.php">Coupon</a>
											<a class="nav-link" href="sq.php">Security Question</a>
                                </nav>
                            </div>
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer" aria-expanded="false" aria-controls="customer">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Customer Manage
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="customer" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="feedback.php">Feedback</a>
									<a class="nav-link" href="contact.php">Contact</a>
                                </nav>
                            </div>
							
							<a class="nav-link" href="view_booking.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                                View Booking
                            </a>

                            <a class="nav-link" href="view_payment.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                                View Payments
                            </a>
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="false" aria-controls="admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
                                Admin List
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="admin" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admin_list.php">Admin List</a>
									<a class="nav-link" href="admin_delete.php">Admin Blacklist</a>
									<a class="nav-link" href="add_admin.php">Admin Add</a>
                                </nav>
                            </div>
							
							
							
                           
							
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#UPM" aria-expanded="false" aria-controls="UPM">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                User Pages Manage
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="UPM" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slide" aria-expanded="false" aria-controls="slide">
                                        Homepages
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="slide" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="view_slides.php">Slides</a>
											<a class="nav-link" href="why_choose_us.php">Info</a>
											<a class="nav-link" href="gallery.php">Gallery</a>
											<a class="nav-link" href="boxes_details.php">Boxes</a>
                                        </nav>
                                    </div>
                                    
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about" aria-expanded="false" aria-controls="about">
                                        About
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="about" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
											<a class="nav-link" href="frequently_questions.php">Frequently Question</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
							
							
                            
                            
                            
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                                <a class="nav-link" href="javascript:;" onClick="javascript:logout();"><div class="sb-nav-link-icon"><i class="fas fa-power-off"></i>LOG OUT</div></a>

                                
                    </div>
                </nav>
            </div>
			<script>
	  function logout(){
		document.location = "logout.php";
	}
		
	</script>