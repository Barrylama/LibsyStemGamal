<?php
	$conn = new mysqli('localhost', 'root', '', 'libsystemgamal');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>