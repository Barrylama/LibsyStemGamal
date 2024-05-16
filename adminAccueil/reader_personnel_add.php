<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['reader_firstname'];
		$lastname = $_POST['reader_lastname'];
		$reader_phone = $_POST['reader_phone'];
		$reader_address = $_POST['reader_address'];
		$reader_gender = $_POST['reader_gender'];
		$filename = $_FILES['photo']['name'];
		$Poste = $_POST['Poste'];
		$Faculte = $_POST['Faculte'];

		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating studentid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reader_number = 'PU'.substr(str_shuffle($letters), 0, 2).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO reader (reader_number, reader_firstname, reader_lastname,reader_phone,reader_address,gender_id,reader_photo,reader_category_id,Departement,Poste,created_on) VALUES ('$reader_number', '$firstname', '$lastname',$reader_phone,'$reader_address','$reader_gender','$filename',21,'$Faculte','$Poste', NOW())";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Lecteur ajouté avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Veuillez renseigner les champs d\'abord';
	}

	header('location: reader_personnel.php');
?>