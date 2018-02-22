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

                                $res = mysqli_query($db_connect, "SELECT * FROM `organization_registration` WHERE id = $id ");

                                $row = mysqli_fetch_array($res);


                            ?>

                                <div class="row">

                                    <div class="col-md-4">
                                        <img src="images/organization.png" alt="user_profile" class="col-md-12 img-responsive img-thumbnail">

                                        <div class="col-xs-12"><hr></div>

                                        <h2 class="text-center text-danger"><?php echo  $row["org_name"]; ?></h2>

                                    </div>

                                    
                                    <div class="col-md-8">

                                    <label class="text-primary"> ORGANIZATION DETAILS  </label> 
                                    <hr>
                                    
                                        <div class="col-md-12">
                                            <label class="col-md-5 control-label"> ORGANIZATION ID </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["id"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-5 control-label"> ORGANIZATION NAME </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["org_name"]; ?> </p> 
                                        </div>


                                        <div class="col-md-12">
                                            <label class="col-md-5"> ORGANIZATION TYPE </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["org_type"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-5"> ORGANIZATION SIZE </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["org_size"]; ?> </p> 
                                        </div>


                                        <div class="col-md-12">
                                            <label class="col-md-5 "> ADDRESS </label> 
                                            <span class="col-md-1"> : </span>
                                            <lable class="col-md-6"> 
                                                    <address class=" bg-info">
                                                        <strong> <?php echo  $row["address"]; ?></strong><br>
                                                        <span>Ph.no.:</span> <?php echo  $row["contact"]; ?>
                                                    </address>
                                            </lable> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-5"> ORGANIZATION EMAIL ID </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["email"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-5"> WEBSITE </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["website_url"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-5"> ORGANIZATION ADDED ON </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["added_on"]; ?> </p> 
                                        </div>

                                            <div class="col-xs-12"><hr></div>
                                            <label class="text-primary"> ORGANIZATION ADMIN DETAILS  </label><hr>


                                        <div class="col-md-12">
                                            <label class="col-md-5"> ADMIN NAME </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <?php echo  $row["org_admin_name"]; ?> </p> 
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-md-5"> ADMIN USERNAME </label> 
                                            <span class="col-md-1"> : </span>
                                            <p class="col-md-6 bg-info"> <a href="mailto:#"><?php echo  $row["username"] ?></a> </p> 
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