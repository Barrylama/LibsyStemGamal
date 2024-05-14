<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['review_id'];
		$sql = "DELETE FROM review WHERE review_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Revue supprimée avec succès';
		} else {
			$_SESSION['error'] = $conn->error;
		}
		header('location: review.php');
		exit(); // Assurez-vous de quitter le script après la redirection
	} else {
		$_SESSION['error'] = 'Sélectionnez l\'élément à supprimer';
		header('location: review.php');
		exit(); // Assurez-vous de quitter le script après la redirection
	}
?>
