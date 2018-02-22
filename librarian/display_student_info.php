<?php
    //include_once "session_start.php";
    include "header.php";
    include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>All Users info</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> All Users info.</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <!--   Add content to the page -->
                                <?php
                                    $res = mysqli_query($db_connect,"SELECT * FROM student_registration");

                                    echo "<table class='table table-bordered'>";
                                    echo "<tr class='bg-info'>";
                                    
                                    echo "<th> Enrollment No </th>";
                                    echo "<th> Name </th>";
                                    echo "<th> Email Id </th>";
                                    echo "<th> Username </th>";
                                    echo "<th> contact No. </th>";
                                    echo "<th> User Status </th>";
                                    echo "<th> Change Status </th>";
                                    echo "<th> Options </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){

                                        
                                        echo "<tr>";
                                        echo "<td>"; ?> <a href="student_profile.php?id=<?php echo $row["id"]; ?>" > <?php echo $row["enrollment_no"] ."</a></td>";

                                        echo "<td>"; ?> <a href="student_profile.php?id=<?php echo $row["id"]; ?>" > <?php echo $row["firstname"] ." ".$row["lastname"]."</a></td>";
                                        
                                        echo "<td>". $row["email"] . "</td>";
                                        echo "<td>". $row["username"] . "</td>";
                                        echo "<td>". $row["contact"] . "</td>";
                                        echo "<td>". $row["status"] . "</td>";

                                        echo "<td>"; 
                                            ?>
                                                <a href="active.php?id= <?php echo $row["id"]; ?>" >
                                                    <button class="btn btn-success btn-xs">Active</button>
                                                </a>

                                                <a href="inactive.php?id= <?php echo $row["id"]; ?>" >
                                                    <button class="btn btn-danger btn-xs">In-active</button>
                                                </a>
                                            <?php

                                        echo "</td>";

                                        echo "<td>";

                                            ?>
                                                <a href="edit_student.php?id=<?php echo $row['id'];?>">
                                                    <button class="btn btn-info btn-xs"><span class="fa fa-pencil">&nbsp; | &nbsp; </span> Edit </button>
                                                </a>

                                                <a href="delete_student.php?id=<?php echo $row['id'];?>">
                                                    <button class="btn btn-danger btn-xs"><span class="fa fa-trash">&nbsp; | &nbsp; </span> Delete </button>
                                                </a>


                                            <?php

                                        echo "</td>";

                                        echo "</tr>";

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