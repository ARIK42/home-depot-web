<?php

	$connection = new mysqli("localhost","root","","inventory");
	if ($connection->connect_error) {
    	die("Connection failed: " . $connection->connect_error);
	} 
?>