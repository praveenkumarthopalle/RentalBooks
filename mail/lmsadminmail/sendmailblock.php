<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
                
		$to=$_GET["email"];
           
               /* $bookname=$_GET["bname"];
                $quan=$_GET["quan"];
                $price=$_GET["price"];
                $fine=$_GET["fine"];
                $total=$_GET["total"];*/
		$subject="Ckeck Box BlockOut";
                $message="Dear ".$user;
		$message="Your account was disabled for issue books for not returning the issued book(s). Please check your account and return the book(s) with total fine.";
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>