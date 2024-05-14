<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		
		$sql = "INSERT INTO review_category (name_category_review) VALUES ('$name')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie ajoutée avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Veuillez remplire le formulaire d\'abord';
	}

	header('location: category.php');

?>