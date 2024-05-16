<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['reader_id'];
		$sql = "DELETE FROM reader WHERE reader_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Lecteur supprimé avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez selectionné l\'element à supprimer d\'abord';
	}

	header('location: reader_particulier.php');
	
?>