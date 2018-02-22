<?php
$type = $_GET['type'];
$email = $_GET['email'];
$bookname= $_GET['bname'];
echo" <script> window.location.href='http://www.tpkumar.com/lmsadminmail/sendmail.php?email=$email&type=$type&bname=$bookname'</script>";

?>