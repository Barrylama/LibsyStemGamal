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
					$sql = "SELECT * FROM memory WHERE memory_number = '$isbn' AND NbExemplaireDispo <= NbExemplaireTotal";
					$query = $conn->query($sql);

					if($query->num_rows > 0){
						$brow = $query->fetch_assoc();
						$bid = $brow['memory_id'];

						$sql = "INSERT INTO memory_borrow (reader_id,memory_id, borrow_memory_date) VALUES ('$student_id', '$bid', NOW())";
						if($conn->query($sql)){
							$added++;
							$sql = "UPDATE memory SET NbExemplaireDispo = NbExemplaireDispo - 1 WHERE memory_id = '$bid'";
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
						$_SESSION['error'][] = 'La memoire avec l\'NUMERO - '.$isbn.' n\'est pas disponible';
					}
				}
			}

			if($added > 0){
				$memory = ($added == 1) ? 'Memoire' : 'Memoires';
				$memorys = ($added == 1) ? 'emprunté avec succès' : 'empruntés avec succès';
				$_SESSION['success'] = $added.' '.$memory.' '.$memorys;
			}
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez remplir le formulaire d\'abord';
	}

	header('location: memory_borrow.php');
?>
