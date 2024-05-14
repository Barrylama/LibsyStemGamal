<?php 
	include 'includes/session.php';

	if(isset($_POST['borrow_book_id'])){
		$id = $_POST['borrow_book_id'];
		$sql = "SELECT *, book_borrow.borrow_book_id AS borrowBookId FROM book_borrow
				LEFT JOIN reader ON reader.reader_id = book_borrow.reader_number
				LEFT JOIN book ON book.book_id = book_borrow.book_id
				WHERE book_borrow.borrow_book_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
