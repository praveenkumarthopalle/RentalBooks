<?php
    include "org_session_start.php";
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
											$uname=$_SESSION["username"];
                                            $res5 = mysqli_query($db_connect,"SELECT * FROM organization_registration WHERE `username` = '$uname'");

                                            while($row5 = mysqli_fetch_array($res5)){
                                                
                                                $id = $row5["id"];
                                                $name = $row5["org_name"];
                                                $adminname = $row5["org_admin_name"];
                                                $username = $row5["username"];
                                                $contact = $row5["contact"];
                                                $email = $row5["email"];
                                                $url = $row5["website_url"];
                                                //$_SESSION['id'] = $id;
                                                //$_SESSION['adminusername'] = $username;

                                                ?>

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>
                                                            #Org User id:
                                                            <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" disabled>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Organization Name:
                                                            <input type="text" class="form-control" name="orgname" value="<?php echo $name; ?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Organization Admin Name:
                                                            <input type="text" class="form-control" name="orgadminname" value="<?php echo $adminname; ?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Contact No:
                                                            <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Org. official Email:
                                                            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Org. official Website URL:
                                                            <input type="text" class="form-control" name="url" value="<?php echo $url; ?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Org. Admin Username:
                                                            <input type="text" class="form-control" name="adminusername" value="<?php echo $username; ?>" required>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Book issue date (today):
                                                            <input type="text" class="form-control" name="booksissuedate" value="<?php echo date('Y-m-d'); ?>" required>
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
                                                            Book return date:
                                                            <input type="text" class="form-control" name="booksreturndate" value="<?php echo date('Y-m-d', strtotime("+2 days")); ?>" readonly="readonly" required>
                                                        </td>
                                                    </tr>
													                                                  <tr>
                                                        <td>
                                                            Enter Quantity:
                                                            <input type="number" class="form-control" name="bquantity" value="1" required>
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
										$bquantity=$_POST["bquantity"];
										$time=date('H:i:s');
										$id=$_GET["book_id"];
                                        $res = mysqli_query($db_connect,"SELECT * FROM add_books_info WHERE id = '$id' ");
                                        while($row = mysqli_fetch_array($res)){
                                            $qty = $row["available_qty"];
                                            $book_charges = $row["books_price"];

                                            if($qty == 0){
												mysqli_query($db_connect,"INSERT into issue_books_org VALUES ('','$_POST[id]','$_POST[orgname]','$_POST[orgadminname]','$_POST[contact]','$_POST[email]','$_POST[url]','$_POST[adminusername]','$_GET[book_id]','$_POST[books_name]','$_POST[bquantity]','$_POST[booksissuedate]','$time','$_POST[booksreturndate]','organization','hold','not','not')")or die("error!! Try Again");

                                                ?>

                                                <script type="text/javascript">
                                                    alert(" Out of Stock!! You are on hold!");
                                                    
                                                </script>

                                                <?php
$email = $_POST['email'];
$stu="oranizer";
$quan=$_POST['bquantity'];
$bname=$_POST['books_name'];
$status="hold";
echo" <script> window.location.href='http://www.tpkumar.com/lmsbookmail/sendmail.php?email=$email&user=$stu&quan=$quan&bname=$bname&status=$status'</script>";    ?><script>
window.location.href = window.location.href ;</script><?php

                                            }
											else if($qty<$bquantity)
											{
												$difference=$bquantity-$qty;
												mysqli_query($db_connect,"INSERT into issue_books_org VALUES ('','$_POST[id]','$_POST[orgname]','$_POST[orgadminname]','$_POST[contact]','$_POST[email]','$_POST[url]','$_POST[adminusername]','$_GET[book_id]','$_POST[books_name]','$qty','$_POST[booksissuedate]','$time','','organization','booked','not','not')")or die("error!! Try Again");
												/* Update*/
												mysqli_query($db_connect,"UPDATE add_books_info SET available_qty = 0 WHERE books_name = '$_POST[books_name]' ");
												
												mysqli_query($db_connect,"INSERT into issue_books_org VALUES ('','$_POST[id]','$_POST[orgname]','$_POST[orgadminname]','$_POST[contact]','$_POST[email]','$_POST[url]','$_POST[adminusername]','$_GET[book_id]','$_POST[books_name]','$difference','$_POST[booksissuedate]','$time','$_POST[booksreturndate]','organization','hold','not','not')")or die("error!! Try Again");

                                                ?>

                                                <script type="text/javascript">
                                                    alert(" We don't have full quantity. Some books are on hold!!  You have to return the registered books within 3 days!!");
                                                    
                                                </script>

                                                <?php
$email = $_POST['email'];
$stu="oranizer";
$quan=$difference;
$bname=$_POST['books_name'];
$status="hold";
echo" <script> window.location.href='http://www.tpkumar.com/lmsbookmail/sendmail.php?email=$email&user=$stu&quan=$quan&bname=$bname&status=$status'</script>";    ?><script>
window.location.href = window.location.href ;</script><?php

											}
                                            else{
												$time=date('H:i:s');
                                                mysqli_query($db_connect,"INSERT into issue_books_org VALUES ('','$_POST[id]','$_POST[orgname]','$_POST[orgadminname]','$_POST[contact]','$_POST[email]','$_POST[url]','$_POST[adminusername]','$_GET[book_id]','$_POST[books_name]','$_POST[bquantity]','$_POST[booksissuedate]','$time','$_POST[booksreturndate]','organization','booked','not','not')")or die("error!! Try Again");

                                                mysqli_query($db_connect,"UPDATE add_books_info SET available_qty = available_qty - '$bquantity' WHERE books_name = '$_POST[books_name]' ");
                                                ?>

                                                <script type="text/javascript">
                                                    alert("book issued successfully! You must return this book within 3 days. If you not then you will be charged!");
                                                   
                                                </script>

                                                <?php
$email = $_POST['email'];
$stu="oranizer";
$quan=$difference;
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