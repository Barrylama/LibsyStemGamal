<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM reader_category WHERE reader_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie supprimée avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez selectionner l\'element à supprimer';
	}

	header('location: reader_category.php');
	
?>