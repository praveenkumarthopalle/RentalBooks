<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
		$to=$_GET["email"];
                
		$subject="Registered Successfully";
		$message="Thank You For Registering At LMS";
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>