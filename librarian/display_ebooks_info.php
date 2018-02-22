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
                        <h3>Display Books Info</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Display Books Info</h2>

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

                                    if(isset($_POST["submit1"])){

                                    $res = mysqli_query($db_connect, "SELECT * from add_ebooks_info where books_name like ('$_POST[t1]%')");

                                    echo "<table class='table table-bordered col-md-12'>";

                                    echo "<tr class='bg-info'>";
                                    echo "<th> Books Image </th>";
                                    echo "<th> Books Name </th>";
                                    echo "<th> Books Author name </th>";
                                    echo "<th> Books Publication name"; echo "</th>";
                                    echo "<th> Books Edition </th>";
                                    echo "<th> Books Edition Year </th>";
                                    echo "<th> Read online Link</th>";
                                    echo "<th> Actions </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){
                                        
                                        echo "<tr>";
                                        echo "<td>";
                                            ?>
                                                <img src="<?php echo $row['book_image'] ?>" height="100" width="100">
                                            <?php
                                        echo "</td>";

                                        echo "<td>" . $row['book_name']. "</td>";
                                        echo "<td>" . $row['book_author_name']. "</td>";
                                        echo "<td>" . $row['book_publication']. "</td>";
                                        echo "<td>" . $row['book_edition'] ."</td>";
                                        echo "<td>" . $row['book_edition_year'] ."</td>";
                                        
                                        echo "<td>"; //. $row['pdf_file'] ; 
                                            ?>
                                                <a href="<?php $row['pdf_file_path'];?>" target="_blank"> Read Book [LINK] </a>
                                            <?php
                                        echo "</td>";
                                        
                                        echo "<td>";
                                            ?>
                                                <!-- Performs Edit or Delete actions -->
                                                <a href="edit_ebooks_info.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-warning btn-xs">Edit</button></a> 
                                                <a href="delete_ebooks_info.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger btn-xs">Delete</button></a>

                                            <?php
                                        echo "</td>";
                                        
                                    }

                                    echo "</table>";

                                    }else{

                                    $res = mysqli_query($db_connect, "SELECT * from add_ebooks_info");

                                    echo "<table class='table table-bordered col-md-12'>";

                                    echo "<tr class='bg-info'>";
                                    echo "<th> Books Image </th>";
                                    echo "<th> Books Name </th>";
                                    echo "<th> Books Author name </th>";
                                    echo "<th> Books Publication name"; echo "</th>";
                                    echo "<th> Books Edition </th>";
                                    echo "<th> Books Edition Year </th>";
                                    echo "<th> Read online Link</th>";
                                    echo "<th> Actions </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){
                                        
                                        echo "<tr>";
                                        echo "<td>";
                                            ?>
                                                <img src="<?php echo $row['book_image'] ?>" height="100" width="100">
                                            <?php
                                        echo "</td>";

                                        echo "<td>" . $row['book_name']. "</td>";
                                        echo "<td>" . $row['book_author_name']. "</td>";
                                        echo "<td>" . $row['book_publication']. "</td>";
                                        echo "<td>" . $row['book_edition'] ."</td>";
                                        echo "<td>" . $row['book_edition_year'] ."</td>";
                                        
                                        echo "<td>"; //. $row['pdf_file_path'] ; 
                                            ?>
                                                <a href="<?php echo $row['pdf_file_path'];?>" target="_blank"> Read book [LINK] </a>
                                            <?php
                                        echo "</td>";
                                        
                                        echo "<td>";
                                            ?>
                                                <!-- Performs Edit or Delete actions -->
                                                <a href="edit_ebooks_info.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-warning btn-xs">Edit</button></a> 
                                                <a href="delete_ebooks_info.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger btn-xs">Delete</button></a>

                                            <?php
                                        echo "</td>";
                                        
                                    }

                                    echo "</table>";

                                    } 
                                ?>
                            </div> <!-- x_content cloced here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


<?php
    include "footer.php";
?>