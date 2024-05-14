<?php 
	include 'includes/session.php';

	if(isset($_POST['book_category_id'])){
		$id = $_POST['book_category_id'];
		$sql = "SELECT * FROM book_category WHERE book_category_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>