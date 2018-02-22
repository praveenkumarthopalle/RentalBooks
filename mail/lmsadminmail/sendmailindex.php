<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
                
		$to=$_GET["email"];
                $date=$_GET["date"];
                $bookname=$_GET["bname"];
                $quan=$_GET["quan"];
                $price=$_GET["price"];
		$subject="Book Reminder";
                $message="Dear ".$user;
		$message="Please Return ".$quan." quantity of Book ".$bookname." on ".$date.". If you don't return this book on ".$date." then your check box will be disabled after 5 days and you have to pay the book price $".$price." per every book + $10 per every day for each book. If you reach 5th day then you have to pay $".$price." per every book + $100 fine";
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>