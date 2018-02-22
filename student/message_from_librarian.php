<?php
    //include "stu_session_start.php";
    include "header.php";

    mysqli_query($db_connect, "UPDATE message set read1= 'y' WHERE dusername = '$_SESSION[username]' ");
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Notifications (msg. from librarian)</h3>
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
                                <h2>Notifications (msg. from librarian)</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">

                                    <tr class="bg-info">
                                        <th> Sender Full Name</th>
                                        <th> Subject </th>
                                        <th> Message </th>
                                    </tr>

                                    <?php

                                        $res = mysqli_query($db_connect, "SELECT * FROM messages where dusername = '$_SESSION[username]' order by id desc ");

                                        while($row = mysqli_fetch_array($res)){

                                            $res1 = mysqli_query($db_connect,"SELECT * from librarian_registration WHERE username = '$row[susername]' ");

                                            //$fullname;

                                            $res2 = mysqli_query($db_connect, "SELECT * FROM librarian_registration");

                                            while($row2 = mysqli_fetch_array($res2)){
                                                $fullname = $row2["firstname"]. " " . $row2["lastname"]; 
                                                //not working!!!!!!!!!!!!!!!!!!!!!!!!!
                                            }
                                            echo "<tr>";
                                            echo "<td>". $fullname . "</td>";
                                            echo "<td>". $row["title"] . "</td>";
                                            echo "<td>". $row["msg"] . "</td>";
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