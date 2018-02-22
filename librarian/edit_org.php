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

                                <?php

                                    $id = $_GET['id'];

                                    $res = mysqli_query($db_connect, "SELECT * FROM `organization_registration` WHERE id = $id ");

                                    $row = mysqli_fetch_array($res);

                                    
                                ?>

                                            <form class="form-horizontal" name="form1" action="" method="post">
                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-2">Organization Name: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="orgName" value="<?php echo $row['org_name'];?>" required>
                                                    </div>

                                                    <label class="col-md-2">Organization Admin Nmae: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="orgAdmin" value="<?php echo $row['org_admin_name'];?>" required>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Type Of Organization: </label>
                                                    <div class="col-md-4">
                                                      <select class="form-control" name="orgType">
                                                        <option value="<?php $row['org_admin_name'];?>"> <?php echo $row['org_type'];?> </option>
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
                                                        <input type="text" class="form-control" name="orgSize" value="<?php echo $row['org_size'];?>" required>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Contact No: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="contact" value="<?php echo $row['contact'];?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> Address: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>" required/>
                                                    </select>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">
                                                    <label class="col-md-2"> Email Id: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="orgEmail" value="<?php echo $row['email'];?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> Website URL: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="url" value="<?php echo $row['website_url'];?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <strong> <hr> </strong>

                                                <div class="form-group">
                                                    <label class="col-md-2"> Set admin Username: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="orgUsername" value="<?php echo $row['username'];?>" required/>
                                                    </div>

                                                </div>



                                                <!-- ############################################################ -->




                                                <div class="form-group">
                                                    <label class="col-md-2"> Set Password: </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="password" required/>
                                                    </div>

                                                    <label class="col-md-2"> Confirm Password </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="confPassword" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->
                                                <div class="col-lg-12 col-md-12 col-xs-12">

                                                    <div class="col-md-6" style="margin-top: 20px;">
                                                        <button class="btn btn-warning btn-cancel" name="cancel"><a class="display_organization_info.php">Cancel</a></button>
                                                    
                                                    
                                                        <input class="btn btn-primary submit " type="submit" name="update" value="SAVE">
                                                    </div>

                                                </div>
                                            </form>
                              <!--      </section>  -->

                                        <?php


                                            if (isset($_POST['update'])) {
                                                mysqli_query($db_connect,"UPDATE `organization_registration` SET org_name='$_POST[orgName]',org_admin_name='$_POST[orgAdmin]',org_type='$_POST[orgType]',org_size='$_POST[orgSize]',contact='$_POST[contact]',address='$_POST[address]',email='$_POST[orgEmail]',website_url='$_POST[url]',username='$_POST[orgUsername]',password='$_POST[password]' WHERE id = $id ");
                                            
                                                ?>

                                                    <div class="alert alert-success col-lg-12">
                                                        <stron><?php echo $row['org_name']; ?></stron> &nbsp; information Updated successful !!!
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