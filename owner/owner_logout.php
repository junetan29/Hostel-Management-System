<?php 
session_start();
unset($_SESSION['OWNDETAIL']); 
session_destroy();
?><script>document.location="owner_login.php";</script><?php

?>
