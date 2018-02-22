<?php
    include "session_start.php";
    include "connection.php";
    include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Issue Books</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Issue Books</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <select name="err" class="form-control selectpicker">
                                                    <?php
                                                        $res = mysqli_query($db_connect, "SELECT * FROM student_registration");
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            $name = $row['firstname']." ".$row['lastname'];
                                                            ?><option value="<?php echo $row['enrollment_no']; ?>"><?php
                                                            echo $row['enrollment_no']. "  (" . $name . ")";
                                                            echo "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name="submit1" class="form-control btn btn-primary">
                                            </td>
                                        </tr>
                                    </table>

                                    <?php
                                        if(isset($_POST['submit1'])){
                                            $res5 = mysqli_query($db_connect,"SELECT * FROM student_registration WHERE enrollment_no = '$_POST[err]'");

                                            while($row5 = mysqli_fetch_array($res5)){
                                                
                                                $firstname = $row5["firstname"];
                                                $lastname = $row5["lastname"];
                                                $username = $row5["username"];
                                                $email = $row5["email"];
                                                $contact = $row5["contact"];
                                                $sem = $row5["sem"];
                                                $enrollment_no = $row5["enrollment_no"];
                                                $_SESSION['enrollment_no'] = $enrollment_no;
                                                $_SESSION['susername'] = $username;

                                                ?>

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            Enrollment No:
                                                            <input type="text" class="form-control" name="enrollment_no" value="<?php echo $enrollment_no; ?>" placeholder="enrollment_no" disabled>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Student Name:
                                                            <input type="text" class="form-control" name="studentname" value="<?php echo $firstname . ' ' . $lastname; ?>" placeholder="studentname" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Student Sem:
                                                            <input type="text" class="form-control" name="studentsem" value="<?php echo $sem; ?>" placeholder="student sem" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Student Contact No:
                                                            <input type="text" class="form-control" name="studentcontact" value="<?php echo $contact; ?>" placeholder="student contact" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Student Email:
                                                            <input type="text" class="form-control" name="studentemail" value="<?php echo $email; ?>" placeholder="student email" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Student Username:
                                                            <input type="text" class="form-control" name="studentusername" value="<?php echo $username; ?>" placeholder="student username" disabled>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Book issue date (today):
                                                            <input type="text" class="form-control" name="booksissuedate" value="<?php echo date('Y-m-d'); ?>" placeholder="Books issue date in YYYY-MM-DD format" required>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        
                                                        <td>
                                                            Select Book to issue:
                                                            <select class="form-control selectpicker" name="books_name">
                                                                <?php

                                                                    $res6 = mysqli_query($db_connect, "SELECT books_name FROM add_books_info");

                                                                    while($row6 = mysqli_fetch_array($res6)){
                                                                        echo "<option>";
                                                                        echo $row6['books_name'];
                                                                        echo "</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </td>

                                                    </tr>


                                                    
                                                    <tr>
                                                        <td>
                                                            <input type="submit" class=" col-lg-6 form-control btn btn-primary" name="submit2" value="issue book">
                                                        </td>
                                                    </tr>

                                                </table>

                                                <?php
                                            }
                                        }
                                    ?>

                                </form>

                                <?php

                                    if(isset($_POST['submit2'])){

                                        $qty = 0;

                                        $res = mysqli_query($db_connect,"SELECT * FROM add_books_info WHERE books_name = '$_POST[books_name]' ");
                                        while($row = mysqli_fetch_array($res)){
                                            $qty = $row["available_qty"];
                                            $book_charges = $row["books_price"];

                                            if($qty == 0){
                                                ?>
                                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                                        <strong>This BOOK is not available in the stock</strong>
                                                    </div>
                                                <?php
                                            }
                                            else{

                                                mysqli_query($db_connect,"INSERT into issue_books VALUES ('','$_SESSION[enrollment_no]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[books_name]','$_POST[booksissuedate]','','$book_charges','$_SESSION[susername]','student')");
												$query=mysqli_query($db_connect,"SELECT * FROM `add_books_info` WHERE books_name = '$_POST[books_name]'");
												$fetch=mysqli_fetch_array($query);
												if($fetch['books_qty']>=$fetch['available_qty']){
                                                mysqli_query($db_connect,"UPDATE add_books_info SET available_qty = available_qty-1 WHERE books_name = '$_POST[books_name]' ");
                                                }
												else{
													echo "<script>alert('books outof stock')</script>";
												}
												?>
                                                <script type="text/javascript">
                                                    alert("book issued successfully!");
                                                    window.location.href = window.location.href ;
                                                </script>

                                                <?php

                                            }
                                        }
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