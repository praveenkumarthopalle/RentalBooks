<?php

	session_start();

	if(!isset($_SESSION["username"]))
	{
		?>

			<script type="text/javascript">
				window.location = "login.php";
			</script>

		<?php
	}

?>