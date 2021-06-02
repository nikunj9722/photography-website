

<?php 
	session_start();
	session_destroy();
	// unset($_SESSION['user']); //singal variable
	header('location:index.php');
	
?>