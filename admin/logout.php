<?php 
session_start();
session_destroy();
unset($_SESSION['ADMINAREAID']); 
	
?><script>document.location="login/login.php";</script><?php
 
?>