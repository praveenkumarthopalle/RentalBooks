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
                                                <select name="id" class="form-control selectpicker">
                                                    <?php
                                                        $res = mysqli_query($db_connect, "SELECT * FROM organization_registration");

                                                        while ($row = mysqli_fetch_array($res)) {
                                                            $name = $row['org_name'];
                                                            ?><option value="<?php echo $row['id']; ?>"><?php
                                                            echo "#".$row['id']. "   (" . $name . ")";
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
                                            $res5 = mysqli_query($db_connect,"SELECT * FROM organization_registration WHERE id = '$_POST[id]'");

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

                                                mysqli_query($db_connect,"INSERT into issue_books_org VALUES ('','$_POST[id]','$_POST[orgname]','$_POST[orgadminname]','$_POST[contact]','$_POST[email]','$_POST[url]','$_POST[adminusername]','$_POST[books_name]','$_POST[booksissuedate]','','organization')")or die("book not isued");

                                                mysqli_query($db_connect,"UPDATE add_books_info SET available_qty = available_qty-1 WHERE books_name = '$_POST[books_name]' ");
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