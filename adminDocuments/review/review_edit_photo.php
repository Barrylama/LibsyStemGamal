<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		var_dump ($id);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE review SET review_photo = '$filename' WHERE review_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Photo de couverture de la revue modifié avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Veuillez selectioné la revue  d\'abord ';
	}

	header('location: review.php');
?>