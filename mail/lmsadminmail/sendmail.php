<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
                
		$to=$_GET["email"];
                $user=$_GET["type"];
                $bookname=$_GET["bname"];
		$subject="Book Reminder";
                $message="Dear ".$user;
		$message="Please Return The Book ".$bookname;
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>