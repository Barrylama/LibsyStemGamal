<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$sql = "UPDATE review_category SET name_category_review = '$name' WHERE review_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie modifiée avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez selectionné l\'element à editer';
	}

	header('location:category.php');

?>