<?php
    include "session_start.php";
    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add eBooks</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add ebooks Info.</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="POST" class="col-lg-6" enctype="multipart/form-data">

                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            <input type="text" name="bookname" class="form-control" placeholder="Book name" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" name="bauthorname" class="form-control" placeholder="Book author name" required> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" name="pname" class="form-control" placeholder="Publication name" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" name="bedition" class="form-control" placeholder="Enter Book's Edition eg: 1 or 2 etc ..." required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" name="beditionyear" class="form-control" placeholder="Book's Edition Year eg: 1995 or 1996 or 2017 etc ..." required>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Upload e-Book file ('*.pdf' FILE only) <br><br>
                                            <input type="file" name="pdf" required> 
                                        </td>
                                    </tr>
                                    

                                    <tr>
                                        <td>Upload e-Books Image <br><br>
                                            <input type="file" name="f1" required> </td>
                                    </tr>
                                    

                                    <tr>
                                        <td>
                                            <input type="submit" name="submit1" class="btn btn-primary submit" value="Add e-book" required> 
                                        </td>
                                    </tr>
                                    
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php
            if(isset($_POST["submit1"])){
            
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
                

                mysqli_query($db_connect, "INSERT INTO `add_ebooks_info` (`id`, `book_name`, `book_author_name`, `book_publication`, `book_edition`, `book_edition_year`, `book_image`, `pdf_file_path`) VALUES ('', '$_POST[bookname]', '$_POST[bauthorname]', '$_POST[pname]', '$_POST[bedition]', '$_POST[beditionyear]', '$dst1', '$dst4')")or die(mysqli_error());


                ?>
                    <script type="text/javascript">
                        alert("books information inserted successfully");
                    </script>

                <?php

            }


        ?>

<?php
    include "footer.php";
?>
