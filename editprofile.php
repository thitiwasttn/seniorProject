<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="mycss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    /*.ml-auto {*/
    /*    left: auto !important;*/
    /*    right: 0px;*/
    /*}*/

    /*.mr-auto {*/
    /*    right: auto !important;*/
    /*    left: 0px;*/
    /*}*/

    /*.boxandshadow {*/
    /*    border-radius: 0px 0px 10px 10px;*/
    /*    box-shadow: 1px 1px 50px 1px;*/
    /*    !*padding: 10px;*!*/
    /*    !*margin-left: 2px;*!*/
    /*}*/

    /*!*.mybox {*!*/
    /*!*    border-radius: 10px 10px 10px 10px;*!*/
    /*!*    box-shadow: 1px 1px 25px 1px;*!*/
    /*!*    padding: 20px;*!*/
    /*!*    margin-top: 15px;*!*/
    /*!*    width: 70%;*!*/
    /*!*    !*margin-left: 2px;*!*!*/
    /*!*}*!*/

    /*.box {*/
    /*    !*border-radius: 0px 0px 10px 10px;*!*/
    /*    padding: 87px;*/
    /*    !*text-shadow: 50px 0px 7px ;*!*/

    /*}*/

    /*.my-table {*/
    /*    width: 100%;*/

    /*}*/


    /*@media (min-width: 400px) {*/
    /*    .my-form {*/
    /*        padding: 5px;*/
    /*        margin-bottom: 10px;*/
    /*        text-align: right;*/
    /*    }*/

    /*    .mybox {*/
    /*        border-radius: 10px 10px 10px 10px;*/
    /*        box-shadow: 1px 1px 25px 1px;*/
    /*        padding: 20px;*/
    /*        margin-top: 15px;*/
    /*        width: 90%;*/
    /*    }*/

    /*    .myboxrow2 {*/
    /*        border-radius: 10px 10px 10px 10px;*/
    /*        box-shadow: 1px 1px 25px 1px;*/
    /*        padding: 20px;*/
    /*        margin-top: 85px;*/
    /*        width: 90%;*/
    /*    }*/

    /*    .my-butedit {*/
    /*        width: 30%;*/
    /*        margin-top: 25px;*/
    /*    }*/

    /*    .my-butpass {*/
    /*        width: 50%;*/
    /*        margin-top: 25px;*/
    /*    }*/
    /*}*/

    /*@media (max-width: 400px) {*/
    /*    .box, {*/
    /*        !*display: none;*!*/
    /*        !*border-radius: 0px 0px 10px 10px;*!*/
    /*        padding: 40px;*/
    /*    }*/

    /*    .mybox, .myboxrow2 {*/
    /*        border-radius: 10px 10px 10px 10px;*/
    /*        box-shadow: 1px 1px 25px 1px;*/
    /*        padding: 20px;*/
    /*        margin-top: 15px;*/
    /*        width: 90%;*/
    /*    }*/

    /*    body {*/
    /*        margin-bottom: 30px;*/
    /*    }*/

    /*    .my-butedit {*/
    /*        width: 100%;*/
    /*        margin-top: 25px;*/
    /*    }*/

    /*    .my-form {*/
    /*        !*padding: 5px;*!*/
    /*        margin-bottom: 5px;*/
    /*        margin-top: 5px;*/
    /*    }*/

    /*    .my-table {*/
    /*        width: 100%;*/


    /*    }*/


    /*}*/

    /*!*.my-but {*!*/
    /*!*    width: 100%;*!*/

    /*!*    !*margin-top: 15px;*!*!*/
    /*!*}*!*/

</style>
<body>
<?php
require('lineloginlibery.php');
require('lineDB.php');
require('userDb.php');
$LineLogin = new LineLoginLib();
$lineDb = new LineDB();
$userDb = new UserDb();
if (is_null($_SESSION["email"])) {
    if (!header("Location: login.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    }
}
if ($lineDb->checkFirstTime($_SESSION['email']) == 1) {
    header("Location: firsttimelinetoken.php");
}
if (isset($_GET['logout'])) {

    $LineLogin->logout();
}

?>
<?php

function redir()
{
    if (!header("Location: profile.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
    }
}

$userid = $userDb->getUserId($_SESSION['email']);
if (isset($_POST['changprofile'])) {
    if ($userDb->login($_SESSION['email'], $_POST['cfpass']) && trim($_POST['cfpass']) != "") {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $arr = array("fname" => "$fname",
            "lname" => $lname);

        $userDb->updateProfile($arr, $userid);
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#cprofile').modal('show');
            });
        </script>";

    } else {
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#wpass').modal('show');
            });
        </script>";
    }
}
if (isset($_POST['editpassword'])) {
    $password = $userDb->getPassword($_SESSION['email']);
    if ($password == trim($_POST['password']) && trim($_POST['newpassword']) != "") {
        $userDb->editPassword(trim($_POST['newpassword']), $userid);
        ?>
        <script type='text/javascript'>
            $(document).ready(function () {
                $('#cpass').modal('show');
            });
        </script>
    <?php
    } else {
    ?>
        <script type='text/javascript'>
            $(document).ready(function () {
                $('#wpass').modal('show');
            });
        </script>
        <?php
    }

}
if (isset($_POST['changetoken'])) {
    if (trim($_POST['token']) == "") {
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#nulltoken').modal('show');
            });
        </script>";
    } elseif (trim($_POST['cfpass']) == "" || $userDb->getPassword($_SESSION['email']) != trim($_POST['cfpass'])) {
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#wpass').modal('show');
            });
        </script>";
    } else {

        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#ctoken').modal('show');
            });
        </script>";
        $lineDb->editToken($_POST['token'], $_SESSION['email']);
    }
}
$firstname = $userDb->getName($_SESSION['email']);
$lastname = $userDb->getLastName($_SESSION['email']);
?>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top boxandshadow">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            Menu<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav nav-pills navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link text-danger" href="profile.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-primary" href="mmassage.php">Massage manager</a></li>
                <li class="nav-item"><a class="nav-link text-success" href="sendnow.php?send=now">Broadcast</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="info.php">Information</a></li>
                <li class="nav-item"><a class="nav-link text-info" href="loginhis.php">Activity</a></li>
            </ul>
            <ul class="nav ml-auto navbar-nav">
            <li class="nav-item">
                    <img src="<?php
                    
                    
                    if ($userDb->getPic($_SESSION['email']) != "") {
                        $pic = $userDb->getPic($_SESSION['email']);
                        // $pic = "http://www.cs.rmutk.ac.th/image/utk.jpg";
                    }elseif($LineLogin->getpic() != "")
                    {
                        $pic = $LineLogin->getpic();
                    }else {
                        $pic = "http://www.cs.rmutk.ac.th/image/utk.jpg";
                    }
                    echo $pic;
                    ?>"
                         style="width: 40px;height: 40px;border-radius: 10px 10px 10px 10px; ">
                </li>
                <li class="dropdown">
                    <a class="text-success dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                        LINE <img
                                src="lineIcon.png"
                                style="width: 20px;height: 20px;border-radius: 10px 10px 10px 10px; ">
                        <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu bg-dark">
                        <li class="nav-item"><a class="nav-link text-primary" href="#">FACEBOOK
                                <img src="FBIcon.png"
                                     style="width: 20px;height: 20px;border-radius: 10px 10px 10px 10px; "></a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-info" href="#">TWITTER
                                <img src="twitterIcon.png"
                                     style="width: 20px;height: 20px;border-radius: 10px 10px 10px 10px; "></a>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="?logout">logout <img
                                src="logout.png"
                                style="width: 20px;height: 20px;"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="col-md-12 jumbotron jumbotron-fluid box text-success" style="margin-top: 50px;">
    <!--            <div class="jumbotron jumbotron-fluid">-->
    <div style="font-size: 32px">
        <div><b><span style="color:#5b7cd6;">E</span><span style="color:#6772ce;">d</span><span
                        style="color:#7267c5;">i</span><span style="color:#7e5dbd;">t</span><span
                        style="color:#8952b4;"> </span><span style="color:#9548ac;">p</span><span
                        style="color:#a03da3;">r</span><span style="color:#af4294;">o</span><span
                        style="color:#be4885;">f</span><span style="color:#cd4d76;">i</span><span
                        style="color:#dc5367;">l</span><span style="color:#eb5858;">e</span></b></div>
    </div>
    <!--            </div>-->
</div>
<div class="container-fluid">
    <div>
        <div style="font-size: 16px">
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="mybox massagemanager">
                        <p>
                        <h1>
                            Edit profile
                        </h1>
                        </p>
                        <hr>
                        <form action="editprofile.php" method="post">
                            <div class="row">

                                <div class="col-md-4 my-form">
                                    First name
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="fname" class="form-control"
                                           value="<?php echo $firstname; ?>">
                                </div>
                                <div class="col-md-4 my-form">
                                    Last name
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="lname" class="form-control"
                                           value="<?php echo $lastname; ?>">
                                </div>
                                <div class="col-md-4 my-form">
                                    Confirm password
                                </div>
                                <div class="col-md-7">
                                    <input type="password" name="cfpass" class="form-control">
                                </div>

                            </div>
                            <hr>
                            <!--                        </form>-->
                            <div class="row my-butedit">
                                <div class="col-md-12" style="margin-left: ">
                                    <input type="submit" name="changprofile" value="Edit profile"
                                           class="btn btn-outline-success">
                                </div>
                            </div>
                            <!--                        </form>-->
                    </div>
                </div>
                <div class="col-md-6" align="center">
                    <div class="mybox massagemanager">
                        <form action="editprofile.php" method="post">
                            <p>
                            <h1>
                                Change password
                            </h1>
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 my-form">
                                    Password
                                </div>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-md-4 my-form">
                                    New password
                                </div>
                                <div class="col-md-7">
                                    <input type="password" name="newpassword" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="row my-butedit">
                                <div class="col-md-12">
                                    <input type="submit" name="editpassword" value="Change password"
                                           class="btn btn-outline-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6" align="center">
                    <div class="myboxrow2 massagemanager">
                        <h1>
                            <p>
                                Change token
                            </p>
                        </h1>
                        <hr>
                        <form method="post" action="editprofile.php">
                            <div class="row">
                                <div class="col-md-4 my-form">
                                    Your token
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="token" class="form-control"
                                           value="<?php echo $lineDb->getToken($_SESSION['email']); ?>">
                                </div>
                                <div class="col-md-4 my-form">
                                    Confirm password
                                </div>
                                <div class="col-md-7">
                                    <input type="password" name="cfpass" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="row my-butedit">
                                <div class="col-md-12">
                                    <input type="submit" name="changetoken" value="Change token"
                                           class="btn btn-outline-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix visible-lg"></div>
    </div>
</div>


<div class="modal fade" id="wpass">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">
                    <img src="xIcon.png" width="50px" height="50px"> wrong password</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" align="center">
                รหัสผ่านผิด
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="cpass">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">changed password
                </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                เปลี่ยนรหัสผ่านแล้ว
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="cprofile">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">changed profile
                </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                เปลี่ยนข้อมูลส่วนตัวแล้ว
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="nulltoken">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><img src="xIcon.png" width="50px" height="50px"> Null token
                </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                token ว่าง
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="ctoken">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">changed token
                </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                เปลี่ยน token แล้ว
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>
