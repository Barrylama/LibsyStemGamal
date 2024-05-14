<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$faculte = $_POST['faculte'];
		$category = $_POST['category'];
		$isbn = $_POST['isbn'];
		$titre = $_POST['titre'];
		$author = $_POST['auteur'];
		$pub_date = $_POST['pub_date'];
		$exemplaire = $_POST['NBexemplaire'];
		$description = $_POST['description'];

		// Vérifier si un fichier a été téléchargé
		if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK){
			$filename = $_FILES['photo']['name'];
			$target_path = '../images/'.$filename;

			// Déplacer le fichier téléchargé vers le répertoire cible
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)){
				// Utiliser une requête préparée pour l'insertion
				$sql = "INSERT INTO memory (faculty_id, memory_category_id, memory_number, memory_theme, memory_author, memory_publish_date, NbExemplaireTotal, memory_description, memory_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("iiisssiss", $faculte, $category, $isbn, $titre, $author, $pub_date, $exemplaire, $description, $filename);

				if($stmt->execute()){
					$_SESSION['success'] = 'Memoire ajouté avec succès';
				} else {
					$_SESSION['error'] = $stmt->error;
				}

				$stmt->close();
			} else {
				$_SESSION['error'] = 'Échec du téléchargement du fichier';
			}
		} else {
			$_SESSION['error'] = 'Aucun fichier n\'a été téléchargé';
		}
	} else {
		$_SESSION['error'] = 'Remplissez d\'abord le formulaire d\'ajout';
	}

	header('location: memory.php');
?>
