<?php
    include_once "session_start.php";
    include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome | <?php echo $_SESSION["librarian"]; ?> </title>

    <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16"> 
    
    

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

    <style>
      .flipInY, .count, i{
        color:#1ABB9C;
      }
    </style>
    
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><img src="images/lms-logo.png" width="100" alt="library management system logo"> <span>LIBRARY </span></a><hr></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/admin.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome to LMS</span>

                        <h2><?php echo $_SESSION["librarian"]; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">

                             <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard </a>
                            </li>

                            <li><a><i class="fa fa-users"></i>Manage Students <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="display_student_info.php"> List of all Students </a></li>
                                <!--    <li><a href="add_new_student.php"> Add new Students </a></li>-->
                                </ul>
                            </li>

                            <li><a><i class="fa fa-users"></i>Manage Organizations <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="display_organization_info.php"> List of all Organization </a></li>
                                   <!-- <li><a href="add_new_organization.php"> Add new Organization </a></li>-->
                                </ul>
                            </li>

                            <li><a><i class="fa fa-book"></i>Manage Books <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="display_books_info.php"> List of all Books </a></li>
                                    <li><a href="add_books_info.php"> Add new Book </a></li>
                                    <li><a href="display_ebooks_info.php"> List Of e-Books </a></li>
                                    <li><a href="add_ebooks_info.php"> Add new e-Book </a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-spinner"></i> Book Circulation <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                   
                                    <li><a href="book_details_with_student.php">Issued Books list </a></li>
                                    <!--
                                    <li><a href="return_book.php"> Return Book </span></a></li>
                                    -->
                                    <li><a href="all_requested_books.php"> Requested Books </a></li>
                                </ul>
                            </li>

							<li><a href="fine_perday.php"><i class="fa fa-spinner"></i>fine per day </a>
							
							<li><a href="fine_day_week.php"><i class="fa fa-dashboard"></i>fine in week </a>
							
							<li><a href="returnbook_report.php"><i class="fa fa-spinner"></i>returned books </a>
                            <li><a href="unavailableBooks.php"><i class="fa fa-dashboard"></i>unvaliable books </a>

                            

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
                                <img src="images/admin.png" alt=""><?php echo $_SESSION["librarian"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->