<?php 
	include 'includes/session.php';

	if(isset($_POST['review_id'])){
		$id = $_POST['review_id'];
		$sql = "SELECT *, review.review_id AS reviewId FROM review 
				LEFT JOIN review_category ON review_category.review_category_id=review.review_category_id 
				LEFT JOIN faculty ON faculty.faculty_id = review.faculty_id 
				WHERE review.review_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		// Construire le chemin de la photo
		$photoPath = (!empty($row['review_photo'])) ? '../../AdminDocuments/images/' . $row['review_photo'] : '../../AdminDocuments/images/profile.jpg';

		// Ajouter le chemin de la photo à la réponse JSON
		$row['review_photo_path'] = $photoPath;

		echo json_encode($row);
	}
?>
