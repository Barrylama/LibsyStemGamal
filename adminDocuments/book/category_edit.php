<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$sql = "UPDATE book_category SET name_category_book = '$name' WHERE book_category_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Category updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:category.php');

?>