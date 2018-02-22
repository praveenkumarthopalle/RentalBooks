<?php

	include "connection.php";

	

	$id = $_GET["id"];
	$date = date('Y-m-d');
	$res = mysqli_query($db_connect, "UPDATE issue_books set books_return_date = '$date' where id = '$id' ")or die ("Error in query: $res. ".mysqli_error());
	
	$res1 = mysqli_query($db_connect, "SELECT * FROM issue_books WHERE id = '$id' ")or die ("Error in query: $res1. ".mysqli_error());

	//$books_name = " ";



	while ($row1 = mysqli_fetch_array($res1)) {
		$books_name = $row1["books_name"];
		$student_name = $row1["student_name"];
		$books_issue_date = $row1["books_issue_date"];
		$books_return_date = $row1["books_return_date"];
		$book_charges = $row1["book_charges"];
	}

	mysqli_query($db_connect, "UPDATE add_books_info set available_qty = available_qty+1 where books_name = '$books_name' ") or die ("Error in UPDATE query: . ".mysqli_error());
	
	mysqli_query($db_connect, "INSERT into return_book VALUES ('$id','$student_name','$books_name','$books_issue_date',
	'$books_return_date','$book_charges')")or die("Error in INSERT query: . ".mysqli_error());

	mysqli_query($db_connect, "DELETE FROM issue_books where id = '$id' ") or die ("Error in DELETE query: __ . " . mysqli_error());

?>

<script type="text/javascript">
	window.location = "mybooks.php";
</script>