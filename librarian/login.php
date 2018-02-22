<?php
    session_start();    
    include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin / Librarian Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Admin/Librarian Login</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>

            <div class="clearfix"></div>
            <div>

                <input class="btn btn-default submit" type="submit" name="login" value="Login">
            </div>

            <div class="clearfix"></div>


        </form>
    </section>

    <?php

        if(isset($_POST['login'])){
            $count = 0;
        $res = mysqli_query($db_connect,"SELECT * FROM librarian_registration where username = '$_POST[username]' && password = '$_POST[password]'") or die('error');

        $count = mysqli_num_rows($res);

        if($count == 0){
            ?>
            <div class="alert alert-danger col-lg-12">
                <strong style="color:white">Invalid</strong> Username Or Password.
            </div>      

            <?php

        }else{
                $_SESSION['librarian'] = $_POST['username'];
			
            ?>

                <script type="text/javascript">
                    window.location = "dashboard.php";
                </script>

            <?php
        } // inner if block end
    } // outer if block end
    ?>


</div>

</body>
</html>
