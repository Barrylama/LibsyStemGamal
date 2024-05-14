<?php 
	include 'includes/session.php';

	if(isset($_POST['borrow_review_id'])){
		$id = $_POST['borrow_review_id'];
		$sql = "SELECT *, review_borrow.borrow_review_id AS borrowReviewId FROM review_borrow
				LEFT JOIN reader ON reader.reader_id = review_borrow.reader_id
				LEFT JOIN review ON review.review_id = review_borrow.review_id
				WHERE review_borrow.borrow_review_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
