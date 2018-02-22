

<?php

	if(isset($_GET["id"])){

	include "connection.php";

	$id = $_GET["id"];

	mysqli_query($db_connect, "DELETE From student_registration WHERE id = '$id' ");

?>

	<script type="text/javascript">
		window.location = "display_student_info.php";
	</script>

<?php
}

else{

	?>

	<script type="text/javascript">
		window.location = "display_student_info.php";
	</script>

	<?php
}

?>
