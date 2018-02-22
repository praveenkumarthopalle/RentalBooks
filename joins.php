<html><?php
require("connection.php");
$query="SELECT `id`, `book_id`, `user_type`, `book_status`, `books_issue_date`, `books_issue_time` FROM `issue_books`
UNION
SELECT `id`, `book_id`, `user_type`, `book_status`, `books_issue_date`, `books_issue_time` FROM `issue_books_org`
ORDER BY `books_issue_date`, `books_issue_time`";

 $row=mysqli_query($db_connect,$query) or die("error in query");
 while($fetch=mysqli_fetch_array($row))
 {
	 $hold="hold";
	 $user1="student";
	 $user2="organization";
	 $id=$fetch["book_id"];
	 $userid=$fetch["id"];
	 if($fetch["book_status"]==$hold)
	 {
		 if($fetch["user_type"]==$user1)
		 {
			 $in_query=mysqli_query($db_connect,"SELECT `available_qty` FROM `add_books_info` WHERE `id`='$id'");
			 $in_fetch=mysqli_fetch_array($in_query);
			 if($in_fetch["available_qty"]>=1)
			 {
				 mysqli_query($db_connect, "UPDATE `add_books_info` set `available_qty`=available_qty-1 WHERE `id`='$id'");
				 $update="booked";
				 mysqli_query($db_connect, "UPDATE `issue_books` set `book_status`='$update' WHERE `id`='$userid'");
			 }
		 }
		 else if($fetch["user_type"]==$user2)
		 {
			 $in_query=mysqli_query($db_connect,"SELECT `available_qty` FROM `add_books_info` WHERE `id`='$id'");
			 $in_fetch=mysqli_fetch_array($in_query);
			 $in_query2=mysqli_query($db_connect,"SELECT `books_qty` FROM `issue_books_org` WHERE `id`='$userid'");
			 $in_fetch2=mysqli_fetch_array($in_query2);
			 if($in_fetch["available_qty"]>=$in_fetch2["books_qty"])
			 {
				 $diff=$in_fetch["available_qty"]-$in_fetch2["books_qty"];
				 mysqli_query($db_connect, "UPDATE `add_books_info` set `available_qty`='$diff' WHERE `id`='$id'");
				 $update="booked";
				 mysqli_query($db_connect, "UPDATE `issue_books_org` set `book_status`='$update' WHERE `id`='$userid'");
			 }
			
		 }
	 }
	
	
	
	
 }
 

?>
</html>