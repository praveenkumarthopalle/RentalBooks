<?php
    include_once "org_session_start.php";
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
								$date=date('Y-m-d');
								$uname=$_SESSION['username'];
								$q=mysqli_query($db_connect,"SELECT DATEDIFF('$date',`books_issue_date`) As diff,`id`,`books_qty`,`book_id`,`book_name`,`org_email`,`block_mail` FROM `issue_books_org` WHERE `org_admin_username`='$uname' and `book_status`='booked' and `return_mail`='mailed'");
								$days=0;
								$price=0;
								$bid=0;
								$book_name="";
								$quan=0;
								$email="";
								$id=0;
								$not="not";
								$mailed="mailed";
								$block_mail="";
								$nums=mysqli_num_rows($q);
								while($f=mysqli_fetch_array($q))
								{
									$days=$f['diff'];
									
									if($days>7)
									{
										$bid=$f['book_id'];
										$book_name=$f['books_name'];
										$quan=$f['books_qty'];
										$email=$f['org_email'];
										$id=$f['id'];
										$block_mail=$f['block_mail'];
										$qq=mysqli_query($db_connect,"SELECT `books_price` FROM `add_books_info` WHERE `id`='$bid'");
										$ff=mysqli_fetch_array($qq);
										$price=$ff['books_price'];
										break;
										
									}
									
								}
								
                                    if(isset($_POST['submit1'])){

                                        $i=0;
                                        $res = mysqli_query($db_connect, "SELECT * from add_books_info where books_name like ('%$_POST[t1]%') ");
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        while($row = mysqli_fetch_array($res)){
                                            $i = $i+1;
                                            echo "<td width='33%' style='color: red;'>";
                                            ?>
                                                <img src="../librarian/<?php echo $row["books_image"];?>" height="120">

                                            <?php
                                            echo "<br>";
                                            echo "<b> Book Title: <span style='color:green'>".$row["books_name"]."</span></b>";
                                            echo "<br>";
                                            echo "<b> available books: <span style='color:green'>" . $row["available_qty"] . "</span></b>";
                                            if($days<7 || $nums==0)
											{
												echo "</br><a href='issue_books_org.php?book_id=".$row["id"]."'><input style='color:green' type='submit' name='submit' value='Book Now' /></a>";
											echo "</td>";
											}
											if($days>7)
											{
												echo "</br><a href='issue_books_org.php?book_id=".$row["id"]."'><input style='color:green' type='submit' name='submit' value='Book Now' disabled/></a>";
											echo "</td>";
												if($block_mail==$not)
												{
													$wq=mysqli_query($db_connect,"UPDATE `issue_books_org` set `block_mail`='$mailed' WHERE `id`='$id'");
												$fine=100;
												$total=$fine+$price;
												echo" <script> window.location.href='http://www.tpkumar.com/lmsadminmail/sendmailblock.php?email=$email'</script>";
												}
												
											}
											
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
                                        $res = mysqli_query($db_connect, "SELECT * from add_books_info where available_qty > 0 ");
                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        while($row = mysqli_fetch_array($res)){
                                            $i = $i+1;
                                            echo "<td width='33%' style='color: red;'>";
                                            ?>
                                                <img src="../librarian/<?php echo $row["books_image"];?>" height="120">

                                            <?php
                                            echo "<br>";
                                            echo "<b> Book Title: <span style='color:green'>".$row["books_name"]."</span></b>";
                                            echo "<br>";
                                            echo "<b> available books: <span style='color:green'>" . $row["available_qty"] . "</span></b>";
											if($days<7 || $nums==0)
											{
												echo "</br><a href='issue_books_org.php?book_id=".$row["id"]."'><input style='color:green' type='submit' name='submit' value='Book Now' /></a>";
                                            echo "</td>";
											
											}
											if($days>7)
											{
												echo "</br><a href='issue_books_org.php?book_id=".$row["id"]."'><input style='color:green' type='submit' name='submit' value='Book Now' disabled/></a>";
                                            echo "</td>";
											if($block_mail==$not)
											{
												$wq=mysqli_query($db_connect,"UPDATE `issue_books_org` set `block_mail`='$mailed' WHERE `id`='$id'");
												echo" <script> window.location.href='http://www.tpkumar.com/lmsadminmail/sendmailblock.php?email=$email'</script>";
											}
												
											}
											
                                            if($i==3){
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