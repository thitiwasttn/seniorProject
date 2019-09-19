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
if ($lineDb->checkFirstTime($_SESSION['email']) == 1 || $userDb->checkNullPassword($_SESSION['email'])) {
    if (!header("Location: firsttimelinetoken.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=firsttimelinetoken.php">';
    }
}
if (isset($_GET['logout'])) {
    $LineLogin->logout();
}
?>

<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top boxandshadow">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            Menu<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav nav-pills navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link active bg-danger" href="profile.php">Home</a></li>
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
        <div class="my-headfont"><b>
                <span style="color:#5b7cd6;">W</span><span style="color:#7267c5;">e</span><span
                        style="color:#8952b4;">l</span><span style="color:#a03da3;">c</span><span
                        style="color:#b9468a;">o</span><span style="color:#d24f71;">m</span><span
                        style="color:#eb5858;">e</span>
            </b></div>
    </div>
    <!--            </div>-->
</div>
<div class="container-fluid">
    <div class="col-me-12" align="center">
        <div class="row mybox massagemanager">


            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div align="left" class="elfsight-app-f1d03808-aee8-4cc7-916a-09ca046de1f8"><hr></div>


        </div>

    </div>
</div>

</body>
</html>
<?php

?>