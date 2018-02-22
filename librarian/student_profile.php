<?php
    include_once "session_start.php";
    include "header.php";
    include "connection.php"
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Profile Page</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Profile Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <?php

                                $id = $_GET['id'];

                                $res = mysqli_query($db_connect, "SELECT * FROM `student_registration` WHERE id = $id ");

                                $row = mysqli_fetch_array($res);


                            ?>

                                <div class="row">

                                    <div class="col-md-6">
                                        <img src="images/student_profile.jpg" alt="user_profile" class="col-md-4 col-md-push-4">
                                    </div>

                                    
                                    <div class="col-md-6">
                                    
                                        <div class="col-md-12">
                                            <label class="col-md-3 control-label"> Name </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-8 bg-info"> <?php echo  $row["firstname"]; ?> &nbsp; <?php echo  $row["lastname"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-3"> Enrollment no: </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-8 bg-info"> <?php echo  $row["enrollment_no"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-3"> Semester </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-8 bg-info"> <?php echo  $row["sem"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-3"> email Id </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-8 bg-info"> <?php echo  $row["email"]; ?> </p> 
                                        </div>


                                        <div class="col-md-12">
                                            <label class="col-md-3 "> Address </label> 
                                            <span class="col-md-1"> : </span>
                                            <lable class="col-md-8"> 
                                                    <address class=" bg-info">
                                                        <strong> <?php echo  $row["address"]; ?></strong><br>
                                                        <span>Ph.no.:</span> <?php echo  $row["contact"]; ?>
                                                    </address>
                                            </lable> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-3"> Username </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-8 bg-info"> <a href="mailto:#"><?php echo  $row["username"] ?></a> </p> 
                                        </div>
                                    
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
    include "footer.php";
?>