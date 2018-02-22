<?php

    include "connection.php";
    include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>REQUEST A BOOK</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Suggest a book to librarian</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form name="form1" action="" method="post" class="col-lg-6">

                                    <table class="table table-bordered">
                                      

                                        <tr>
                                            <td>
                                            Book Title:
                                            <input type="text" name="booktitle" class="form-control" required> </td>
                                        </tr>

                                        <tr>
                                            <td>
                                            Author Name:
                                            <input type="text" name="authorname" class="form-control" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                            Edition:
                                            <input type="text" name="edition" class="form-control" required></td>
                                        </tr>

                                        <tr>
                                            <td><input type="submit" name="submit1" class="form-control btn btn-primary" value="SUGGEST"> </td>
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

        $suggestedby = $_SESSION['username'];
        
        mysqli_query($db_connect,"INSERT INTO suggest_books VALUES ('','$suggestedby','$_POST[booktitle]','$_POST[authorname]','$_POST[edition]','pending') ") or die(mysqli_errno($db_connect));

        ?>
            <script type="text/javascript">
                alert("Book Suggestion Sent Successfully");
            </script>
        <?php

    }


    // footer file included here
    include "footer.php";
?>