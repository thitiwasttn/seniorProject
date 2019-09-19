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
    <script type="text/javascript" src="jQuery_workshop/jQueryui/jquery.js">
    </script>
    <script type="text/javascript" src="jQuery_workshop/jQueryui/jquery-ui.js">
    </script>
    <!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
    <!--    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script
            type="text/javascript">
        $(function () {
            $("#Tab").tabs();
        });

        $(document).ready(function () {
            $('#myTable').DataTable({
                "order": [[1, "desc"]]
            });
        });
        $(document).ready(function () {
            $('#myTable1').DataTable({
                "order": [[1, "desc"]]
            });
        });
        $(document).ready(function () {
            $('#myTable2').DataTable({
                "order": [[1, "desc"]]
            });
        });

        $(document).ready(function () {
            $('#myTable').DataTable();
        })
        $(document).ready(function () {
            $('#myTable2').DataTable();
        });
        $(document).ready(function () {
            $('#myTable1').DataTable();
        });

    </script>
    <script type="text/javascript">
        document.getElementById("open").click();

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it

    </script>
</head>
<body>
<?php
require('lineloginlibery.php');
require('lineDB.php');
require('massageDb.php');
require('userDb.php');
$userDb = new UserDb();
$massageDb = new MassageDb();
$LineLogin = new LineLoginLib();
$lineDb = new LineDB();
if (is_null($_SESSION["email"])) {
    if (!header("Location: login.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    }
}
if ($lineDb->checkFirstTime($_SESSION['email']) == 1) {
    header("Location: firsttimelinetoken.php");
}
//header("Location: http://localhost/project/linehome.php?profile");


if (isset($_GET['logout'])) {

    $LineLogin->logout();
    // header("Location: login.php");
}
if (isset($_GET['sort'])) {
    if ($_GET['sort'] == "datein" && ($_SESSION['count'] == "0" || is_null($_SESSION['count']))) {
        $_SESSION['count'] = "1";
        $order = "`massage`.`datein` DESC";
    } elseif ($_SESSION['count'] == "1" && $_GET['sort'] == "datein") {
        $order = "`massage`.`datein` ASC";
        $_SESSION['count'] = "0";
    }
    if ($_GET['sort'] == "dateout" && ($_SESSION['count'] == "0" || is_null($_SESSION['count']))) {
        $_SESSION['count'] = "1";
        $order = "`massage`.`dateout` DESC";
    } elseif ($_SESSION['count'] == "1" && $_GET['sort'] == "dateout") {
        $order = "`massage`.`dateout` ASC";
        $_SESSION['count'] = "0";
    }
} else {
    $order = "`massage`.`dateout` DESC";
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
                <li class="nav-item"><a class="nav-link bg-primary text-light active" href="#">Massage manager</a></li>
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
                                style="width: 25px;height: 25px;"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="col-md-12 jumbotron jumbotron-fluid box text-success" style="margin-top: 50px;">
    <!--            <div class="jumbotron jumbotron-fluid">-->
    <div style="font-size: 32px">
        <div class="my-headfont"><b><span style="color:#ff0000;">M</span><span style="color:#ff1200;">a</span><span
                        style="color:#ff2400;">s</span><span style="color:#ff3600;">s</span><span
                        style="color:#ff4900;">a</span><span style="color:#ff5b00;">g</span><span
                        style="color:#ff6d00;">e</span><span style="color:#ff7f00;"> </span><span
                        style="color:#db9012;">m</span><span style="color:#b6a224;">a</span><span
                        style="color:#92b336;">n</span><span style="color:#6dc449;">a</span><span
                        style="color:#49d55b;">g</span><span style="color:#24e76d;">e</span><span
                        style="color:#00f87f;">r</span></b></div>
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
                            Massage
                        </h1>
                        </p>
                        <hr>
                        <div>
                            <div class="mytab">
                                <div class="tab" >
                                    <button id="open" class="tablinks" onclick="openCity(event, 'timer')">
                                        ตั้งเวลา
                                    </button>
                                    <button class="tablinks" onclick="openCity(event, 'sent')">
                                        ส่งแล้ว
                                    </button>
                                    <button class="tablinks" onclick="openCity(event, 'error')">
                                        ผิดพลาด
                                    </button>
                                    <button class="tablinks">
                                        <a href="sendnow.php" class="text-success">เพิ่มข้อความ</a>
                                    </button>
                                </div>

                                <div id="timer" class="tabcontent" align="left">
                                    <p>
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style='text-align: center;'>ข้อความ</th>
                                            <th style='text-align: center'>วันที่ตั้งเวลา
                                            </th>
                                            <th style='text-align: center'>วันที่ตั้งส่ง</th>
                                            <th style='text-align: center'>Time-Line</th>
                                            <th style='text-align: center'>เป้าหมาย</th>
                                        </tr>
                                        <thead>
                                        <tbody>
                                        <?php

                                        $arTMassage = $massageDb->showTimerMassage($_SESSION["email"], $order);
                                        $i = 0;
                                        while ($i < sizeof($arTMassage)) {
                                            echo "<tr>";
                                            ?>
                                            <form method="post" action="massagedetails.php">

                                                <?php
                                                echo "<td>";
                                                $massid = $arTMassage[$i]["massageid"];

                                                $massage = str_replace("\n", "<br>", $arTMassage[$i]["massage"]);
                                                //                                                $massage = $arTMassage[$i]["massage"];
                                                $mas = $arTMassage[$i]["massage"];
                                                echo '<input type="hidden" value="' . $massid . '" name="massid">
                                                <input type="image" src="edutIcon.png" class="my-icon" align="right">';
                                                if ($arTMassage[$i]["typemassage"] == "image") {
                                                    echo "<a href='image/$mas'><img src='image/$mas' class='my-pic'></a>";
                                                } else {
                                                    echo "<div class='my-textline ellipsis'>" . $massage . "</div>";
//                                                    echo $massage;
                                                }
                                                $dateout = $arTMassage[$i]['dateout'];
                                                $arr2 = str_split($dateout, 10);
                                                $time = str_replace(" ", "", $arr2[1]);
                                                echo "</td>";
                                                echo "<td style='text-align: center'>";
                                                echo str_replace("", "<br>", $arTMassage[$i]["datein"]);
                                                echo "</td>";
                                                echo "<td style='text-align: center'>";
                                                echo str_replace("", "<br>", $arTMassage[$i]["dateout"]);
                                                echo "</td>";
                                                echo "<td style='text-align: center'>";
                                                echo ($arTMassage[$i]["timeline"] == "0") ? "no" : "yes";
                                                echo "</td>";
                                                echo "<td style='text-align: center'>";
                                                echo $arTMassage[$i]["target"];
                                                echo "</td>";
                                                echo "</tr>";
                                                $i++;
                                                ?>
                                            </form>
                                            <?php
                                        }
                                        $arTMassage = null;
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style='text-align: center;'>ข้อความ</th>
                                            <th style='text-align: center'>วันที่ตั้งเวลา
                                            </th>
                                            <th style='text-align: center'>วันที่ตั้งส่ง</th>
                                            <th style='text-align: center'>Time-Line</th>
                                            <th style='text-align: center'>เป้าหมาย</th>
                                        </tr>
                                        <tfoot>
                                    </table>
                                    </p>
                                </div>

                                <div id="sent" class="tabcontent">
                                    <p>
                                    <table id="myTable1" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th style='text-align: center;'>ข้อความ</th>
                                            <th style='text-align: center'>วันที่ตั้งเวลา

                                            </th>
                                            <th style='text-align: center'>วันที่ตั้งส่ง

                                            <th style='text-align: center'>Time-Line</th>
                                            <th style='text-align: center'>เป้าหมาย</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $arTMassage = $massageDb->showSentMassage($_SESSION["email"], $order);
                                        $i = 0;
                                        //                        print_r($arTMassage);
                                        date_default_timezone_set("Asia/Bangkok");

                                        $y = date("Y", time());
                                        $m = date("m", time());
                                        $d = date("d", time());

                                        while ($i < sizeof($arTMassage)) {
                                            ?>

                                            <?php
                                            echo "<tr><form method=\"post\" action=\"massagedetails.php\">";
                                            //
                                            echo "<td class='ellipsis'>";
                                            $massid = $arTMassage[$i]["massageid"];
                                            //
                                            $massage = str_replace("\n", "<br>", $arTMassage[$i]["massage"]);
                                            $mas = $arTMassage[$i]["massage"];
                                            echo '<input type="hidden" value="' . $massid . '" name="massid">
                                                <input type="image" src="edutIcon.png" class="my-icon" align="right">';
                                            if ($arTMassage[$i]["typemassage"] == "image") {
                                                echo "<a href='image/$mas'><img src='image/$mas' class='my-pic'></a>";
                                            } else {
                                                echo "<div class='my-textline ellipsis'>" . $massage . "</div>";
                                            }

                                            $dateout = $arTMassage[$i]['dateout'];
                                            $arr2 = str_split($dateout, 10);
                                            $time = str_replace(" ", "", $arr2[1]);
                                            //
                                            $min = $y . "-" . $m . "-" . $d;


                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo str_replace("", "<br>", $arTMassage[$i]["datein"]);
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo str_replace("", "<br>", $arTMassage[$i]["dateout"]);
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo ($arTMassage[$i]["timeline"] == "0") ? "no" : "yes";
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo $arTMassage[$i]["target"];
                                            echo "</td>";

                                            echo "</tr>";
                                            $i++;
                                            ?>
                                            </form>
                                            <?php
                                        }
                                        $arTMassage = null;

                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style='text-align: center;'>ข้อความ</th>
                                            <th style='text-align: center'>วันที่ตั้งเวลา
                                            </th>
                                            <th style='text-align: center'>วันที่ตั้งส่ง</th>
                                            <th style='text-align: center'>Time-Line</th>
                                            <th style='text-align: center'>เป้าหมาย</th>
                                        </tr>
                                        <tfoot>
                                    </table>
                                    </p>
                                </div>

                                <div id="error" class="tabcontent">
                                    <p>
                                    <table id="myTable2" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th style='text-align: center;'>ข้อความ</th>
                                            <th style='text-align: center'>วันที่ตั้งเวลา

                                            </th>
                                            <th style='text-align: center'>วันที่ตั้งส่ง
                                            </th>
                                            <th style='text-align: center'>Time-Line</th>
                                            <th style='text-align: center'>เป้าหมาย</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $arTMassage = $massageDb->showErrorMassage($_SESSION["email"], $order);
                                        $i = 0;
                                        date_default_timezone_set("Asia/Bangkok");
                                        $y = date("Y", time());
                                        $m = date("m", time());
                                        $d = date("d", time());

                                        while ($i < sizeof($arTMassage)) {
                                            ?>

                                            <?php
                                            echo "<tr><form method=\"post\" action=\"massagedetails.php\">";
                                            echo "<td class='ellipsis'>";
                                            $massid = $arTMassage[$i]["massageid"];
                                            $massage = str_replace("\n", "<br>", $arTMassage[$i]["massage"]);
                                            $mas = $arTMassage[$i]["massage"];
                                            echo '<input type="hidden" value="' . $massid . '" name="massid">
                                                <input type="image" src="edutIcon.png" class="my-icon" align="right">';
                                            if ($arTMassage[$i]["typemassage"] == "image") {
                                                echo "<a href='image/$mas'><img src='image/$mas' class='my-pic'></a>";
                                            } else {
                                                echo "<div class='my-textline ellipsis'>" . $massage . "</div>";
                                            }
                                            $dateout = $arTMassage[$i]['dateout'];
                                            $arr2 = str_split($dateout, 10);
                                            $time = str_replace(" ", "", $arr2[1]);
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo str_replace("", "<br>", $arTMassage[$i]["datein"]);
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo str_replace("", "<br>", $arTMassage[$i]["dateout"]);
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo ($arTMassage[$i]["timeline"] == "0") ? "no" : "yes";
                                            echo "</td>";
                                            echo "<td style='text-align: center'>";
                                            echo $arTMassage[$i]["target"];
                                            echo "</td>";
                                            echo "</tr>";
                                            $i++;
                                            ?>
                                            </form>
                                            <?php
                                        }
                                        $arTMassage = null;

                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th style='text-align: center;'>ข้อความ</th>
                                            <th style='text-align: center'>วันที่ตั้งเวลา
                                            </th>
                                            <th style='text-align: center'>วันที่ตั้งส่ง</th>
                                            <th style='text-align: center'>Time-Line</th>
                                            <th style='text-align: center'>เป้าหมาย</th>
                                        </tr>
                                        <tfoot>
                                    </table>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>
        </div>

        <div class="clearfix visible-lg"></div>
    </div>
</div>

<?php

function redir()
{
    if (!header("Location: profile.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
    }
}

?>

</body>
</html>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("open").click();
</script>
