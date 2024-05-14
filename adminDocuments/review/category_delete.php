<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM review_category WHERE review_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie ajoutée avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez selectionné l\'élement à supprimer';
	}

	header('location: category.php');
	
?>