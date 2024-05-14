<?php
	include 'includes/session.php';

	if(isset($_POST['return_borrow'])){
		$id = $_POST['borrow_memory_id'];
		    // Mettre à jour le statut et la date de retour dans la table memory_consultation
              $returnDate = date('Y-m-d H-i-s'); // Date et heure actuelles
              $sql = "UPDATE memory_borrow SET status = 1, return_memory_date = '$returnDate' WHERE borrow_memory_id = '$id'";
              
              if($conn->query($sql)){
			$_SESSION['success'] = 'Memoire retournée avec succès';
               }
               else{
                    $_SESSION['error'] = 'Erreur lors du retour de la memoire';
               }

	}
	else{
		$_SESSION['error'] = 'Veuillez selectionnez la memoire à retourner';
	}

	header('location:memory_borrow.php');

?>