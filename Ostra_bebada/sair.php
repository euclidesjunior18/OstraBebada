<?php 
     session_start('login');
     session_unset('login');
     session_destroy();
	 header('location:index.php'); 
?>
