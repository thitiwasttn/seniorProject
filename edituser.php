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
if (isset($_GET['logout'])) {
    $LineLogin->logout();
}
if (isset($_POST['edit'])) {
    $ar = array();
    $ar['type'] = ($_POST['type'] == "admin") ? "2" : "1";
    $ar['fname'] = $_POST['fname'];
    $ar['lname'] = $_POST['lname'];
    if ($userDb->updateAdminProfile($ar, $userDb->getUserId($_POST['email']))) {
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#updated').modal('show');
            });
          </script>";
    }
}
if(isset($_POST['delete']))
{
    if($userDb->updateStatus($userDb->getUserId($_POST['email'])))
    {
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#delete').modal('show');
            });
          </script>";
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
                <span style="color:#474747;">E</span><span style="color:#606060;">d</span><span
                        style="color:#797979;">i</span><span style="color:#919191;">t</span><span
                        style="color:#aaaaaa;"> </span><span style="color:#919191;">u</span><span
                        style="color:#797979;">s</span><span style="color:#606060;">e</span><span
                        style="color:#474747;">r</span>
            </b></div>
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
                        <h1 align="center">
                            User
                        </h1>
                        </p>
                        <hr>
                        <form action="edituser.php?email=<?php echo $_GET['email']?>" method="post">
                            <div class="col-md-12">
                                <input type="text" name="fname" value="<?php echo $userDb->getName($_GET['email']); ?>"
                                       placeholder="fname" class="form-control">
                                <input type="text" name="lname"
                                       value="<?php echo $userDb->getLastName($_GET['email']); ?>" placeholder="lname"
                                       class="form-control"
                                       style="margin-top: 5px;">
                                <input type="text" name="email" value="<?php echo $_GET['email']; ?>"
                                       placeholder="email" class="form-control"
                                       style="margin-top: 5px;" disabled>
                                <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                                <select name="type" class="custom-select" style="margin-top: 5px;">
                                    <?php
                                    if ($userDb->gettype($_GET['email']) == "user") {
                                        echo '<option selected value="user">User</option>
                                                <option value="admin">Admin</option>';
                                    } elseif ($userDb->gettype($_GET['email']) == "admin") {
                                        echo '<option  value="user">User</option>
                                                <option selected value="admin">Admin</option>';
                                    }
                                    ?>

                                </select>
                            </div>

                            <hr>

                            <input type="submit" value="Edit" name="edit" class="btn btn-outline-success">
                        </form>

                    </div>
                </div>
                <div class="col-md-6" align="center">
                    <div class="mybox massagemanager">
                        <p>
                        <h1 align="center" class="text-danger">
                            Delete?
                        </h1>
                        </p>
                        <hr color="red">
                        <form method="post" action="edituser.php">
                            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                            <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger">
                        </form>
                        <hr color="red">

                    </div>
                </div>


            </div>

            <div class="clearfix visible-lg"></div>
        </div>
    </div>
    <div class="modal fade" id="updated">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Updated
                    </h4>

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
    <div class="modal fade" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Deleted
                    </h4>

                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    ลบแล้ว
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="devconsole.php" class="btn btn-success">Close</a>
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
<?php

function redir()
{
    if (!header("Location: editprofile.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=editprofile.php">';
    }
}

if (isset($_POST['submit'])) {
    redir();
}
?>