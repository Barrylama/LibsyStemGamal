<?php 
	include 'includes/session.php';

	if(isset($_POST['memory_category_id'])){
		$id = $_POST['memory_category_id'];
		$sql = "SELECT * FROM memory_category WHERE memory_category_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>