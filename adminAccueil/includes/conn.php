<?php
	$conn = new mysqli('localhost', 'root', '', 'libsystemgamal');

	if ($conn->connect_error) {
	    die("La connexion echouée: " . $conn->connect_error);
	}
	
?>