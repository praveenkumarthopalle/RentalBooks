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
                        <h3>Add Books Information</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add books Info.</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                                <table class="table table-bordered">

                                    <tr>
                                        <td><input type="text" name="booksname" class="form-control" placeholder="books name" required> </td>
                                    </tr>

                                    

                                    <tr>
                                        <td><input type="text" name="bauthorname" class="form-control" placeholder="books author name" > </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" name="pname" class="form-control" placeholder="publication name" required> </td>
                                    </tr>


                                    <tr>
                                        <td><input type="text" name="bprice" class="form-control" placeholder="Rent per day in USD format" required> </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" name="bqty" class="form-control" placeholder="books quantity" required> </td>
                                    </tr>

                                    <!--
                                    <tr>
                                        <td>Upload e-Book file (.pdf) <br><br>
                                            <input type="file" name="pdf" required> </td>
                                    </tr>
                                    -->

                                    <tr>
                                        <td>Upload Books Image <br><br>
                                            <input type="file" name="f1" required> </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="submit" name="submit1" class="btn btn-primary submit" value="Add book" required> 
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
            if(isset($_POST['submit1'])){

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

                //mysqli_query($db_connect, "INSERT into 'add_books_info' values ('','$_POST[booksname]','$_POST[bauthorname]','$_POST[pname]','$_POST[bprice]','$_POST[bqty]','$_POST[bqty]','$_SESSION[librarian]','$dst1',)")or die("book information not uploaded correctly");

                mysqli_query($db_connect, "INSERT INTO `add_books_info`(`id`, `books_name`, `books_author_name`, `books_publication_name`, `books_price`, `books_qty`, `available_qty`, `librarian_username`, `books_image`) VALUES ('','$_POST[booksname]','$_POST[bauthorname]','$_POST[pname]','$_POST[bprice]','$_POST[bqty]','$_POST[bqty]','$_SESSION[librarian]','$dst1');")or die("book information not uploaded correctly");



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
