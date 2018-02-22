

<?php

	if(isset($_GET["id"])){

	include "connection.php";

	$id = $_GET["id"];

	mysqli_query($db_connect, "DELETE From add_ebooks_info WHERE id = '$id' ");

?>

	<script type="text/javascript">
		window.location = "display_ebooks_info.php";
	</script>

<?php
}

else{

	?>

	<script type="text/javascript">
		window.location = "display_ebooks_info.php";
	</script>

	<?php
}

?>
