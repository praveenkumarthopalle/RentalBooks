<?php

	session_start();

	if(!isset($_SESSION["librarian"]))
	{
		?>

			<script type="text/javascript">
				window.location = "login.php";
			</script>

		<?php
	}

?>