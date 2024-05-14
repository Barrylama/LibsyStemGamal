<?php
	include 'includes/session.php';

	if(isset($_POST['return_consultation'])){
		$id = $_POST['consultation_book_id'];
		    // Mettre à jour le statut et la date de retour dans la table book_consultation
              $returnDate = date('Y-m-d H-i-s'); // Date et heure actuelles
              $sql = "UPDATE book_consultation SET status = 1, return_book_date = '$returnDate' WHERE consultation_book_id = '$id'";
              
              if($conn->query($sql)){
			$_SESSION['success'] = 'Livre retourné avec succès';
               }
               else{
                    $_SESSION['error'] = 'Erreur lors du retour du livre';
               }

	}
	else{
		$_SESSION['error'] = 'Veuillez selectionnez le livre à retourner';
	}

	header('location:book_consultation.php');

?>