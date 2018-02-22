<?php
    
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>fine</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>fine By Users per day</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">

                                    <tr class="bg-info">
                                        <th> Request #ID</th>
                                        <th> Requested By </th>
                                        <th> Book Name </th>
                                        <th> Book ID </th>
                                        <th> Issue Book Date </th>
                                        <th> Book Charge</th>
                                    
                                    </tr>

                                  
                                   <?php
								
								
										 $res = mysqli_query($db_connect, "SELECT *FROM `issue_books` WHERE DATEDIFF( CURDATE(),`books_issue_date`) > 7;");
										 
                                        while($row = mysqli_fetch_array($res)){

                                           
                                            echo "<tr>";
                                            echo "<td>". $row["id"] . "</td>";
                                            echo "<td>". $row["student_name"] . "</td>";
                                            echo "<td>". $row["books_name"] . "</td>";
                                            echo "<td>". $row["book_id"] . "</td>";
											echo "<td>". $row["books_issue_date"] . "</td>";
                                            echo "<td>". $row["book_charges"] . "</td>";
                                          
                                            echo "<td>";
										
                          
                                ?>
                                            <?php
                                        echo "</td>";
                                            echo "</tr>";

                                        }
									
										
                                    ?>
                                    
                                </table>
								<form method="post" action="fine_day_week.php">
								<input type="submit" name="submit" value="Send Mail"/>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
 include "connection.php";
 if(!empty($_POST['submit']))
 {
	 $res = mysqli_query($db_connect, "SELECT *FROM `issue_books` WHERE DATEDIFF( CURDATE(),`books_issue_date`) > 7;");
										$emails=array();
										$books=array();
                                        while($row = mysqli_fetch_array($res)){

                                           $email=$row["student_email"];
                                            $bname=$row["books_name"];
                                            
											$emails[] = $email;
											$books[] = $bname;
											
                                        }
										//$new_email=$emails;
										$emails = implode(',',$emails);
										$books = implode(',',$books);
										echo" <script> window.location.href='http://www.tpkumar.com/lmsmail/sendallmails.php?email=$emails&bname=$books'</script>";
                                        

	 
 }
?>

<?php
    include "footer.php";
	
?>