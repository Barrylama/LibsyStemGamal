<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM memory_category WHERE memory_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie supprimée avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: category.php');
	
?>