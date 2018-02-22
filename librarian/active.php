<?php
	include "session_start.php";
	include "connection.php";

	$id = $_GET['id'];

	mysqli_query($db_connect, "UPDATE student_registration set status = 'active' where id = $id ");
	unset($_SESSION["$id"]);
?>

<script type="text/javascript">
	window.location = "display_student_info.php";
</script>
