<?php 
	include 'includes/session.php';

	if(isset($_POST['reader_id'])){
		$id = $_POST['reader_id'];
		$sql = "SELECT *, reader.reader_id AS readId FROM reader LEFT JOIN reader_category ON reader_category.reader_category_id=reader.reader_category_id LEFT JOIN gender ON gender.gender_id = reader.gender_id WHERE reader.reader_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>