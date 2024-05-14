<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		var_dump ($id);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE memory SET memory_photo = '$filename' WHERE memory_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Photo de couverture du livre modifié avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Veuillez selectioné la memoire  d\'abord ';
	}

	header('location: memory.php');
?>