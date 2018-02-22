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
                        <h3>Student Borrowed Book Details</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Student Borrowed Book Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            
                                <form name="searchForm" action="" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><input type="text" name="t1" class="form-control" placeholder="enter book name to search"></td>
                                            <td><input type="submit" name="submit1" value="search book" class="btn btn-success"></td>
                                        </tr>
                                    </table>            
                                </form>

                                
                                <?php
                                    
                                    $i=0;
                                    $res = mysqli_query($db_connect, "SELECT * from add_books_info where books_name like ('$_POST[t1]%') ");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    while($row = mysqli_fetch_array($res)){
                                        $i = $i+1;
                                        $issued_books = $row["books_qty"] - $row["available_qty"];
                                        echo "<td width='33%' style='color: red;'>";
                                        echo "<table class='table'>";
                                        ?>
                                            <tr><td>
                                            <img src="../librarian/<?php echo $row["books_image"];?>" height="120">
                                            </td>

                                        <?php
                                            echo "<td>";
                                            echo "<b> Book Title: <span style='color:blue;'>".$row["books_name"]."</span></b>"; // book name or title
                                            echo "<br><br>";

                                            echo "<b> Total Books: <span style='color:green; font-size: 2em'>".$row["available_qty"]."/".$row["books_qty"]."</span></b>"; // total books 
                                            echo "<br>";

                                            ?>
                                                <!-- Link to view readers who borrowed this book -->
                                                <b> Books issued:
                                                <a href="all_student_of_this_books.php?books_name=<?php echo $row["books_name"]; ?>"><span style='color:green; font-size: 2em'> <?php echo $issued_books ?></span> 
                                                </a>
                                                </b>

                                            <?php

                                            echo "<br>";
                                            ?>
                                                <!-- Link to view readers who borrowed this book -->
                                                <a href="all_student_of_this_books.php?books_name=<?php echo $row["books_name"]; ?>"><span style="text-decoration: underline; color:blue;"><i class="fa fa-link"></i> &nbsp; Who borrowed this book </span></a>

                                            <?php
                                        echo "</td></tr></table>";
                                        echo "</td>";
                                        if($i==3){
                                            echo "</tr>";
                                            echo "<tr>";
                                            $i = 0;
                                        }
                                    }
                                    echo "</tr>";
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