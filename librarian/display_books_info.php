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

                                        $res = mysqli_query($db_connect, "SELECT * from add_books_info where books_name like ('$_POST[t1]%')");

                                    echo "<table class='table col-md-12'>";

                                    echo "<tr class='bg-info'>";
                                    echo "<th> books image </th>";
                                    echo "<th> books name </th>";
                                    echo "<th> books author name </th>";
                                    echo "<th> books publication name"; echo "</th>";
                                    echo "<th> books price </th>";
                                    echo "<th> books quantity </th>";
                                    echo "<th> no of books available </th>";
                                    //echo "<th> Read online </th>";
                                    echo "<th> Actions </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){
                                        
                                        echo "<tr>";
                                        echo "<td>";
                                            ?>
                                                <img src="<?php echo $row['books_image'] ?>" height="100" width="100">
                                            <?php
                                        echo "</td>";

                                        echo "<td>" . $row['books_name']. "</td>";
                                        echo "<td>" . $row['books_author_name']. "</td>";
                                        echo "<td>" . $row['books_publication_name']. "</td>";
                                        echo "<td>" . $row['books_price'] ."</td>";
                                        echo "<td>" . $row['books_qty'] ."</td>";
                                        echo "<td>" . $row['available_qty'] ."</td>";
                                        
                                        /*
                                        echo "<td>". $row['pdf_file'] ; 
                                            ?>
                                             <!--   <a href="<?php //echo $row['pdf_file'];?>" target="_blank"> [LINK] </a> -->
                                            <?php
                                        echo "</td>";
                                        */
                                        echo "<td>";
                                            ?>
                                                <!-- Performs Edit or Delete actions -->
                                                <a href="edit_books.php?id=<?php echo $row["id"]; ?>"><button>Edit</button></a> 
                                                <a href="delete_books.php?id=<?php echo $row["id"]; ?>"><button>Delete</button></a>

                                            <?php
                                        echo "</td>";
                                        
                                    }

                                    echo "</table>";

                                    }else{

                                    $res = mysqli_query($db_connect, "SELECT * from add_books_info");
                                    echo "<table class='table table-bordered col-md-12'>";

                                    echo "<tr class='bg-info'>";
                                    echo "<th> books image </th>";
                                    echo "<th> books name </th>";
                                    echo "<th> books author name </th>";
                                    echo "<th> books publication name </th>";
                                    echo "<th> books price </th>";
                                    echo "<th> books quantity </th>";
                                    echo "<th> no of books available </th>";
                                   // echo "<th> Read online </th>";
                                    echo "<th> Actions </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){

                                        echo "<tr>";
                                        echo "<td>";
                                            ?>
                                                <img src="<?php echo $row['books_image'] ?>" width="120">
                                            <?php
                                        echo "</td>";

                                        echo "<td>" . $row['books_name'] . "</td>";
                                        echo "<td>" . $row['books_author_name'] . "</td>";
                                        echo "<td>" . $row['books_publication_name'] . "</td>";
                                        echo "<td>" . $row['books_price'] . "</td>";
                                        echo "<td>" . $row['books_qty'] . "</td>";
                                        echo "<td>" . $row['available_qty'] . "</td>";
                                        
                                        /*
                                        echo "<td>".""; //$row['pdf_file'] ; 
                                            ?>
                                             <!--   <a href="<?php echo $row['pdf_file'];?>" target="_blank"> [LINK] </a> -->
                                            <?php
                                        echo "</td>";
                                        */

                                        echo "<td>";
                                            ?>
                                                <!-- Performs Edit or Delete actions -->
                                                <a href="edit_books.php?id=<?php echo $row["id"]; ?>">
                                                    <button class="btn btn-info btn-xs"><span class="fa fa-pencil">&nbsp; | &nbsp; </span> Edit </button>
                                                </a> 
                                                
                                                <a href="delete_books.php?id=<?php echo $row["id"]; ?>">
                                                    <button class="btn btn-danger btn-xs"><span class="fa fa-trash">&nbsp; | &nbsp; </span> Delete </button>
                                                </a>

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