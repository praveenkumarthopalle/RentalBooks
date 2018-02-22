<?php

    include_once "stu_session_start.php";  
    include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> WELCOME | <?php echo $_SESSION["username"]; ?> </title>

    <link rel="icon" href="images/favicon1.ico" type="image/gif" sizes="16x16"> 
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><img src="images/lms-logo.png" width="100" alt="library management system logo"> <span>LIBRARY </span></a><hr>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/user_pic.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome</span>

                        <h2><?php echo $_SESSION["username"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        
                        <ul class="nav side-menu">
                        
                            <li><a href="mybooks.php"><i class="fa fa-book" aria-hidden="true"></i> Borrowed Books <span class="fa fa-chevron-down"></span></a>
                            </li>

                            <li><a href="search_books.php"><i class="fa fa-search" aria-hidden="true"></i> Search Books <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>

                            <li><a href="search_ebooks.php"><i class="fa fa-search" aria-hidden="true"></i> Search e-Books <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
							

                            <li><a href="suggest_book.php"><i class="fa fa-ticket" aria-hidden="true"></i> Suggest a Book <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
                            
                            <li><a href="requested_books.php"><i class="fa fa-leaf" aria-hidden="true"></i> Requested books <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
                                    
                            <li><a href="message_from_librarian.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Notifications <span
                                    class="fa fa-chevron-down"></span></a>
                            </li>
                            <li><a href="stu_logout.php"><i class="fa fa-power-off" aria-hidden="true"></i><i class="fa fa-sign-out pull-right" aria-hidden="true"></i> Log Out</a></li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">

                                <img src="images/user_pic.png" alt=""><?php echo $_SESSION["username"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li class="bg-info"><a href="stu_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- onclick="window.location='message_from_librarian.php';" -->