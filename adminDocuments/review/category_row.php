<?php 
	include 'includes/session.php';

	if(isset($_POST['review_category_id'])){
		$id = $_POST['review_category_id'];
		$sql = "SELECT * FROM review_category WHERE review_category_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>