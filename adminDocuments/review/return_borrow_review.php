<?php
	include 'includes/session.php';

	if(isset($_POST['return_borrow'])){
		$id = $_POST['borrow_review_id'];
		    // Mettre à jour le statut et la date de retour dans la table review_consultation
              $returnDate = date('Y-m-d H-i-s'); // Date et heure actuelles
              $sql = "UPDATE review_borrow SET status = 1, return_review_date = '$returnDate' WHERE borrow_review_id = '$id'";
              
              if($conn->query($sql)){
			$_SESSION['success'] = 'Memoire  detenue  retournée avec succès';
               }
               else{
                    $_SESSION['error'] = 'Erreur lors du retour de la memoire';
               }

	}
	else{
		$_SESSION['error'] = 'Veuillez selectionnez la memoire à retourner';
	}

	header('location:review_borrow.php');

?>