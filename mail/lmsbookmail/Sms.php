<?php

class Sms
{  
  
   function sendemail($to,$subject,$message)
   {
        $headers = "MIME-Version: 1.0\nContent-type:text/html;charset=UTF-8" . "\r\n";
        $headers.= 'From: noreply@tpkumar.com'."\r\n".'X-Mailer: PHP/' . phpversion();  
        $result=mail($to, $subject, $message, $headers);
        return $result;
   }
}

?>