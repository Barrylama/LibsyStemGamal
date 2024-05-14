<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../../../AdminAccueil/index.php');
	}

	$sql = "SELECT * FROM admin WHERE admin_id = '".$_SESSION['admin']."' ";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	
?>