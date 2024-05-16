<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['reader_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$reader_phone = $_POST['reader_phone'];
		$reader_address = $_POST['reader_address'];
		$reader_gender = $_POST['reader_gender'];
		$Profession = $_POST['Profession'];
		$Identite = $_POST['Identite'];

		$sql = "UPDATE reader SET reader_firstname = '$firstname', reader_lastname = '$lastname',reader_phone ='$reader_phone',reader_address = '$reader_address',gender_id ='$reader_gender',Poste = '$Profession',Matricule ='$Identite' WHERE reader_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Lecteur modifié avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez renseigner les champs d\'abord';
	}

	header('location:reader_particulier.php');

?>