<?php
    include "header.php";
    include "connection.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>PAY AND RETURN</h3>
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
                                <h2>Return Charges for This Book ..... </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <?php

                                  $type='student';
								  $id = $_GET["id"];
                                    if($id){
                                    $res = mysqli_query($db_connect, "SELECT * FROM `issue_books_org` WHERE id = $id ");

                                    $row = mysqli_fetch_array($res);
                                    $user = $row["student_name"];
                                    $issue_date = $row["books_issue_date"];
                                    $date1=date('Y/m/d',strtotime($issue_date));
                                    $date2 = date('Y/m/d');
                                    $date11 = date_create("$date1");
                                    $date22 = date_create("$date2");
                                    $diff=date_diff($date11,$date22);
                                    $num_days = $diff->format("%R%a days");
                                    $book = $row["book_name"];
									$qty=$row["books_qty"];
                                    $res1 = mysqli_query($db_connect, "SELECT books_price FROM `add_books_info` where books_name = '$book' ");
                                    $row2 = mysqli_fetch_array($res1);
                                    $price = $row2["books_price"];
                                   $tot=0;
								   $fine=0;
									if($num_days<=2)
									{
										$tot=0;
										$fine=0;
									}
									else if($num_days>2&& $num_days <7)
									{
										$fine=($num_days-2)*10;
										$tot=$fine+($price*$qty);
									}
									else if($num_days>=7)
									{
										$fine=100;
										$tot = $fine+($price*$qty);
									}                              
                                ?>

                                <!-- title row -->
                                  <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                        <h1>
                                            <i class="fa fa-globe"></i> Invoice. <small class="pull-right">Date: <?php echo date('Y/m/d'); ?></small>
                                        </h1>
                                    </div>
                                  </div>
                                  <hr>
                                <!-- INVOICE PRINT -->

                                  <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">

                                      <p class="lead">Payment Methods:</p>
                                      <img src="images/visa.png" alt="Visa">
                                      <img src="images/mastercard.png" alt="Mastercard">
                                      <img src="images/american-express.png" alt="American Express">
                                      <img src="images/paypal.png" alt="Paypal">
                                      
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                      <p class="lead">Invoice details:</p>
                                      <div class="table-responsive">
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <th style="width:50%">User Id:</th>
                                              <td><?php echo $id; ?></td>
                                            </tr>
                                            <tr>
                                              <th>User Name:</th>
                                              <td><?php echo $user; ?></td>
                                            </tr>
                                            <tr>
                                              <th>Borrowed Book Name:</th>
                                              <td><?php echo $book; ?></td>
                                            </tr>
											<tr>
                                              <th>Borrowed Books Quantity:</th>
                                              <td><?php echo $qty; ?></td>
                                            </tr>
                                            <tr>
                                              <th>Book issue date:</th>
                                              <td><?php echo $date1; ?></td>
                                            </tr>
                                            <tr>
                                              <th>Book return date:</th>
                                              <td><?php echo $date2; ?></td>
                                            </tr>
                                            <tr>
                                              <th>price/every Book:</th>
                                              <td>$<?php echo $price; ?></td>
                                            </tr>
                                            <tr>
                                              <th>No of Days Used:</th>
                                              <td><?php echo $num_days; ?></td>
                                            </tr>
											<tr>
                                              <th>Fine for Late Returning:</th>
                                              <td><?php echo $fine; ?></td>
                                            </tr>
                                            <tr>
                                              <th>Total Payment:</th>
                                              <td>$<?php echo $tot; ?></td>
                                            </tr>
                                            <hr>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <a href="return.php?id=<?php echo $id; ?>&bquan=<?php echo $row["books_qty"];?>&bname=<?php echo $row["book_name"];?>&bid=<?php echo $row["book_id"];?>"><button class="btn btn-success btn-sm">Yes Return Book</button></a>
                                                </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->

                                  <?php
                                }else{
                                 header('Location:return_book.php');
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