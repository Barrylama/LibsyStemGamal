<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		
		$sql = "INSERT INTO reader_category (name_category_reader) VALUES ('$title')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie ajoutée avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Veuillez renseigner les champs d\'abord';
	}

	header('location: reader_category.php');

?>