<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role']; // Ajout de la récupération du rôle

		$sql = "SELECT * FROM admin WHERE username = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Identifians invalides';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['admin_id'];
				// Utilisation du rôle pour la redirection
				if ($role == 'accueil') {
					// Redirection pour l'admin_acceuil
					header('location: home.php');
				} elseif ($role == 'documentation') {
					// Redirection pour l'admin de documentation
					header('location: ../AdminDocuments/book/home.php');
				} else {
					// Redirection par défaut si le rôle n'est pas reconnu
					header('location: index.php');
				}
				exit(); // Arrêter le script après la redirection
			}
			else{
				$_SESSION['error'] = 'Identifiants invalides';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Veuillez renseigner les champs d\'abord';
	}

	header('location: index.php');

?>