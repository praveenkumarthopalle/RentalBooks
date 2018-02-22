<?php

    include_once "session_start.php";
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Borrowed Books List </h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Student List who borrowed <span style="color: green">this</span> book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <?php

                                    $res = mysqli_query($db_connect, "SELECT * FROM issue_books WHERE books_name = '$_GET[books_name]' ");

                                    echo "<table class='table table-bordered'>";

                                    echo "<tr class='bg-info'>";
                                    echo "<th>"; echo "student name"; echo "</th>";
                                    echo "<th>"; echo "student enrollment"; echo "</th>";
                                    echo "<th>"; echo "books name"; echo "</th>";
                                    echo "<th>"; echo "student email"; echo "</th>";
                                    echo "<th>"; echo "student contact"; echo "</th>";
                                    echo "<th>"; echo "book issue date to student"; echo "</th>";
									 echo "</th>";
									 echo "<th>"; echo "Book Status"; echo "</th>";
                                    echo "<th> ACTIONS </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){

                                        echo "<tr>";
                                        echo "<td>"; echo $row['student_name']; echo "</td>";
                                        echo "<td>"; echo $row['student_enrollment']; echo "</td>";
                                        echo "<td>"; echo $row['books_name']; echo "</td>";
                                        echo "<td>"; echo $row['student_email']; echo "</td>";
                                        echo "<td>"; echo $row['student_contact']; echo "</td>";
                                        echo "<td>"; echo $row['books_issue_date']; echo "</td>";
										echo "<td>"; echo $row['book_status']; echo "</td>";
                                        echo "<td>"; 
                                            ?>
                                                <a href="return_book_email.php?type=<?php echo $row["user_type"]; ?>&email=<?php echo $row["student_email"]; ?>
												&bname=<?php echo $row["books_name"]; ?>">
                                                    <button type="button" class="btn btn-danger">Return this Book</button>
                                                </a>
                                            <?php
                                        echo "</td>";
                                                                               
                                    }

                                    echo "</table>";


                                ?>

                                <!-- -->
                                <?php

                                    $res1 = mysqli_query($db_connect, "SELECT * FROM issue_books_org WHERE book_name = '$_GET[books_name]' ");

                                    echo "<table class='table table-bordered'>";

                                    echo "<tr class='bg-info'>";
                                    echo "<th> Org. User #id </th>";
                                    echo "<th> Org. Name </th>";
                                    echo "<th> Issued Books Name </th>";
                                    echo "<th> Org. E-mail Id </th>";
                                    echo "<th> Org. Contact </th>";
                                    echo "<th> Book issue date Of Organization</th>";
									echo "<th> Book Status</th>";
                                    echo "<th> ACTIONS </th>";
                                    echo "</tr>";

                                    while($row1 = mysqli_fetch_array($res1)){

                                        echo "<tr>";
                                        echo "<td>" . $row1['org_user_id']."</td>";
                                        echo "<td>" . $row1['org_name']."</td>";
                                        echo "<td>" . $row1['book_name']."</td>";
                                        echo "<td>" . $row1['org_email']."</td>";
                                        echo "<td>" . $row1['org_contact']."</td>";
                                        echo "<td>" . $row1['issue_date']."</td>";
										echo "<td>" . $row1['book_status']."</td>";
                                        echo "<td>"; 
                                            ?>
                                                <a href="return_book_now.php?id=<?php echo $row1["id"]; ?>">
                                                    <button type="button" class="btn btn-danger">Ok Return this Book</button>
                                                </a>
                                            <?php
                                        echo "</td>";
                                                                               
                                    }

                                    echo "</table>";


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