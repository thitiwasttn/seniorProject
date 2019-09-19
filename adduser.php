<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<style>


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
//if ($lineDb->checkFirstTime($_SESSION['email']) == 1) {
//    if (!header("Location: firsttimelinetoken.php")) {
//        echo '<meta http-equiv="refresh" content="0;URL=firsttimelinetoken.php">';
//    }
//}
if (isset($_GET['logout'])) {
    $LineLogin->logout();
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $ar = array(
        "email" => "'$email'",
        "password" => "'$password'",
        "fname" => "'$fname'",
        "lname" => "'$lname'",
    );
    if ($fname == "" || $lname == "" || $email == "" || $password == "" || $cpassword == "") {
        echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#null').modal('show');
                    });
                  </script>";
    } elseif ($cpassword != $password) {
        echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#notsamepassword').modal('show');
                    });
                  </script>";
//        setForm("not same", "");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        setForm("", "Invalid email format<br>", "");
    } elseif ($userDb->checkEmail($email) == 1) {
        echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#alreadyemail').modal('show');
                    });
                  </script>";
//        setForm("", "email ซ้ำ<br>", "");
    } elseif ($userDb->checkEmail($email) == 0) {
        if ($userDb->add($ar, "user") == 1) {
            echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#done').modal('show');
                    });
                  </script>";

        } else {
//            setForm("", "", "denied");
        }
    }
}

?>

<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top boxandshadow">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            Menu<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav nav-pills navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link active bg-success" href="devconsole.php">User manager</a></li>
                <!--                <li class="nav-item"><a class="nav-link text-primary" href="mmassage.php">Massage manager</a></li>-->
                <!--                <li class="nav-item"><a class="nav-link text-success" href="sendnow.php">Broadcast</a></li>-->
                <!--                <li class="nav-item"><a class="nav-link text-warning" href="#">Information</a></li>-->

            </ul>
            <ul class="nav ml-auto navbar-nav">
            <li class="nav-item">
                    <img src="<?php
                    
                    $pic = $userDb->getPic($_SESSION['email']);
                    if ($pic == "") {
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
                    <a class="nav-link text-danger" href="login.php">logout <img
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
        <div><b>
                <span style="color:#474747;">A</span><span style="color:#606060;">d</span><span
                        style="color:#797979;">d</span><span style="color:#919191;"> </span><span
                        style="color:#aaaaaa;">u</span><span style="color:#898989;">s</span><span
                        style="color:#686868;">e</span><span style="color:#474747;">r</span>
            </b></div>
    </div>
    <!--            </div>-->
</div>
<div class="container-fluid">
    <div>


        <div style="font-size: 16px">
            <div class="row">
                <div class="col-md-12" align="center">
                    <div class="mybox massagemanager">
                        <p>
                        <h1 align="center">
                            User
                        </h1>
                        </p>
                        <hr>
                        <form method="post" action="adduser.php">
                            <div class="row my-half">
                                <div class="col-md-12">
                                    <input type="text" name="fname" placeholder="first name" class="form-control">
                                </div>
                                <div class="col-md-12 row2 my-row2">
                                    <input type="text" name="lname" placeholder="last name" class="form-control">
                                </div>
                                <div class="col-md-12 row2 my-row2">
                                    <input type="email" name="email" placeholder="email" class="form-control">
                                </div>
                                <div class="col-md-12 row2 my-row2">
                                    <input type="password" name="password" placeholder="password" class="form-control">
                                </div>
                                <div class="col-md-12 row2 my-row2">
                                    <input type="password" name="cpassword" placeholder="confirm password"
                                           class="form-control">
                                </div>
                            </div>
                            <hr>
                            <input type="submit" value="Submit" name="submit" class="btn btn-outline-success">
                        </form>
                    </div>
                </div>


            </div>

            <div class="clearfix visible-lg"></div>
        </div>
    </div>
    <div class="modal fade" id="notsamepassword">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><img src="xIcon.png" width="50px" height="50px">
                        Not same password
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    password ไม่ตรงกัน
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">-->
                    <a href="" class="btn btn-danger">Close</a>
                    <!--                            </button>-->
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="null">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><img src="xIcon.png" width="50px" height="50px">
                        Null
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    ห้ามว่าง
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">-->
                    <a href="" class="btn btn-danger">Close</a>
                    <!--                            </button>-->
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="alreadyemail">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><img src="xIcon.png" width="50px" height="50px">
                        Email has already
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    มี email อยู่แล้วในระบบ
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">-->
                    <a href="" class="btn btn-danger">Close</a>
                    <!--                            </button>-->
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="done">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Added
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    เพิ่มแล้ว
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">-->
                    <a href="devconsole.php" class="btn btn-danger">Close</a>
                    <!--                            </button>-->
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>