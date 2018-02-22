<?php

	include "session_start.php";
	include "connection.php";

	$id = $_GET['id'];

	$res=mysqli_query($db_connect, "UPDATE student_registration set status = 'inactive' where id = $id ");
	
?>

<script type="text/javascript">
	window.location = "display_student_info.php";
</script>
