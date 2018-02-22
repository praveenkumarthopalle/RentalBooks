<?php

	include "connection.php";

	$id = $_GET["id"];
	$date = date('Y-m-d');
	$res = mysqli_query($db_connect, "UPDATE issue_books_org set return_date = '$date' where id = '$id' ")or die ("Error in query: $res. ".mysqli_error());

	$res1 = mysqli_query($db_connect, "SELECT * FROM issue_books_org WHERE id = '$id' ")or die ("Error in query: $res1. ".mysqli_error());


	while ($row1 = mysqli_fetch_array($res1)) {
		$books_name = $row1["book_name"];
	}

	mysqli_query($db_connect, "UPDATE add_books_info set available_qty = available_qty+1 where books_name = '$books_name' ") or die ("Error in UPDATE query");

	mysqli_query($db_connect, "DELETE FROM issue_books_org where id = '$id' ") or die ("Error in DELETE query: __ . " . mysqli_error());

?>

<script type="text/javascript">
	window.location = "book_details_with_student.php";
</script>
