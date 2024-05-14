<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['book_id'];
		$sql = "DELETE FROM book WHERE book_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Livre supprimé avec succès';
		} else {
			$_SESSION['error'] = $conn->error;
		}
		header('location: book.php');
		exit(); // Assurez-vous de quitter le script après la redirection
	} else {
		$_SESSION['error'] = 'Sélectionnez l\'élément à supprimer';
		header('location: book.php');
		exit(); // Assurez-vous de quitter le script après la redirection
	}
?>
