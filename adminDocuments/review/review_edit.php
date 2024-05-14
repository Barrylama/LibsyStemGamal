<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['review_id'];
		$faculte = $_POST['faculte'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];
		$titre = $_POST['titre'];
		$author = $_POST['auteur'];
		$pub_date = $_POST['pub_date'];
		$exemplaire = $_POST['NBexemplaire'];
		$description = $_POST['description'];


		$sql = "UPDATE review SET review_number = '$isbn',review_category_id = '$category',review_title ='$titre', review_author = '$author', review_publish_date = '$pub_date', NbExemplaireTotal = '$exemplaire', faculty_id = '$faculte',review_description='$description' WHERE review_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Revue mis à jour avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez renseignez les champs à mettre à jour';
	}

	header('location:review.php');

?>