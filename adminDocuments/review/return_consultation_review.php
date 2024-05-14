<?php
	include 'includes/session.php';

	if(isset($_POST['return_consultation'])){
		$id = $_POST['consultation_review_id'];
		    // Mettre à jour le statut et la date de retour dans la table review_consultation
              $returnDate = date('Y-m-d H-i-s'); // Date et heure actuelles
              $sql = "UPDATE review_consultation SET status = 1, return_review_date = '$returnDate' WHERE consultation_review_id = '$id'";
              
              if($conn->query($sql)){
			$_SESSION['success'] = 'Revue retournée avec succès';
               }
               else{
                    $_SESSION['error'] = 'Erreur lors du retour de la revue';
               }

	}
	else{
		$_SESSION['error'] = 'Veuillez selectionnez la revue à retourner';
	}

	header('location:review_consultation.php');

?>