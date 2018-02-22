<?php

	include "session_start.php";
	include "connection.php";

	$id = $_GET['id'];

	mysqli_query($db_connect, "UPDATE suggest_books set status = 'Rejected' where id = $id ");
?>

<script type="text/javascript">
	window.location = "all_requested_books.php";
</script>
