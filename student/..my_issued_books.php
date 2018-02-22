<?php
    
    include_once "stu_session_start.php";
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>My Borrowd/issued Books</h3>
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
                                <h2>My Borrowd/issued Books List</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    
                                    <tr>
                                        
                                        <th> Student Enrollment No. </th>
                                        <th> Student Name</th>
                                        <th> Borrowed Books Name </th>
                                        <th> Books Issued Date </th>

                                    </tr>

                                    <?php
                                        $res = mysqli_query($db_connect, "SELECT * FROM issue_books WHERE student_user_name = '$_SESSION[username]' ");

                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            //echo "<td>" . $row[''] . "</td>";
                                            echo "<td>" . $row['student_enrollment'] . "</td>";
                                            echo "<td>" . $row['student_name'] . "</td>";
                                            echo "<td>" . $row['books_name'] . "</td>";
                                            echo "<td>" . $row['books_issue_date'] . "</td>";
                                            //echo "<td>" . $row[''] . "</td>";
                                            echo "</tr>";
                                        }
                                    ?>

                                </table>
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