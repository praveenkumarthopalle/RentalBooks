<!DOCTYPE html>
<html lang="en">
<?php
	require("connection.php");
	$query="SELECT `id`, `book_id`, `user_type`, `book_status`, `books_issue_date`, `books_issue_time` FROM `issue_books`
UNION
SELECT `id`, `book_id`, `user_type`, `book_status`, `books_issue_date`, `books_issue_time` FROM `issue_books_org`
ORDER BY `books_issue_date`, `books_issue_time`";

 $row=mysqli_query($db_connect,$query) or die("error in query");
 while($fetch=mysqli_fetch_array($row))
 {
	 $hold="hold";
	 $user1="student";
	 $user2="organization";
	 $id=$fetch["book_id"];
	 $userid=$fetch["id"];
	 if($fetch["book_status"]==$hold)
	 {
		 if($fetch["user_type"]==$user1)
		 {
			 $in_query=mysqli_query($db_connect,"SELECT `available_qty` FROM `add_books_info` WHERE `id`='$id'");
			 $in_fetch=mysqli_fetch_array($in_query);
			 if($in_fetch["available_qty"]>=1)
			 {
				 mysqli_query($db_connect, "UPDATE `add_books_info` set `available_qty`=available_qty-1 WHERE `id`='$id'");
				 $update="booked";
				 mysqli_query($db_connect, "UPDATE `issue_books` set `book_status`='$update' WHERE `id`='$userid'");
				 $qq=mysqli_query($db_connect,"SELECT * FROM `issue_books` WHERE `id`='$userid'");
				 $ff=mysqli_fetch_array($qq);
				 $email=$ff['student_email'];
				 $bname=$ff['books_name'];
				 
				 echo" <script> window.location.href='http://www.tpkumar.com/lmsmail/sendmailbook.php?email=$email&bname=$bname'</script>";
			 }
		 }
		 else if($fetch["user_type"]==$user2)
		 {
			 $in_query=mysqli_query($db_connect,"SELECT `available_qty` FROM `add_books_info` WHERE `id`='$id'");
			 $in_fetch=mysqli_fetch_array($in_query);
			 $in_query2=mysqli_query($db_connect,"SELECT `books_qty` FROM `issue_books_org` WHERE `id`='$userid'");
			 $in_fetch2=mysqli_fetch_array($in_query2);
			 if($in_fetch["available_qty"]>=$in_fetch2["books_qty"])
			 {
				 $diff=$in_fetch["available_qty"]-$in_fetch2["books_qty"];
				 mysqli_query($db_connect, "UPDATE `add_books_info` set `available_qty`='$diff' WHERE `id`='$id'");
				 $update="booked";
				 mysqli_query($db_connect, "UPDATE `issue_books_org` set `book_status`='$update' WHERE `id`='$userid'");
				 $qq=mysqli_query($db_connect,"SELECT * FROM `issue_books_org` WHERE `id`='$userid'");
				 $ff=mysqli_fetch_array($qq);
				 $email=$ff['org_email'];
				 $bname=$ff['book_name'];
				 
				 echo" <script> window.location.href='http://www.tpkumar.com/lmsmail/sendmailbook.php?email=$email&bname=$bname'</script>";
			 }
			 else if($in_fetch["available_qty"]!=0 && $in_fetch["available_qty"]<$in_fetch2["books_qty"])
			 {
				 $diff2=$in_fetch2["books_qty"]-$in_fetch["available_qty"];
				 $avail=$in_fetch["available_qty"];
				 $sel_query=mysqli_query($db_connect,"SELECT * FROM `issue_books_org` WHERE `id`='$userid'");
				 $sel_fetch=mysqli_fetch_array($sel_query);
				 mysqli_query($db_connect, "UPDATE `add_books_info` set `available_qty`=0 WHERE `id`='$id'");
				 $update="booked";
				 mysqli_query($db_connect, "UPDATE `issue_books_org` set `books_qty`='$avail',`book_status`='$update' WHERE `id`='$userid'");
				 
				 $qq=mysqli_query($db_connect,"SELECT * FROM `issue_books_org` WHERE `id`='$userid'");
				 $ff=mysqli_fetch_array($qq);
				 $email=$ff['org_email'];
				 $bname=$ff['book_name'];
				 
				 echo" <script> window.location.href='http://www.tpkumar.com/lmsmail/sendmailbook.php?email=$email&bname=$bname'</script>";
				 
				 mysqli_query($db_connect, "INSERT into `issue_books_org` VALUES('','','$sel_fetch[org_name]','$sel_fetch[org_admin_name]','$sel_fetch[org_contact]','$sel_fetch[org_email]','$sel_fetch[org_url]','$sel_fetch[org_admin_username]','$sel_fetch[book_id]','$sel_fetch[book_name]','$diff2','$sel_fetch[books_issue_date]','$sel_fetch[books_issue_time]','$sel_fetch[return_date]','$sel_fetch[user_type]','$hold','not')");
			 }
			
		 }
	 }
	
	
	
	
 }
 
$status="booked";
$query2=mysqli_query($db_connect,"SELECT * FROM `issue_books`");
$query3=mysqli_query($db_connect,"SELECT * FROM `issue_books_org`");
$date=date('Y-m-d');
while($fetch2=mysqli_fetch_array($query2))
 {
	
	
	$not="not";
	if($fetch2['books_return_date']==$date and $fetch2['return_mail']=='not')
	{
		$email=$fetch2['student_email'];
		$bname=$fetch2['books_name'];
		$id=$fetch2['id'];
		$price=$fetch2['book_charges'];
		$quan=1;
		$date=date('Y-m-d');
		
			$sub_query=mysqli_query($db_connect,"UPDATE `issue_books` set `return_mail`='mailed' WHERE `id`='$id'");
		echo" <script> window.location.href='http://www.tpkumar.com/lmsadminmail/sendmailindex.php?email=$email&date=$date&bname=$bname&quan=$quan&price=$price'</script>";
		
		
		
	}
}
while($fetch3=mysqli_fetch_array($query3))
 {
	
	
	$not="not";
	if($fetch3['return_date']==$date and $fetch3['return_mail']=='not')
	{
		$email=$fetch3['org_email'];
		$bname=$fetch3['book_name'];
		$id=$fetch3['id'];
		$bid=$fetch3['book_id'];
		$quan=$fetch3['books_qty'];
		$sq=mysqli_query($db_connect,"SELECT `books_price` FROM `add_books_info` WHERE `id`='$bid'");
		$srow=mysqli_fetch_array($sq);
		$price=$srow['books_price'];
		$price=$price*$quan;
		$sub_query=mysqli_query($db_connect,"UPDATE `issue_books_org` set `return_mail`='mailed' WHERE `id`='$id'");
		echo" <script> window.location.href='http://www.tpkumar.com/lmsadminmail/sendmailindex.php?email=$email&date=$date&bname=$bname&quan=$quan&price=$price'</script>";
	}
}
?>
<head>
  <title>LMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="librarian/images/favicon.ico" type="image/gif" sizes="16x16"> 
 
	<style>
		
@import url(http://fonts.googleapis.com/css?family=Lato:400,100,900);

@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
body {
background:#e7edde;
/*background-image: url("https://thumbs.dreamstime.com/z/books-seamless-pattern-hand-drawn-background-52609426.jpg");*/
background-image: url("library_books_wall.jpg");
background-size: 100%;
}

h1 {
font-family:Lato, sans-serif;
font-weight:100;
font-size:30px;
text-transform:uppercase;
text-align:center;
color:#444;
padding:30px;
}

.content_wrap {
width:100%;
margin:0 auto;
padding:0;
}

.color-1-bg {
background:#6baba1!important;
}

.color-1-font,.color1-price {
color:#6baba1!important;
}

.color-2-bg {
background:#e0a32e!important;
}

.color-2-font,.color-2-price {
color:#e0a32e!important;
}

.color-3-bg {
background:#e7603b!important;
}

.color-3-font,.color-3-price {
color:#e7603b!important;
}

.color-4-bg {
background:#9ca780!important;
}

.color-4-font,.color-4-price {
color:#9ca780!important;
}
-->
.front,.back {
font-family:Lato, sans-serif;
float:left;
width:220px;
height:220px;
/*
background:#fff;
*/
background: rgba(85, 85, 85, 0.85);
-webkit-border-radius:100%;
-moz-border-radius:100%;
border-radius:100%;
-webkit-box-shadow:0 0 10px 0 #dbdbdb;
box-shadow:0 0 10px 0 #dbdbdb;
-webkit-transition:all .3s ease-in-out;
-moz-transition:all .3s ease-in-out;
-o-transition:all .3s ease-in-out;
-ms-transition:all .3s ease-in-out;
transition:all .3s ease-in-out;
}
.box {
list-style:none;
display:block;
text-align:center;
width:100%;
margin:20px 0 0;
padding:0;
}

.box i {
padding-right:5px;
}

.box > li {
width:220px;
height:220px;
display:inline-block;
margin:8px;
}


.front > div {
text-align:center;
color:#60bad7;
}

.title {

text-transform:uppercase;
text-align:center;
padding:25px 0px 17px;
font-size: 15px;
}

.price span {
font-weight:900;
vertical-align:top;
margin-top:-15px;
display:inline-block;
}

.price .total {
font-size:25px;
}

.currency,.end {
font-size:25px;
}

.description {
text-align:center;
}

.front .description {
color:#9b9b9b!important;
font-size:14px;
padding:4px 45px 0;
}

/* =====[ BACK ELEMENTS ]============================================================================== */

.back .title {
color:#FFF;
}

.back .description ul {
width:55%;
margin:auto;
}

.back .description ul li {
color:#FFF!important;
text-align:left;
list-style:none;
line-height:1.4;
}

.popular {
font-size:30px;
color:#60bad7;
position:absolute;
left:0;
top:0;
opacity:0;
}

/* =====[ CIRCLE ANIMATIONS ]============================================================================== */
<!--
.circle {
border-radius:150px;
-moz-border-radius: 150px;
-webkit-border-radius: 150px;
position:relative;
-webkit-transition:all 1.8s ease-in-out;
-moz-transition:all 1.8s ease-in-out;
-o-transition:all 1.8s ease-in-out;
-ms-transition:all 1.8s ease-in-out;
transition:all 1.8s ease-in-out;
position: absolute;
}

.info {
position:absolute;
border-radius:150px;
-moz-border-radius: 150px;
-webkit-border-radius: 150px;
opacity:0;
-moz-transform:scale(0) rotate(0deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-webkit-transform:scale(0) rotate(0deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-o-transform:scale(0) rotate(0deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-ms-transform:scale(0) rotate(0deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
transform:scale(0) rotate(0deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-webkit-backface-visibility:hidden;
}

.circle:hover .front {
-moz-transform:scale(1.15);
-webkit-transform:scale(1.15);
-o-transform:scale(1.15);
-ms-transform:scale(1.15);
transform:scale(1.15);
opacity:1;
}

.circle:hover .info {
-moz-transform:scale(1) rotate(360deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-webkit-transform:scale(1) rotate(360deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-o-transform:scale(1) rotate(360deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
-ms-transform:scale(1) rotate(360deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
transform:scale(1) rotate(360deg) translateX(0px) translateY(0px) skewX(0deg) skewY(0deg);
opacity:1;
}

.circle:hover .front-popular {
border-radius:10% 50% 50% 50%!important;
}

.circle:hover .popular {
opacity:1;
animation:popularAnim 2s 2;
-webkit-animation:popularAnim 2s 2;
}

@keyframes popularAnim
{
from {opacity:0; left:40px;}
to {opacity:1; left:0;}
}

@-webkit-keyframes popularAnim /* Safari and Chrome */
{
from {opacity:0; left:40px;}
to {opacity:1; left:0;}
}

@-moz-keyframes popularAnim {
from {opacity:0; left:40px;}
to {opacity:1; left:0;}
}
    	
@-ms-keyframes popularAnim {
from {opacity:0; left:40px;}
to {opacity:1; left:0;}
}

.box > li{
*float:left;
}

.circle .back{
*display:none;
}

.circle .back{
z-index:0;
}
.circle .front{
position:relative;
z-index:1;
}
.circle:hover .back{
z-index:1;
}
.circle:hover .front{
position:relative;
z-index:0;
}

.circle:hover .back{
*display:inline;
}
.circle:hover .front{
*display:none;
}-->
	</style>
	
<script type="text/javascript">
setTimeout(function(){
	window.location.reload();
	
},120000);

</script> 
 </head>
 
  <body>
  <section class="content_wrap">
 
  <!-- BEGIN LIST -->
  <ul class="box">
  <!-- BEGIN LIST ELEMENT -->
    <li>
      <div class="circle">
        <div class="front front-popular">
          <div class="title color-1-font glyphicon glyphicon-user"></div>
          <div class="price color-1-font"><span class="total">Library</span></div>
          <div class="description">Library Login</div>
        </div><!-- end div .front -->
        <div class="popular color-1-font glyphicon glyphicon-user"></div>
        <div class="back color-1-bg info">
          <div class="title">Library</div>
          <div class="description">
            
            <a href="librarian/login.php" class="btn btn-danger">Login</a>
          </div><!-- end div .description -->
        </div><!-- end div .back color-1-bg info -->
      </div><!-- end div .circle -->
    </li>
	<li>
      <div class="circle">
        <div class="front front-popular">
          <div class="title color-1-font glyphicon glyphicon-user"></div>
          <div class="price color-1-font"><span class="total">Organization</span></div>
          <div class="description">Organization Login</div>
        </div><!-- end div .front -->
        <div class="popular color-1-font glyphicon glyphicon-user"></div>
        <div class="back color-1-bg info">
          <div class="title">Organization</div>
          <div class="description">
            
            <a href="organization/login.php" class="btn btn-danger">Login</a>
            <a href="organization/SignUp.php" class="btn btn-danger">SignUp</a>
          </div><!-- end div .description -->
        </div><!-- end div .back color-1-bg info -->
      </div><!-- end div .circle -->
    </li>
	<li>
      <div class="circle">
        <div class="front front-popular">
          <div class="title color-1-font glyphicon glyphicon-user"></div>
          <div class="price color-1-font"><span class="total">Student</span></div>
          <div class="description">Student Login</div>
        </div><!-- end div .front -->
        <div class="popular color-1-font glyphicon glyphicon-user"></div>
        <div class="back color-1-bg info">
          <div class="title">Student</div>
          <div class="description">
          
            <a href="Student/login.php" class="btn btn-danger">Login</a>
            <a href="Student/SignUp.php" class="btn btn-danger">SignUp</a>
          </div><!-- end div .description -->
        </div><!-- end div .back color-1-bg info -->
      </div><!-- end div .circle -->
    </li>
</section>   
  <script>
  
  </script>
  </body>
  </html>