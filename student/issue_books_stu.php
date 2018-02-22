<?php
    include "stu_session_start.php";
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
                                
                                <form name="" action="" method="post">    
                                    <?php
                                        if(isset($_SESSION['username'])){
											$un=$_SESSION['username'];
                                            $res5 = mysqli_query($db_connect,"SELECT * FROM student_registration WHERE username ='$un'");

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
                                                             issue date (today):
                                                            <input type="text" class="form-control" name="booksissuedate" value="<?php echo date('Y-m-d'); ?>" placeholder="Books issue date in YYYY-MM-DD format" required>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        
                                                        <td>
                                                            Book Name:
                                                            <select class="form-control selectpicker" name="books_name">
                                                                <?php

$id=$_GET["book_id"];
$res6 = mysqli_query($db_connect, "SELECT books_name FROM add_books_info WHERE id='$id'");
	$row6=mysqli_fetch_array($res6);
	$name=$row6["books_name"];																echo "<option>";
                                                                        echo "$name";
                                                                        echo "</option>";

                                                               

 
                                                                ?>
                                                            </select>
                                                        </td>

                                                    </tr>
<tr>
                                                        <td>
                                                              Book Return date:
                                                            <input  class="form-control" name="booksreturndate" value="<?php echo date('Y-m-d', strtotime("+2 days")); ?>" readonly="readonly" required/>
                                                        </td>
                                                    </tr>


                                                    
                                                    <tr>
                                                        <td>
                                                            <input type="submit" class=" col-lg-6 form-control btn btn-primary" name="submit2" value="SUBMIT"/>
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
										$time=date('H:i:s');
										$id=$_GET["book_id"];
                                        $res = mysqli_query($db_connect,"SELECT * FROM add_books_info WHERE id = '$id' ");
                                        while($row = mysqli_fetch_array($res)){
                                            $qty = $row["available_qty"];
                                            $book_charges = $row["books_price"];

                                            if($qty == 0){
												mysqli_query($db_connect,"INSERT into issue_books VALUES ('','$_SESSION[enrollment_no]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_GET[book_id]','$_POST[books_name]','$_POST[booksissuedate]','$time','$_POST[booksreturndate]','$book_charges','$_SESSION[susername]','student','hold','not','not')");
												?>
                                                <script type="text/javascript">
                                                    alert("Out Of Stock!! You are on hold");

                                                </script>

                                                <?php
$email = $_POST['studentemail'];
$stu="student";
$quan=1;
$bname=$_POST['books_name'];
$status="hold";
echo" <script> window.location.href='http://www.tpkumar.com/lmsbookmail/sendmail.php?email=$email&user=$stu&quan=$quan&bname=$bname&status=$status'</script>";            ?><script>window.location.href = window.location.href ;</script>
										<?php                        
                                            }
                                            else{
												$time=date('H:i:s');
                                                mysqli_query($db_connect,"INSERT into issue_books VALUES ('','$_SESSION[enrollment_no]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_GET[book_id]','$_POST[books_name]','$_POST[booksissuedate]','$time','$_POST[booksreturndate]','$book_charges','$_SESSION[susername]','student','booked','not','not')");
												$id=$_GET["book_id"];
												$query=mysqli_query($db_connect,"SELECT * FROM `add_books_info` WHERE id = '$id'");
												$fetch=mysqli_fetch_array($query);
												if($fetch['books_qty']>=$fetch['available_qty']){
                                                mysqli_query($db_connect,"UPDATE add_books_info SET available_qty = available_qty-1 WHERE books_name = '$_POST[books_name]' ");
                                                }
												else{
													echo "<script>alert('books outof stock')</script>";
												}
												?>
                                                <script type="text/javascript">
                                                    alert("book issued successfully! You must return this book within 3 days. If you not then you will be charged!");
 
                                                </script>

                                                <?php
$email = $_POST['studentemail'];
$stu="student";
$quan=1;
$bname=$_POST['books_name'];
$status="booked";
echo" <script> window.location.href='http://www.tpkumar.com/lmsbookmail/sendmail.php?email=$email&user=$stu&quan=$quan&bname=$bname&status=$status'</script>";    ?><script>
window.location.href = window.location.href ;</script><?php                                                  												

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