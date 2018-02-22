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
                        <h3>Sent Messages</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sent Messages to users</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">

                                    <tr class="bg-info">
                                        <th> Sent to</th>
                                        <th> Subject </th>
                                        <th> Message </th>
                                        <th> Sent Date </th>
                                    </tr>

                                    <?php

                                        $res = mysqli_query($db_connect, "SELECT * FROM messages where susername = '$_SESSION[librarian]' order by id desc ");

                                        while($row = mysqli_fetch_array($res)){

                                            $res1 = mysqli_query($db_connect,"SELECT * from student_registration WHERE username = '$row[dusername]' ");

                                            $res2 = mysqli_query($db_connect, "SELECT * FROM student_registration");

                                            while($row2 = mysqli_fetch_array($res1)){
                                                $fullname = $row2["firstname"]. " " . $row2["lastname"]; 
                                                //$fullname = $row2["username"];
                                                
                                            }
                                            echo "<tr>";
                                            echo "<td>". $fullname . "</td>";
                                            echo "<td>". $row["title"] . "</td>";
                                            echo "<td>". $row["msg"] . "</td>";
                                            echo "<td>". $row["sdate"]."</td>";
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