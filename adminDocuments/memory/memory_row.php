<?php 
	include 'includes/session.php';

	if(isset($_POST['memory_id'])){
		$id = $_POST['memory_id'];
		$sql = "SELECT *, memory.memory_id AS memoryId FROM memory 
				LEFT JOIN memory_category ON memory_category.memory_category_id=memory.memory_category_id 
				LEFT JOIN faculty ON faculty.faculty_id = memory.faculty_id 
				WHERE memory.memory_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		// Construire le chemin de la photo
		$photoPath = (!empty($row['memory_photo'])) ? '../images/' . $row['memory_photo'] : '../images/profile.jpg';

		// Ajouter le chemin de la photo à la réponse JSON
		$row['memory_photo_path'] = $photoPath;

		echo json_encode($row);
	}
?>
