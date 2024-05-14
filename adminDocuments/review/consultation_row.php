<?php 
	include 'includes/session.php';

	if(isset($_POST['consultation_review_id'])){
		$id = $_POST['consultation_review_id'];
		$sql = "SELECT *, review_consultation.consultation_review_id AS consultationReviewId FROM review_consultation
				LEFT JOIN reader ON reader.reader_id = review_consultation.reader_id
				LEFT JOIN review ON review.review_id = review_consultation.review_id
				WHERE review_consultation.consultation_review_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
