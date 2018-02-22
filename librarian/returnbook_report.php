<?php
    
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>books returned by user</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>returned books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">

                                    <tr class="bg-info">
                                        <th> Request #ID</th>
                                        <th> student name </th>
                                        <th> Book Name </th>
                                        <th> book issue date</th>
                                        <th> book return Date </th>
                                        <th> Book Charge</th>
                                    
                                    </tr>

                                  
                                   <?php
								
								
										 $res = mysqli_query($db_connect, "SELECT *FROM `return_book` ");
										 
                                        while($row = mysqli_fetch_array($res)){

                                           
                                            echo "<tr>";
                                            echo "<td>". $row["id"] . "</td>";
                                            echo "<td>". $row["student_name"] . "</td>";
                                            echo "<td>". $row["books_name"] . "</td>";
                                            echo "<td>". $row["books_issue_date"] . "</td>";
											echo "<td>". $row["books_return_date"] . "</td>";
                                            echo "<td>". $row["book_charges"] . "</td>";
                                          
                                            echo "<td>";
										
                          
                                ?>
                                            <?php
                                        echo "</td>";
                                            echo "</tr>";

                                        }
									
										
                                    ?>
                                    
                                </table>
						
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>