<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$student = $_POST['lecteur'];

		$sql = "SELECT * FROM reader WHERE reader_number = '$student'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			if(!isset($_SESSION['error'])){
				$_SESSION['error'] = array();
			}
			$_SESSION['error'][] = 'Lecteur non trouvé';
		}
		else{
			$row = $query->fetch_assoc();
			$student_id = $row['reader_id']; // Utilisation correcte de reader_id

			$added = 0;

			foreach($_POST['isbn'] as $isbn){
				if(!empty($isbn)){
					$sql = "SELECT * FROM review WHERE review_number = '$isbn' AND NbExemplaireDispo <= NbExemplaireTotal";
					$query = $conn->query($sql);

					if($query->num_rows > 0){
						$brow = $query->fetch_assoc();
						$bid = $brow['review_id'];

						$sql = "INSERT INTO review_consultation (reader_id,review_id, consultation_review_date) VALUES ('$student_id', '$bid', NOW())";
						if($conn->query($sql)){
							$added++;
							$sql = "UPDATE review SET NbExemplaireDispo = NbExemplaireDispo - 1 WHERE review_id = '$bid'";
							$conn->query($sql);
						}
						else{
							if(!isset($_SESSION['error'])){
								$_SESSION['error'] = array();
							}
							$_SESSION['error'][] = $conn->error;
						}
					}
					else{
						if(!isset($_SESSION['error'])){
							$_SESSION['error'] = array();
						}
						$_SESSION['error'][] = 'La revue avec le numero - '.$isbn.' n\'est pas disponible';
					}
				}
			}

			if($added > 0){
				$review = ($added == 1) ? 'Revue' : 'Revues';
				$reviews = ($added == 1) ? 'mis en consulation avec succès' : 'misent en consulation avec succès';
				$_SESSION['success'] = $added.' '.$review.' '.$reviews;
			}
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez remplir le formulaire d\'abord';
	}

	header('location: review_consultation.php');
?>
