<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];

		$sql = "UPDATE reader_category SET name_category_reader = '$title' WHERE reader_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie mis à jour avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez renseigner les champs';
	}

	header('location:reader_category.php');

?>