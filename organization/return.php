<?php

	include "connection.php";

	

	$id = $_GET["id"];
	$quan = $_GET["bquan"];
	$book_id = $_GET["bid"];
	$book_name = $_GET["bname"];
	$date = date('Y-m-d');

	mysqli_query($db_connect, "UPDATE add_books_info set available_qty = available_qty+'$quan' where id = '$book_id' ") or die ("Error in UPDATE query: . ".mysqli_error());

	mysqli_query($db_connect, "DELETE FROM issue_books_org where id = '$id' ") or die ("Error in DELETE query: __ . " . mysqli_error());

?>

<script type="text/javascript">
	window.location = "mybooks.php";
</script>