<?php
    include_once "session_start.php";
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Dashboard</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Admin Dashboard</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php

                                $tbooks = mysqli_query($db_connect, "SELECT * FROM add_books_info");
                                $num_books = mysqli_num_rows($tbooks);

                                $tstudents = mysqli_query($db_connect, "SELECT * FROM student_registration");
                                $num_stu = mysqli_num_rows($tstudents);

                                $torganizations = mysqli_query($db_connect, "SELECT * FROM organization_registration");
                                $num_org = mysqli_num_rows($torganizations);


                            ?>
                                <div class="row"> <!-- widgets row -->

                                  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    
                                    <div class="tile-stats">
                                      <div class="icon"><i class="fa fa-sitemap"></i>
                                      </div>
                                      <div class="count"><?php echo $num_books; ?></div>

                                      <h3>Total Books</h3>
                                      
                                    </div>
                                    
                                  </div>

                                  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                      <div class="icon"><i class="fa fa-user"></i>
                                      </div>
                                      <div class="count"><?php echo $num_stu; ?></div>

                                      <h3>Total Students</h3>
                                      
                                    </div>
                                  </div>
                                  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                      <div class="icon"><i class="fa fa-group"></i>
                                      </div>
                                      <div class="count"><?php echo $num_org; ?></div>

                                      <h3>Total Organizations</h3>
                                      
                                    </div>
                                  </div>

                                </div>  <!-- /widgets row -->
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