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
                        <h3>ORGANIZATION REGISTRATION</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Organization Registration Form</h2>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="x_content">

                                <!--    <section class="login_content" style="margin-top: -40px;">  -->

                                            <form class="form-horizontal" name="form1" action="" method="post">
                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-2">Organization Name: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g.: college name / academy name" name="orgName" required>
                                                    </div>

                                                    <label class="col-md-2">Organization Admin Nmae: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g.: mark well" name="orgAdmin" required>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Type Of Organization: </label>
                                                    <div class="col-md-4">
                                                      <select class="form-control" name="orgType">
                                                        <option value="0"> -- Select any one -- </option>
                                                        <option value="school">School</option>
                                                        <option value="College">College</option>
                                                        <option value="University">University</option>
                                                        <option value="Academy">Academy</option>
                                                        <option value="IT Training Institute">IT Training Institute</option>
                                                        <option value="IT Company">IT Company</option>
                                                        <option value="Library">Library</option>
                                                      </select>
                                                    </div>

                                                    <label class="col-md-2"> Organization Size: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="orgSize" required=>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Contact No: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="contact" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Address: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="address" required=""/>
                                                    </select>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">
                                                    <label class="col-md-2"> Email Id: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g.: example@email.com" name="orgEmail" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Website URL: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="url" required=""/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <strong> <hr> </strong>

                                                <div class="form-group">
                                                    <label class="col-md-2"> Set admin Username: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g: john0123" name="orgUsername" required=""/>
                                                    </div>

                                                </div>



                                                <!-- ############################################################ -->




                                                <div class="form-group">
                                                    <label class="col-md-2"> Set Password: </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="password" required=""/>
                                                    </div>

                                                    <label class="col-md-2"> Confirm Password </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="confPassword" required=""/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                
                                                <div class="col-lg-12  col-lg-push-8" style="margin-top: 20px;">
                                                    <input class="btn btn-primary submit " type="submit" name="register" value="Register">
                                                </div>

                                            </form>
                              <!--      </section>  -->

                                        <?php



                                            if(isset($_POST['register'])){
                                                $added_on = date('Y/m/d');
                                                mysqli_query($db_connect,"INSERT into organization_registration values('','$_POST[orgName]','$_POST[orgAdmin]','$_POST[orgType]','$_POST[orgSize]','$_POST[contact]','$_POST[address]','$_POST[orgEmail]','$_POST[url]','$_POST[orgUsername]','$_POST[password]','$added_on')");
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