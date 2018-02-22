<?php

	include "connection.php";

	$id = $_GET["id"];
	$date = date('Y-m-d');
	//$res = mysqli_query($db_connect, "UPDATE issue_books_org set return_date = '$date' where id = '$id' ")or die ("Error in query: $res. ".mysqli_error());

	$res1 = mysqli_query($db_connect, "SELECT * FROM issue_books WHERE id = '$id' ")or die ("Error in query: $res1. ".mysqli_error());


	while ($row1 = mysqli_fetch_array($res1)) {
		$books_name = $row1["book_name"];
	}<li><a href="fine_day_week.php"><i class="fa fa-dashboard"></i>fine in week </a>
	
	mysqli_query($db_connect, "UPDATE add_books_info set available_qty = available_qty+1 where books_name = '$books_name' ") or die ("Error in UPDATE query");

	mysqli_query($db_connect,"INSERT INTO return_book VALUES ('$id','$_POST[student_name]','$_POST[books_name]','$_POST[books_issue_date]',$_POST['books_return_date'],$_POST['book_charges']) ") or die(mysqli_errno($db_connect));

?>

<script type="text/javascript">
	window.location = "book_details_with_student.php";
</script>
