<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$sql = "UPDATE memory_category SET name_category_memory = '$name' WHERE memory_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Categorie mis à jour avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:category.php');

?>