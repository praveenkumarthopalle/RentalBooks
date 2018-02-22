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



                                            <form class="form-horizontal" name="form1" action="" method="post">

                                                <?php

                                                    $id = $_GET['id'];

                                                    $res = mysqli_query($db_connect, "SELECT * FROM `student_registration` WHERE id = $id ");

                                                    $row = mysqli_fetch_array($res);

                                                ?>

                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-2">First Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2">Last Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2">Semester </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="sem" value="<?php echo $row['sem']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> Enrollment </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="enrollment" value="<?php echo $row['enrollment_no']; ?>"  required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Contact No: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="contact"  value="<?php echo $row['contact']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> Address </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="address"  value="<?php echo $row['address']; ?>" required/>
                                                    </select>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">
                                                    <label class="col-md-2"> Email Id: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>"  required/>
                                                    </div>

                                                    <label class="col-md-2"> Set USERNAME </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2"> Set Password: </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" placeholder="Set Password" name="password" required/>
                                                    </div>

                                                    <label class="col-md-2"> Confirm Password </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" placeholder="Confirm Password" name="confPassword" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                
                                                <div class="col-lg-12  col-lg-push-8" style="margin-top: 20px;">
                                                    <input class="btn btn-primary submit " type="submit" name="update" value="Save">
                                                </div>

                                            </form>
                              <!--      </section>  -->


                                        <?php

                                            //$added_on = date('Y-m-d');

                                            if(isset($_POST['update'])){
                                                mysqli_query($db_connect,"UPDATE `student_registration` SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', sem='$_POST[sem]', enrollment_no='$_POST[enrollment]', contact='$_POST[contact]', address='$_POST[address]', email='$_POST[email]', username='$_POST[username]', password='$_POST[password]', conf_password='$_POST[confPassword]' WHERE id = $id ");
                                                ?>

                                                    <div class="alert alert-success col-lg-12">
                                                        <strong>STUDENT</strong> info Updated Successful !!!
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