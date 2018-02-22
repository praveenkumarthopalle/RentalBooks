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

                                                    $res = mysqli_query($db_connect, "SELECT * FROM `add_ebooks_info` WHERE id = $id ");

                                                    $row = mysqli_fetch_array($res);

                                                ?>

                                               
                                            
                                                <div class="form-group">
                                                    <label class="col-md-2">e-Book Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bookname" value="<?php echo $row['book_name']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2">e-Book Author Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bauthorname" value="<?php echo $row['book_author_name']; ?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    <label class="col-md-2">e-Book Publication Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="pname" value="<?php echo $row['book_publication']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> e-Book Edition </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="bedition" value="<?php echo $row['book_edition']; ?>"  required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
                                                    
                                                    <label class="col-md-2"> Upload e-Book file (.pdf)  </label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="form-control" name="pdf"  value="<?php echo $row['pdf_file_path']; ?>" required/>
                                                    </div>

                                                    <label class="col-md-2"> e-Book Edition Year </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="beditionyear"  value="<?php echo $row['book_edition_year']; ?>" required/>
                                                    </div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">

                                                    <label class="col-md-2"> Upload e-Book Image </label>
                                                    <div class="col-md-4">
                                                        <input type="file" class="form-control" name="f1" value="<?php echo $row['book_image']; ?>"  required/>
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
        $dst = "./ebooks_image/".$tm.$fnm;
        $dst1 = "ebooks_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

        // pdf file upload code
        
        $tm2 = md5(time()); //temperary file name generation to store in images folder and db
        $fnm2 = $_FILES["pdf"]["name"];
        $dst2 = "./ebooks_pdf/".$tm2.$fnm2;
        $dst4 = "ebooks_pdf/".$tm2.$fnm2;
        move_uploaded_file($_FILES["pdf"]["tmp_name"], $dst2);
    

        mysqli_query($db_connect,"UPDATE `add_ebooks_info` SET book_name='$_POST[bookname]', book_author_name='$_POST[bauthorname]', book_publication='$_POST[pname]', book_edition='$_POST[bedition]', book_edition_year='$_POST[beditionyear]', pdf_file_path='$dst4', book_image='$dst1' WHERE id = $id ")or die("data not edited");
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