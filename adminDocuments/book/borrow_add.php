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
					$sql = "SELECT * FROM book WHERE book_isbn = '$isbn' AND NbExemplaireDispo <= NbExemplaireTotal";
					$query = $conn->query($sql);
					if($query->num_rows > 0){
						$brow = $query->fetch_assoc();
						$bid = $brow['book_id'];

						$sql = "INSERT INTO book_borrow (reader_number,book_id, borrow_book_date) VALUES ('$student_id', '$bid', NOW())";
						if($conn->query($sql)){
							$added++;
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
						$_SESSION['error'][] = 'Le livre avec l\'ISBN - '.$isbn.' n\'est pas disponible';
					}
				}
			}

			if($added > 0){
				$book = ($added == 1) ? 'Livre' : 'Livres';
				$books = ($added == 1) ? 'emprunté avec succès' : 'empruntés avec succès';
				$_SESSION['success'] = $added.' '.$book.' '.$books;
			}
		}
	}
	else{
		$_SESSION['error'] = 'Veuillez remplir le formulaire d\'abord';
	}

	header('location: book_borrow.php');
?>
