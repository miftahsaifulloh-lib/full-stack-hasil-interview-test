<!DOCTYPE html>
<html lang="en" class="ie8">
<html lang="en" class="ie9">
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/login.css" />
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body >
<?php
error_reporting(0);
session_start();
$mysqli = "";
include_once 'library/koneksi.php';

if ($_POST["login"]) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if ($email != "" && $password != "") {
        $sql    = "select * from user where email = '$email' AND password = '$password' ";
        $result = $mysqli->query($sql);
        $data   = $result->fetch_assoc();
        // $set[] = $data;
        // print_r ($set);

        if ($data["email"] == $email && $data["password"] == $password) {
            ?>
            <div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data Telah Ditemukan!!.
            </div>
        <?php
        $_SESSION["email"] = $data["email"];
        $_SESSION["password"] = $data["password"];
        ?> <script type="text/javascript">window.location.href="admin/register.php";</script>  <?php
        } else {
            ?>
            <div align="center" class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <b>Data Tidak Ditemukan!!</b>
            </div>
            <?php
        }
    }

}
?>
<!-- PAGE CONTENT -->
<div class="container">
    <div class="text-center">
        <h4 class="text-info">Miftah Saifulloh</h4>
        <h3 class="text-info">SIGN IN</h3>
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="" method="post" class="form-signin">
                <div class="form-group">
                    <label for="email" class="text-info">Email</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="text-info">Password</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <input type="submit" name="login" value="Login" class="btn btn-info"/>
                <input type="reset" name="cancel" value="Cancel" class="btn btn-danger"/>
            </form>
        </div>
    </div>
</div>


<!--END PAGE CONTENT -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<!--END PAGE LEVEL SCRIPTS -->

</body>
<!-- END BODY -->
</html>
