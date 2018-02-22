<?php
    
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>My Borrowd/issued Books</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My Borrowd/issued Books List</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    
                                    <tr class="bg-info">
                                        
                                        
                                        <th> Organization Name</th>
                                        <th> Borrowed Books Name </th>
                                        <th> Books Issued Date </th>
										<th> Books Return Date </th>
										<th> Quantity </th>
										<th> Return Book </th>

                                    </tr>

                                    <?php
                                        $res = mysqli_query($db_connect, "SELECT * FROM issue_books_org WHERE org_admin_username = '$_SESSION[username]' && not book_status='hold'");

                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            //echo "<td>" . $row[''] . "</td>";
                                            echo "<td>" . $row['org_name'] . "</td>";
                                            
                                            echo "<td>" . $row['book_name'] . "</td>";
                                            echo "<td>" . $row['books_issue_date'] . "</td>";
											echo "<td>" . $row['return_date'] . "</td>";
											echo "<td>" . $row['books_qty'] . "</td>";
                                            //echo "<td>" . $row[''] . "</td>";
                                            echo "";?>
											<td><button class="btn btn-default"><a href="return_book.php?id=<?php echo $row['id'];?>">Return This Book!</a></button></td></tr>
											<?php
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