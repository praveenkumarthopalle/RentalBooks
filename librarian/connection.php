<?php

	$db_connect = mysqli_connect("localhost","root","")or die ("Error in DB connection: $db_connect. " . mysqli_error());
	mysqli_select_db($db_connect,"lms");

?>