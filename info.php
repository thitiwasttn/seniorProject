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
if ($lineDb->checkFirstTime($_SESSION['email']) == 1) {
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

                <li class="nav-item"><a class="nav-link text-danger" href="profile.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-primary" href="mmassage.php">Massage manager</a></li>
                <li class="nav-item"><a class="nav-link text-success" href="sendnow.php?send=now">Broadcast</a></li>
                <li class="nav-item"><a class="nav-link bg-warning text-dark" href="info.php">Information</a></li>
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
                <span style="color:#bf2dff;">P</span><span style="color:#6e7de3;">r</span><span
                        style="color:#1dcdc7;">o</span><span style="color:#21dc93;">f</span><span
                        style="color:#906eb4;">i</span><span style="color:#ff00d4;">l</span><span
                        style="color:#eb8080;">e</span>
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
                        <!--                        <div style="width: 5px;height: 1px;margin-top: -30px"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"-->
                        <!--                                  width="30" height="30"-->
                        <!--                                  viewBox="0 0 171 171"-->
                        <!--                                  style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,171.99277v-171.99277h171.99277v171.99277z" fill="none"></path><g fill="#f1c40f"><g id="surface1"><path d="M88.39453,14.25l-10.01953,10.01953l7.34766,7.34766c-11.32764,16.03125 -17.36719,39.63281 -17.36719,39.63281l-15.14062,7.57031l-10.46484,-10.46484l-10.01953,10.01953l59.89453,59.89453l10.01953,-10.01953l-11.13281,-11.13281l7.57031,-15.14062c0,1.19678 25.32715,-7.37549 40.07813,-16.92187l7.57031,7.57031l10.01953,-10.01953zM49.875,111.10547l-35.625,35.625l10.01953,10.01953l35.625,-35.625z"></path></g></g></g></svg>-->
                        <!--                        </div>-->
                        <!--                        <br>-->
                        <p>
                        <h1>
                            Profile
                        </h1>
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 my-text">
                                <b>First name :</b>
                            </div>
                            <div class="col-md-7 my-data">
                                <?php echo $userDb->getName($_SESSION['email']); ?>
                            </div>
                            <div class="col-md-4 my-text">
                                <b>Last name :</b>
                            </div>
                            <div class="col-md-7 my-data">
                                <?php echo $userDb->getLastName($_SESSION['email']); ?>
                            </div>
                            <div class="col-md-4 my-text">
                                <b>Email :</b>
                            </div>
                            <div class="col-md-7 my-data">
                                <?php echo $_SESSION['email']; ?>
                            </div>
                        </div>
                        <hr>

                        <form method="post" action="info.php">
                            <div class="row my-butedit">
                                <div class="col-md-12" style="margin-left: ">
                                    <input type="submit" name="submit" value="Edit profile"
                                           class="btn btn-outline-success">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="mybox massagemanager">
                        <p>
                        <h1>
                            Quota broadcast
                        </h1>
                        </p>
                        <hr>
                        <?php
                        $limite = $LineLogin->getLimitBroadCast($lineDb->getToken($_SESSION['email']));
                        $limite = $limite['value'];
                        $used = $LineLogin->getSent($lineDb->getToken($_SESSION['email']));
                        $used = $used['totalUsage'];
                        ?>
                        <div style="font-size: 20px;">
                            <font style="color: red"><b> <?php echo $used . "</b></font>/" . $limite; ?>
                            </font>
                        </div>
                        <hr>
                    </div>
<!--                    <div class="myboxrow2 massagemanager">-->
<!--                        <p>-->
<!--                        <h1>-->
<!--                            Activity log-->
<!--                        </h1>-->
<!--                        </p>-->
<!--                        <hr>-->
<!--                        <a href="loginhis.php" class="btn btn-outline-primary">Login history</a>-->
<!--                        <hr>-->
<!--                    </div>-->
                </div>
            </div>

            <div class="clearfix visible-lg"></div>
        </div>
    </div>

</body>
</html>

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