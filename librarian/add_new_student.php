<?php
    //session_start();
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>STUDENT REGISTRATION</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
							<div class="x_title">
                                <h2>Student Registration Form</h2>
								<div class="clearfix"></div>
                            </div>
							
                            <div class="x_content">

                                <!--    <section class="login_content" style="margin-top: -40px;">  -->

                                            <form class="form-horizontal" name="form1" action="" method="post">
                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-2">First Nmae </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
                                                    </div>

                                                    <label class="col-md-2">Last Nmae </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2">Semester </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Semester" name="sem" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Enrollment </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollment" required=""/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Contact No: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="contact" name="contact" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Address </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="contact" name="address" required=""/>
                                                    </select>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">
                                                    <label class="col-md-2"> Email Id: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="email" name="email" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Set USERNAME </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder=" Set any Username" name="username" required=""/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Set Password: </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" placeholder="Set Password" name="password" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Confirm Password </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" placeholder="Confirm Password" name="confPassword" required=""/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                
                                                <div class="col-lg-12  col-lg-push-8" style="margin-top: 20px;">
                                                    <input class="btn btn-primary submit " type="submit" name="register" value="Register">
                                                </div>

                                            </form>
                              <!--      </section>  -->


                                        <?php

                                            $added_on = date('Y-m-d');

                                            if(isset($_POST['register'])){
                                                mysqli_query($db_connect,"INSERT into student_registration values('','$_POST[firstname]','$_POST[lastname]','$_POST[sem]','$_POST[enrollment]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[confPassword]','$_POST[contact]','$_POST[address]','$added_on','inactive')");
                                                ?>

                                                    <div class="alert alert-success col-lg-12">
                                                        Registration successful !!!
                                                    </div>

                                                <?php
                                            }
                                        ?>
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