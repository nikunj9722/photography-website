<?php 
	$con=mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Could Not Connect Database.".mysqli_error($con));
	}
?>