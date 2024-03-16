<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2000; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
  font-family: Arial, Helvetica, sans-serif;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}
/* The Close Button */
.close1 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
							
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Hostel
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="insert_product.php">Insert Hostel</a>
                                    <a class="nav-link" href="view_product.php">View Hostel</a>
													<a class="nav-link" href="unapprove.php">Unapprove Hostel</a>
                                </nav>
                            </div>
							
							<a class="nav-link" href="view_category.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                View Category
                            </a>
							
							<a class="nav-link" href="view_appointment.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                View Appointment
                            </a>
							
							<a class="nav-link" href="student_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-users"></i></div>
                                Student List
                            </a>
							
							<a class="nav-link" href="view_payment.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                                View Payments
                            </a>
							
							<a class="nav-link" href="contact.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-phone-square"></i></div>
                                Contact Admin
                            </a> 
							
							<a id="myBtn1" class="nav-link" style="color:#86E3CE; cursor: pointer;">
								<div class="sb-nav-link-icon"><i class="fa fa-book" style="color:#86E3CE;"></i></div>
								User Guide
							</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                            <a class="nav-link" href="javascript:;" onClick="javascript:logout();"><div class="sb-nav-link-icon"><i class="fas fa-power-off"></i> Logout</div></a>
                    </div>
                </nav>
            </div>
				  <script>
	  function logout(){
		document.location = "owner_logout.php";
	}
	</script>	
	<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1">&times;</span>
	<?php include("user_guide.php"); ?>
</div>
</div>
<script>
// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}
</script>