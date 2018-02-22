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
                        <h3> Return Books</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> Return Books</h2>

                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <table class="table table-bordered bg-info">
                                        <tr>
                                            <td>
                                                <select name="enr" class="form-control selectpicker">
                                                    <?php
                                                        $res = mysqli_query($db_connect, "SELECT * from student_registration");

                                                        ?>
                                                            <option value="0">Select any one</option>
                                                        <?php

                                                        /* 
                                                            some error i.e., showing all the previous isseued books due to similar 
                                                            student_enrollment value in issue_books
                                                            ---------------------------------------------------------------------
                                                            So we need to add some sql-query to fetch the values of only present issued books only
                                                        */

                                                        while ($row = mysqli_fetch_array($res)) {
                                                            ?>

                                                            <option value="<?php echo $row['enrollment_no']; ?>"> 
                                                                <?php
                                                                   echo $row["enrollment_no"] ."  :  ". $row["firstname"]. " " .$row["lastname"] ;
                                                                ?>
                                                            </option>";
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name="submit1" value="search" class="form-control btn btn-info">
                                            </td>
                                        </tr>
                                    </table>                                    
                                </form>


                                <?php


                                    if(isset($_POST['submit1'])){
                                        $res = mysqli_query($db_connect, "SELECT * FROM issue_books where student_enrollment = '$_POST[enr]' ");


                                        $row = mysqli_fetch_array($res);
                                        echo "<center><span class='btn btn-primary'><h2>";
                                        echo "<b> Books Borrowed By </b>" ."  :  ". strtoupper($row["student_name"]) ;
                                        echo "</h2></span></center>";

                                        echo "<table class='table table-bordered'>";
                                        echo "<tr class='bg-info'>";
                                        echo "<th> Student enrollment </th>";
                                        echo "<th> Student name </th>";
                                        echo "<th> Student sem </th>";
                                        echo "<th> Student contact </th>";
                                        echo "<th> Student email </th>";
                                        echo "<th> Book name </th>";
                                        echo "<th> Book issue Date </th>";
                                        echo "<th> Actions </th>";
                                        echo "</tr>";

                                        while($row = mysqli_fetch_array($res)){
                                            echo "<tr>";
                                            echo "<td>"; echo $row['student_enrollment']; echo "</td>";
                                            echo "<td>". $row["student_name"] . "</td>";
                                            echo "<td>". $row["student_sem"] . "</td>";
                                            echo "<td>". $row["student_contact"] . "</td>";
                                            echo "<td>". $row["student_email"] . "</td>";
                                            echo "<td>". $row["books_name"] . "</td>";
                                            echo "<td>". $row["books_issue_date"] . "</td>";
                                            echo "<td>"; 
                                                ?>
                                                <a href="return_book_now.php?id=<?php echo $row["id"]; ?>">
                                                    <button type="button" class="btn btn-danger">Ok Return this Book</button>
                                                </a>
                                                <?php
                                            echo "</td>";
                                            echo "</tr>";
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

        <!--

            <a href="return.php?id=<?php //echo $row["id"]; ?>">
                <button type="button" class="btn btn-danger">Ok Return this Book</button>
            </a>

        -->
<?php
    include "footer.php";
?>