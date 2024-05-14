<?php 
	include 'includes/session.php';

	if(isset($_POST['borrow_memory_id'])){
		$id = $_POST['borrow_memory_id'];
		$sql = "SELECT *, memory_borrow.borrow_memory_id AS borrowMemoryId FROM memory_borrow
				LEFT JOIN reader ON reader.reader_id = memory_borrow.reader_id
				LEFT JOIN memory ON memory.memory_id = memory_borrow.memory_id
				WHERE memory_borrow.borrow_memory_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
