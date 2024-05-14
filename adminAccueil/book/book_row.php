<?php 
	include 'includes/session.php';

	if(isset($_POST['book_id'])){
		$id = $_POST['book_id'];
		$sql = "SELECT *, book.book_id AS bookId FROM book 
				LEFT JOIN book_category ON book_category.book_category_id=book.book_category_id 
				LEFT JOIN faculty ON faculty.faculty_id = book.faculty_id 
				WHERE book.book_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		// Construire le chemin de la photo
		$photoPath = (!empty($row['book_photo'])) ? '../../AdminDocuments/images/' . $row['book_photo'] : '../../AdminDocuments/images/profile.jpg';

		// Ajouter le chemin de la photo à la réponse JSON
		$row['book_photo_path'] = $photoPath;

		echo json_encode($row);
	}
?>
