<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE reader SET reader_photo = '$filename' WHERE reader_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Photo du lecteur modifié avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Veuillez selectioné le lecteur d\'abord ';
	}

	header('location: reader_personnel.php');
?>