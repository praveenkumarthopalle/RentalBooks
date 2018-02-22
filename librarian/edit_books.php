<?php
    //session_start();
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>EDIT BOOK DETAILS</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
							<div class="x_title">
                                <h2>Edit Book Details Form</h2>
								<div class="clearfix"></div>
                            </div>
							
                            <div class="x_content">



                                        <form name="form1" action="" method="post" class="form-horizontal" enctype="multipart/form-data">

                                                <?php

                                                    $id = $_GET['id'];

                                                    $res = mysqli_query($db_connect, "SELECT * FROM `add_books_info` WHERE id = $id ");

                                                    $row = mysqli_fetch_array($res);

                                                ?>

                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-2">Book Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="booksname" value="<?php echo $row['books_name']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2">Author Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bauthorname" value="<?php echo $row['books_author_name']; ?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2">Publication Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="pname" value="<?php echo $row['books_publication_name']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> Rental Charges Perday (in US $)</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bprice" value="<?php echo $row['books_price']; ?>"  required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <!--
                                                    <label class="col-md-2"> Upload e-Book file (.pdf)  </label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="form-control" name="pdf"  value="<?php //echo $row['pdf_file']; ?>" required/>
                                                    </div>
                                                    -->
                                                    <label class="col-md-2"> Books Quantity </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bqty"  value="<?php echo $row['books_qty']; ?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">

                                                    <label class="col-md-2"> Upload Books Image </label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="form-control" name="f1" value="<?php echo $row['books_image']; ?>"  required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">
                                                    
                                                    <div class="col-md-6 col-md-push-3">
                                                        <input type="submit" name="update" class="btn btn-primary submit" value="Update book details" required> 
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                            </form>
                              <!--      </section>  -->


<?php

                                //$added_on = date('Y-m-d');

                

    if(isset($_POST['update'])){

        $tm = md5(time()); //temperary file name generation to store in images folder and db
        $fnm = $_FILES["f1"]["name"];
        $dst = "./books_image/".$tm.$fnm;
        $dst1 = "books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

        // pdf file upload code
        /*
        $tm2 = md5(time()); //temperary file name generation to store in images folder and db
        $fnm2 = $_FILES["pdf"]["name"];
        $dst2 = "./books_pdf/".$tm2.$fnm2;
        $dst4 = "books_pdf/".$tm2.$fnm2;
        move_uploaded_file($_FILES["pdf"]["tmp_name"], $dst2);
        */

        mysqli_query($db_connect,"UPDATE `add_books_info` SET books_name='$_POST[booksname]', books_author_name='$_POST[bauthorname]', books_publication_name='$_POST[pname]', books_price='$_POST[bprice]', books_qty='$_POST[bqty]', books_image='$dst1' WHERE id = $id ");
        ?>

            <div class="alert alert-success col-lg-12">
                <strong>Books</strong> info Updated Successful !!!
            </div>
            

        <?php
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