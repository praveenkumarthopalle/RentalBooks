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
                        <h3>SEARCH</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>SEARCH BOOKS</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form name="searchForm" action="" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><input type="text" name="t1" class="form-control" placeholder="enter book name to search" required></td>
                                            <td><input type="submit" name="submit1" value="search book" class="btn btn-primary"></td>
                                        </tr>
                                    </table>            
                                </form>



                                <?php

                                    if(isset($_POST['submit1'])){

                                        $i=0;
                                        $res = mysqli_query($db_connect, "SELECT * from add_ebooks_info where book_name like ('%$_POST[t1]%') ");
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        while($row = mysqli_fetch_array($res)){
                                            $i = $i+1;
                                            echo "<td width='33%' style='color: red;'>";
                                            ?>
                                                <img src="../librarian/<?php echo $row["book_image"];?>" height="120">

                                            <?php
                                            echo "<br>";
                                            echo "<b> Book Title: <span style='color:green'>".$row["book_name"]."</span></b>";
                                            echo "<br>";
                                            echo "<br>";
                                            echo "Read Online: <span style='color:green'>";
                                                ?>
                                                    <a href="../librarian/<?php echo $row['pdf_file_path'];?>" target="_blank"> <?php echo $row["book_name"];?>.pdf </a>
                                                <?php

                                            echo "</span>";

                                            echo "<br>";
                                            
                                            echo "</td>";
                                            if($i==3){
                                                echo "</tr>";
                                                echo "<tr>";
                                                $i = 0;
                                            }
                                        }
                                        echo "</tr>";
                                        echo "</table>";

                                    }else{

                                        $i=0;
                                        $res = mysqli_query($db_connect, "SELECT * from add_ebooks_info");
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        while($row = mysqli_fetch_array($res)){
                                            $i = $i+1;
                                            echo "<td width='25%' style='color: red;'>";
                                            ?>
                                                <div class='bg-success' style="padding: 10px;"><center>
                                                    <img src="../librarian/<?php echo $row["book_image"];?>" height="120">
                                                </center></div>
                                            <?php
                                            echo "<div class='bg-default'>";
                                            echo "<b> Book Title: <span style='color:green'>".$row["book_name"]."</span></b>";

                                            echo "<br>";
                                            echo "<b>Read Online: <span style='color:green'></b>";
                                                ?>
                                                    <a href="../librarian/<?php echo $row['pdf_file_path'];?>" target="_blank"> <?php echo $row["book_name"];?>.pdf </a>
                                                <?php

                                            echo "</span>";

                                            echo "</div>";
                                            
                                            echo "</td>";
                                            if($i==4){
                                                echo "</tr>";
                                                echo "<tr>";
                                                $i = 0;
                                            }
                                        }
                                        echo "</tr>";
                                        echo "</table>";

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