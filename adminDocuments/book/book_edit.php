<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['book_id'];
		$faculte = $_POST['faculte'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];
		$titre = $_POST['titre'];
		$author = $_POST['auteur'];
		$pub_date = $_POST['pub_date'];
		$exemplaire = $_POST['NBexemplaire'];
		$description = $_POST['description'];


		$sql = "UPDATE book SET book_isbn = '$isbn',book_category_id = '$category',book_title ='$titre', book_author = '$author', book_publish_date = '$pub_date', NbExemplaireTotal = '$exemplaire', faculty_id = '$faculte',book_description='$description' WHERE book_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Livre mis à jour avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez renseignez les champs à mettre à jour';
	}

	header('location:book.php');

?>