<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
                 
		$email=explode(',',$_GET["email"]);
                
                $books=explode(',',$_GET["bname"]);
                
                $i=0;
                $count=count($email);
                while($i<$count)
                {
                   $to=$email[$i];
                   $bname=$books[$i];
                   $subject="Book Remainder";
		   $message="You have a fine on this book ".$bname.". dont Return this book immediately";
		
		
		$obj->sendemail($to,$subject,$message);
                   $i=$i+1;
                }
		
echo" <script> window.history.back();</script>";

?>