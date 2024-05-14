<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		var_dump ($id);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE book SET book_photo = '$filename' WHERE book_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Photo de couverture du livre modifié avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Veuillez selectioné le livre  d\'abord ';
	}

	header('location: book.php');
?>