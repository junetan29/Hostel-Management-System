<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
       <div class="d-flex align-items-center justify-content-between small">
           <div class="text-muted">Copyright &copy; Your Website 2020</div>
           <div>
               <a id="myBtn" style="color: #007bff; cursor: pointer;">Terms &amp; Conditions</a>
           </div>
	   </div>
    </div>
</footer>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1 style="text-align:center">Terms and Conditions for JTY Hostel</h1>

<h2>Introduction</h2> 
  
<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, JTY Hostel accessible at http://localhost/owner_june/index.php.</p>

<p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>

<p>Minors or people below 18 years old are not allowed to use this Website.</p>

<h2>Intellectual Property Rights</h2>

<p>Other than the content you own, under these Terms, Hostel Booking System and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>

<p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>

<h2>Restrictions</h2>

<p>You are specifically restricted from all of the following:</p>

<ul>
    <li>publishing any Website material in any other media;</li>
    <li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
    <li>publicly performing and/or showing any Website material;</li>
    <li>using this Website in any way that is or may be damaging to this Website;</li>
    <li>using this Website in any way that impacts user access to this Website;</li>
    <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
    <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
    <li>using this Website to engage in any advertising or marketing.</li>
</ul>

<p>Certain areas of this Website are restricted from being access by you and Hostel Booking System may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>

<h2>Your Content</h2>

<p>In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Hostel Booking System a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>

<p>Your Content must be your own and must not be invading any third-party’s rights. Hostel Booking System reserves the right to remove any of Your Content from this Website at any time without notice.</p>

<h2>No warranties</h2>

<p>This Website is provided "as is," with all faults, and Hostel Booking System express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>

<h2>Limitation of liability</h2>

<p>In no event shall Hostel Booking System, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Hostel Booking System, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

<h2>Indemnification</h2>

<p>You hereby indemnify to the fullest extent Hostel Booking System from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

<h2>Severability</h2>

<p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>

<h2>Variation of Terms</h2>

<p>Hostel Booking System is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

<h2>Assignment</h2>

<p>The Hostel Booking System is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>

<h2>Entire Agreement</h2>
    
<p>These Terms constitute the entire agreement between Hostel Booking System and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>

<h2>Governing Law & Jurisdiction</h2>

<p>These Terms will be governed by and interpreted in accordance with the laws of the State of my, and you submit to the non-exclusive jurisdiction of the state and federal courts located in my for the resolution of any disputes.</p>
<br>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>