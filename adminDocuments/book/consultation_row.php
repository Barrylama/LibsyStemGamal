<?php 
	include 'includes/session.php';

	if(isset($_POST['consultation_book_id'])){
		$id = $_POST['consultation_book_id'];
		$sql = "SELECT *, book_consultation.consultation_book_id AS consultationBookId FROM book_consultation
				LEFT JOIN reader ON reader.reader_id = book_consultation.reader_id
				LEFT JOIN book ON book.book_id = book_consultation.book_id
				WHERE book_consultation.consultation_book_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
