<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
		$to=$_GET["email"];
                $bname=$_GET["bname"];
		$subject="Notification";
		$message="Now the book ".$bname." is available for you";
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>