<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['memory_id'];
		$sql = "DELETE FROM memory WHERE memory_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Livre supprimé avec succès';
		} else {
			$_SESSION['error'] = $conn->error;
		}
		header('location: memory.php');
		exit(); // Assurez-vous de quitter le script après la redirection
	} else {
		$_SESSION['error'] = 'Sélectionnez l\'élément à supprimer';
		header('location: memory.php');
		exit(); // Assurez-vous de quitter le script après la redirection
	}
?>
