<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['memory_id'];
		$faculte = $_POST['faculte'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];
		$titre = $_POST['titre'];
		$author = $_POST['auteur'];
		$pub_date = $_POST['pub_date'];
		$exemplaire = $_POST['NBexemplaire'];
		$description = $_POST['description'];


		$sql = "UPDATE memory SET memory_number = '$isbn',memory_category_id = '$category',memory_theme ='$titre', memory_author = '$author', memory_publish_date = '$pub_date', NbExemplaireTotal = '$exemplaire', faculty_id = '$faculte',memory_description='$description' WHERE memory_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Memoire mis à jour avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez renseignez les champs à mettre à jour';
	}

	header('location:memory.php');

?>