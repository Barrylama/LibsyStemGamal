<?php 
	include 'includes/session.php';

	if(isset($_POST['consultation_memory_id'])){
		$id = $_POST['consultation_memory_id'];
		$sql = "SELECT *, memory_consultation.consultation_memory_id AS consultationMemoryId FROM memory_consultation
				LEFT JOIN reader ON reader.reader_id = memory_consultation.reader_id
				LEFT JOIN memory ON memory.memory_id = memory_consultation.memory_id
				WHERE memory_consultation.consultation_memory_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
