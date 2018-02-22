<?php
    
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>REQUESTS RECIEVED</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Requested Books By Users</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">

                                    <tr class="bg-info">
                                        <th> Request #ID</th>
                                        <th> Requested By </th>
                                        <th> Book Name </th>
                                        <th> Author Name </th>
                                        <th> Edition </th>
                                        <th> Req. Status </th>
                                        <th> Actions </th>
                                    </tr>

                                    <?php

                                        $res = mysqli_query($db_connect, "SELECT * FROM suggest_books");

                                        
                                        while($row = mysqli_fetch_array($res)){

                                           
                                            echo "<tr>";
                                            echo "<td>". $row["id"] . "</td>";
                                            echo "<td>". $row["suggest_by"] . "</td>";
                                            echo "<td>". $row["book_name"] . "</td>";
                                            echo "<td>". $row["author_name"] . "</td>";
                                            echo "<td>". $row["edition"] . "</td>";
                                            echo "<td>". $row["status"]."</td>";
                                            echo "<td>";

                                            
                                            ?>
                                                <!-- Performs Approve or Reject actions -->
                                                <a href="approve_request.php?id=<?php echo $row["id"]; ?>">
                                                    <button class="btn btn-success btn-xs">Approve</button>
                                                </a> 
                                                <a href="reject_request.php?id=<?php echo $row["id"]; ?>">
                                                    <button class="btn btn-danger btn-xs">Reject</button>
                                                </a>

                                            <?php
                                        echo "</td>";
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