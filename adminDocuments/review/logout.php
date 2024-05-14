<?php
	session_start();
	session_destroy();

	header('location:../../adminAccueil/index.php');
?>