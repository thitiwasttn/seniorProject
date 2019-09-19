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
    <!--    <link rel="stylesheet" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
    <!--    <script src="cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script
            type="text/javascript">

        $(document).ready(function () {
            $('#myTable').DataTable({
                "order": [[0, "desc"]]
            });
        });

        $(document).ready(function () {
            $('#myTable').DataTable();
        });

        $(document).ready(function () {
            $('#logTab2').DataTable({
                "order": [[1, "desc"]]
            });
        });

        $(document).ready(function () {
            $('#logTab2').DataTable();
        });


    </script>


</head>
<style>


</style>
<body>
<?php
require('lineloginlibery.php');
require('lineDB.php');
require('userDb.php');
require('logDb.php');
$LineLogin = new LineLoginLib();
$lineDb = new LineDB();
$userDb = new UserDb();
$logDb = new logDb();
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
?>

<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top boxandshadow">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            Menu<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav nav-pills navbar-nav mr-auto">

                <li class="nav-item"><a class="nav-link text-success" href="devconsole.php">User manager</a></li>
                <li class="nav-item"><a class="nav-link active bg-primary" href="adloghis.php">login history</a></li>
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
                <span style="color:#ff0040;">A</span><span style="color:#ff0060;">c</span><span
                        style="color:#ff0080;">t</span><span style="color:#ff00a0;">i</span><span
                        style="color:#ff00bf;">v</span><span style="color:#ff00df;">i</span><span
                        style="color:#ff00ff;">t</span><span style="color:#cc00ff;">y</span><span
                        style="color:#9900ff;"> </span><span style="color:#6600ff;">L</span><span
                        style="color:#3300ff;">o</span><span style="color:#0000ff;">g</span>
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
                            Login history
                        </h1>
                        </p>
                        <hr>

                        <table id="logTab2" class="table table-striped table-bordered">

                            <thead>
                            <tr>
                                <th>IP</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $re = $logDb->getLog($userDb->getUserId($_SESSION['email']));
                            //                                                        print_r($re);
                            $i = 0;
                            while ($i < sizeof($re)) {
                                echo "<tr>";
                                echo "<td>" . $re[$i]['ip'] . "</td>";
                                $arr2 = str_split($re[$i]['date'], 10);
                                echo "<td>" . $arr2[0] . "</td>";
                                echo "<td>" . $arr2[1] . "</td>";
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>IP</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            </tfoot>
                        </table>
                        <hr>


                    </div>

                </div>


            </div>

            <div class="clearfix visible-lg"></div>
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

?>