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
                        <h3>SEND NOTIFICATIONS</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Send Notification to student</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">

                                    <table class="table table-bordered bg-info">

                                        <tr>
                                            <td>
                                                <select class="form-control selectpicker" name="dusername">
                                                    <?php
                                                        $res = mysqli_query($db_connect, "SELECT * FROM student_registration");
                                                        while($row=mysqli_fetch_array($res)){
                                                            ?>
                                                                <option value="<?php echo $row['username']; ?>"> 
                                                                    <?php
                                                                        echo $row["username"]. " (" . $row["enrollment_no"]. " )";
                                                                    ?>
                                                                </option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>

                                    </table>

                                    <hr>

                                    <table class="table table-bordered bg-primary">

                                        <tr>
                                            <td><input type="text" name="title" class="form-control" placeholder="Enter Title" required=" "> </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Message:
                                                <textarea class="form-control" name="msg" placeholder="Write your message here........."></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><input type="submit" name="submit1" class="form-control btn btn-primary" value="Send"> </td>
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

    if(!empty($_POST['submit1'])){
        mysqli_query($db_connect,"INSERT INTO messages VALUES ('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n') ") or die(mysqli_errno($db_connect));
		
        ?>
            <script type="text/javascript">
                alert("message sent successfully");
            </script>
        <?php

    }
	else
	{
		?>
            <script type="text/javascript">
                alert("message not sent");
            </script>
        <?php
	}


    // footer file included here
    include "footer.php";
?>