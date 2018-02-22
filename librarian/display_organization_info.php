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
                                    $res = mysqli_query($db_connect,"SELECT * FROM organization_registration");

                                    echo "<table class='table table-bordered'>";
                                    echo "<tr class='bg-info'>";
                                    echo "<th> Organization #ID </th>";
                                    echo "<th> Organization Name </th>";
                                    echo "<th> Type of Ogranization </th>";
                                    echo "<th> Admin name </th>";
                                    echo "<th> Admin Username </th>";
                                    echo "<th> Actions (edit/del) </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($res)){

                                        
                                        $a = '<a href="active.php?id= <?php echo $row["id"]; ?>" > </a>';
                                    
                                        echo "<tr>";
                                        echo "<td class='text-center'>"; ?> <a href="organization_profile.php?id=<?php echo $row["id"]; ?>" > <?php echo $row["id"] ."</a></td>";

                                        echo "<td>"; ?> <a href="organization_profile.php?id=<?php echo $row["id"]; ?>" > <?php echo $row["org_name"] ."</a></td>";
                                        echo "<td>". $row["org_type"]."</td>";
                                        echo "<td>". $row["org_admin_name"] . "</td>";
                                        echo "<td>". $row["username"] . "</td>";
                                        
                                        echo "<td>"; 
                                            ?>
                                                <a href="edit_org.php?id=<?php echo $row['id'];?>" >
                                                    <button class="btn btn-info btn-xs"><span class="fa fa-pencil">&nbsp; | &nbsp;</span>Edit</button>
                                                </a>

                                                <a href="delete_org.php?id=<?php echo $row['id'];?>">
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