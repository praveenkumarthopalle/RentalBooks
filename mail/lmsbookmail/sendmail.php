<?php
include("Smsandemailalerts.php");
		$obj=new Smsandemailalerts();
                
		$to=$_GET["email"];

                $user=$_GET["user"];
                $q=$_GET["quan"];
                $bookname=$_GET["bname"];
                $status=$_GET["status"];
                $hold="hold";
                $book="booked";
                if($status==$hold)
                {

                      $subject="We are sorry";
                $message="Dear ".$user;
		$message="Books are out of stock!!! You are on hold for ".$q." books of ".$bookname;
                
}
                 else if($status==$book)
                 {
                      $subject="Thank You";
                $message="Dear ".$user;
		$message="You are successfully registered for ".$q." books of ".$bookname;

                  }
		
		
		
		$obj->sendemail($to,$subject,$message);
echo" <script> window.history.back();</script>";

?>