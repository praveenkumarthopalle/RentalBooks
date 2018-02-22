<?php
include("Sms.php");
		$obj=new Sms();
                
		$to=$_GET["email"];
                $bookname=$_GET["bname"];
                $date=$_GET["date"];
                
                $subject="Book Reminder";
                $message="Dear User";
		$message="You have to return the book ".$bookname." on ".$date;
                
}
             
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>