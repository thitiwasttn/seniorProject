<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 0;
            /*height: 100%;*/
        }

        /*            ul {
                        list-style-type: none;
                        margin: 0;
                        padding: 0;
                        width: 25%;
                        background-color: #f1f1f1;
                        position: fixed;
                        height: 100%;
                        overflow: auto;


                    }*/
        .ul {
            list-style-type: none;
            margin: 15px;
            background-color: #f2f2f2;
            /*padding: 0;*/
            width: auto;
            /* background-color: #f1f1f1; */
            position: fixed;
            height: auto;
            overflow: auto;
            border-radius: 15px;
            /* background-color: #f2f2f2; */
            box-shadow: 1px 1px 50px 1px;
            padding: 20px;
            margin-top: 100px;
            margin-right: 80%;
            /*width: 30%;*/
            /*margin-top: 20%;*/


        }

        .li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 10px;
            margin: 2px;


        }

        form,
        button[type=submit] {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 10px;
            margin: 2px;
        }

        .pic {
            display: block;
            color: #000;
            /*padding: 8px 16px;*/
            width: 200px;
            height: 200px;

            /*width: auto;*/
            /*height: auto;*/


            /*text-decoration: none;*/
            border-radius: 30px;
            margin: 30px 30px 30px 30px;
            /*margin-top: 5%;*/
        }

        li a.active {
            background-color: #4CAF50;
            color: white;
            /*box-shadow: 1px 1px 50px 1px graytext ;*/


        }

        li a:hover:not(.active) {
            background-color: #555;
            color: white;


        }

        .ul2 {
            list-style-type: none;
            margin: 0;
            position: fixed;

            /*margin-top: 0px;*/
            padding: 0;
            overflow: hidden;
            width: 100%;
            height: 56px;
            background-color: #333;
        }

        .li2 {
            float: left;
        }

        .li2 a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .li2 a:hover:not(.active) {
            background-color: #111;
        }

        .active2 {
            background-color: #4CAF50;
        }
    </style>
</head>

<?php
session_start();

require('lineloginlibery.php');
require('lineDB.php');
$LineLogin = new LineLoginLib();
$lineDb = new LineDB();
if (is_null($_SESSION["email"])) {
    header("Location: login.php");
}
if ($lineDb->checkFirstTime($_SESSION['email']) == 1) {
    header("Location: firsttimelinetoken.php");
}
//header("Location: http://localhost/project/linehome.php?profile");


if (isset($_GET['logout'])) {

    $LineLogin->logout();
}


?>

<body>


<font size="5">
    <ul class="ul">
        <?php echo '<li class="li"><a  href="profile.php">Profile</a></li>'; ?>
        <li class="li"><a href="mmassage.php">Massage manage</a></li>
        <li class="li"><a class="active" href="?m=bc">Broadcast</a></li>
        <?php echo '<li class="li"><a href="?m=info">Information</a></li>'; ?>
        <?php echo '<li class="li"><a  href="?logout">log out</a></li>'; ?>

        <li class="li">
            <div align="center"><img src="<?php echo $LineLogin->getpic(); ?>" class="pic"></div>
        </li>
    </ul>
</font>

<font size="5">
    <ul class="ul2">
        <li class="li2"><a class="active2" href="#home"><?php echo $LineLogin->getName(); ?></a></li>
        <li class="li2"><a href="#news">News2</a></li>
        <li class="li2"><a href="#contact">Contact2</a></li>
        <li class="li2"><a href="#about">About2</a></li>
    </ul>

</font>


<div style="margin-left:364px;padding:1px 16px;height: auto;">
    <div style="margin-top: 70px;">

        <h1 align="center">Broadcast</h1>
        <hr>
        <style>
            .boxbroadcast {
                border-radius: 15px;
                background-color: #f2f2f2;
                box-shadow: 1px 1px 50px 1px;
                padding: 20px;
                margin: 25px;

                width: 80%;

            }

            .massage {
                border-radius: 15px;
                /* box-shadow: 1px 1px 50px 1px; */
                padding: 15px;
                width: 70%;
            }

            .submit {
                width: 50%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .recipient {
                width: auto;
                border-radius: 5px;
                height: 25px;
            }

            .datepick {
                width: auto;
                border-radius: 5px;
                height: 25px;
            }

            .timepick {
                width: auto;
                border-radius: 5px;
                height: 25px;
            }
        </style>
        <div align="center">
            <div align="center" class="boxbroadcast">
                <form action="broadcast.php" method="post" enctype="multipart/form-data">
                    <p style="color: red">
                        <?php
                        $limited = $LineLogin->getLimitBroadCast($lineDb->getToken($_SESSION['email']));
                        $sent = $LineLogin->getSent($lineDb->getToken($_SESSION['email']));
                        ?>
                        จำนวนครีั้งที่เหลือ <?php echo $sent['totalUsage']."/".$limited['value']; ?>
                    </p>
                    <p>
                        ผู้รับ<br> <select class="recipient">
                            <option value="volvo">ทุกคน</option>
                            <option value="saab">ระบุคุณสมบัติ (ยังไม่เปิดให้บริการ)</option>

                        </select>
                    </p>
                    <p>
                        วันที่ และเวลาที่ส่ง<br>
                        <!--                <a href="">เพิ่มเวลา</a><br>-->
                        <?php
                        $actual_link = $_SERVER[REQUEST_URI];
                        ?>
                        <?php


                        date_default_timezone_set("Asia/Bangkok");

                        $y = date("Y", time());
                        $m = date("m", time());
                        $d = date("d", time());
                        $h = date("H", time());
                        $i = date("i", time());
                        $s = date("s", time());
                        ?>
                    <p>
                        <input class="datepick" type="date" id="myDate" value="<?php echo $_GET['date'] . ""; ?>"
                               name="date" onchange="date()" min=<?php echo $y . "-" . $m . "-" . $d; ?>>
                        <input class="timepick" type="time" id="mytime" value="<?php echo $_GET['time'] . ""; ?>"
                               name="time" onchange="time()">
                    </p>
                    <p>
                        <input class="datepick" type="date" id="myDate2" value="<?php echo $_GET['date2'] . ""; ?>"
                               name="date2" onchange="date2()" min=<?php echo $y . "-" . $m . "-" . $d; ?>>
                        <input class="timepick" type="time" id="mytime2" value="<?php echo $_GET['time2'] . ""; ?>"
                               name="time2" onchange="time2()">
                    </p>
                    <p>
                        <input class="datepick" type="date" id="myDate3" value="<?php echo $_GET['date3'] . ""; ?>"
                               name="date3" onchange="date3()" min=<?php echo $y . "-" . $m . "-" . $d; ?>>
                        <input class="timepick" type="time" id="mytime3" value="<?php echo $_GET['time3'] . ""; ?>"
                               name="time3" onchange="time3()">
                    </p>
                    </p>
                    <p>
                        ไทม์ไลน์ <input type="checkbox" name="timeline" value="true">
                    </p>

                    <p>

                        <input type="radio" name="t" value="text" onclick="setType('t','text');" id="text"> text
                        <input type="radio" name="t" value="sticker" onclick="setType('t','sticker');" id="sticker">
                        sticker
                        <input type="radio" name="t" value="pic" onclick="setType('t','image');" id="image"> image

                        <script>
                            function setType(varr, valuee) {

                                var url = new URL(window.location.href);

                                var query_string = url.search;

                                var search_params = new URLSearchParams(query_string);

                                search_params.set(varr, valuee);

                                url.search = search_params.toString();

                                // the new url string
                                var new_url = url.toString();

                                console.log(new_url);
                                window.open(new_url, "_self");
                            }
                        </script>
                        <?php

                        if ($_GET['t'] == 'text') {

                        ?>
                        <script>
                            document.getElementById("text").checked = true;
                        </script>

                        <?php

                        function setFormTextArea()
                        {
                        ?>
                    <p>

                    <textarea class="massage" name="massage" rows="10"
                              cols="30"></textarea>
                    <p>
                        <input type="button" class="" value="+" onclick="setType('t2','1')">
                    </p>


                    </p>
                    <?php

                    }
                    function setFormTextArea2()
                    {
                        ?>
                        <p>

                    <textarea class="massage" name="massage2" rows="10"
                              cols="30"></textarea>
                        <p>
                            <input type="button" class="" value="+" onclick="setType('t3','1')">
                        </p>


                        </p>
                        <?php

                    }

                    function setFormTextArea3()
                    {
                        ?>
                        <p>

                    <textarea class="massage" name="massage3" rows="10"
                              cols="30"></textarea>

                        </p>
                        <?php

                    }

                    setFormTextArea();
                    if ($_GET['t2'] == "1") {
                        setFormTextArea2();
                    }
                    if ($_GET['t3'] == "1") {
                        setFormTextArea3();
                    }

                    ?>
                    <p>
                        <input type="submit" class="submit">
                    </p>
                </form>
                <?php
                // echo $_GET['date'] . " " . $_GET['time'];
                echo "";
                } elseif ($_GET['t'] == 'sticker') {
                    ?>
                    <script>
                        document.getElementById("sticker").checked = true;
                    </script>
                    <?php
                    echo "";
                } elseif ($_GET['t'] == 'image') {
                    ?>
                    <script>
                        document.getElementById("image").checked = true;
                    </script>

                <?php
                function setFormImage()
                {
                ?>
                    <p>
                        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                    </p>
                <?php
                }function setFormImage2(){

                ?>
                    <p>
                        <input type="file" name="fileToUpload2" accept="image/*">
                    </p>
                <?php } function setFormImage3(){ ?>
                    <p>
                        <input type="file" name="fileToUpload3" accept="image/*">
                    </p>

                <?php } ?>


                    <?php


                    setFormImage();
                    setFormImage2();
                    setFormImage3();
                    echo '<p>
                        <input type="submit" class="submit">
                    </p>';
                }

                ?>

                </p>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
function insert($massage, $massage2, $massage3, $date, $date2, $date3, $time, $time2, $time3, $type, $massageDb)
{
    if ($massage != "" && $massage2 != "" && $massage3 != "") {
        if ($date != "" && $time != "" && $date2 != "" && $time2 != "" && $date3 != "" && $time3 != "") {
            echo "send m1 m2 m3 on date1 and time1 and date2 and time2 date3 time3";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar3 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage3 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar4 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar5 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar6 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage3 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar7 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date3 . " " . $time3 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar8 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date3 . " " . $time3 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar9 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage3 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date3 . " " . $time3 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
            $massageDb->add($ar3, "massage");
            $massageDb->add($ar4, "massage");
            $massageDb->add($ar5, "massage");
            $massageDb->add($ar6, "massage");
            $massageDb->add($ar7, "massage");
            $massageDb->add($ar8, "massage");
            $massageDb->add($ar9, "massage");
        } elseif ($date != "" && $time != "" && $date2 != "" && $time2 != "") {
            echo "send m1 m2 m3 on date1 and time1 and date2 and time2";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar3 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage3 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar4 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar5 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar6 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage3 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
            $massageDb->add($ar3, "massage");
            $massageDb->add($ar4, "massage");
            $massageDb->add($ar5, "massage");
            $massageDb->add($ar6, "massage");
        } elseif ($date != "" && $time != "") {

            echo "send m1 m2 m3 on date 1 and time1";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar3 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage3 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
            $massageDb->add($ar3, "massage");
        }
    } elseif ($massage != "" && $massage2 != "") {
        if ($date != "" && $time != "" && $date2 != "" && $time2 != "" && $date3 != "" && $time3 != "") {
            echo "send m1 and m2 on date1 and time1 and date2 and time2 date3 time3";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar3 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar4 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar5 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date3 . " " . $time3 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar6 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date3 . " " . $time3 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
            $massageDb->add($ar3, "massage");
            $massageDb->add($ar4, "massage");
            $massageDb->add($ar5, "massage");
            $massageDb->add($ar6, "massage");
        } elseif ($date != "" && $time != "" && $date2 != "" && $time2 != "") {
            echo "send m1 and m2 on date1 and time1 and date2 and time2";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar3 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar4 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
            $massageDb->add($ar3, "massage");
            $massageDb->add($ar4, "massage");
        } elseif ($date != "" && $time != "") {

            echo "send m1 and m2 on date 1 and time1";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage2 . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
        }
    } elseif ($massage != "") {
        if ($date != "" && $time != "" && $date2 != "" && $time2 != "" && $date3 != "" && $time3 != "") {
            echo "send m1 on date1 and time1 and date2 and time2 date3 time3";

            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar3 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date3 . " " . $time3 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");
            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
            $massageDb->add($ar3, "massage");
        } elseif ($date != "" && $time != "" && $date2 != "" && $time2 != "") {
            echo "send m1 on date1 and time1 and date2 and time2";
            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $ar2 = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date2 . " " . $time2 . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");
            $massageDb->add($ar, "massage");
            $massageDb->add($ar2, "massage");
        } elseif ($date != "" && $time != "") {
            $ar = array("email" => "'" . $_SESSION['email'] . "'",
                "massage" => "'" . $massage . "'",
                "datein" => "now()",
                "dateout" => "'" . $date . " " . $time . "'",
                "type" => "1",
                "typemassage" => $type,
                "timeline" => "0",
                "target" => "1",
                "recipient" => "");

            $massageDb->add($ar, "massage");

        }

    }
}

function upload($name)
{


//    echo "<br>2222222222222";
    $random = microtime(true);
    $target_dir = "image/";
//    $target_dir = $target_dir . $random;

    $target_file = $target_dir . basename($_FILES["$name"]["name"]);
////    $_FILES["fileToUpload"]["name"] = "5678";
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["$name"]["tmp_name"]);

        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
//
//
//// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    elseif ($_FILES["$name"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Allow certain file formats
    elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
////    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    elseif ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
    } else {
        $target_file = str_replace(".", "", $target_dir . $random) . "." . $imageFileType;
        if (move_uploaded_file($_FILES["$name"]["tmp_name"], $target_file)) {
////            $_FILES["fileToUpload"]["name"] = "5978";
            echo "The file " . basename($_FILES["$name"]["name"]) . " has been uploaded.";
            echo "name : " . $target_file;
            return str_replace(".", "", $random) . "." . $imageFileType;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }

}

function redir()
{
    if (!header("Location: mmassage.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=mmassage.php">';
    }
}

require("massageDb.php");
$massageDb = new MassageDb();
$date = $_POST['date'];
$date2 = $_POST['date2'];
$date3 = $_POST['date3'];
$time = $_POST['time'];
$time2 = $_POST['time2'];
$time3 = $_POST['time3'];
$t = $_POST['t'];

if ($t == "text") {
    $type = "1";
    $massage = trim($_POST['massage']);
    $massage2 = trim($_POST['massage2']);
    $massage3 = trim($_POST['massage3']);
    $massage = str_replace("'","\'",$massage);
    $massage2 = str_replace("'","\'",$massage2);
    $massage3 = str_replace("'","\'",$massage3);
    insert($massage, $massage2, $massage3, $date, $date2, $date3, $time, $time2, $time3, $type, $massageDb);
    redir();
} elseif ($t == "sticker") {
    $type = "3";
    //sticker

} elseif ($t == "pic") {
    $type = "2";
    $massage = upload("fileToUpload");
    $massage2 = upload("fileToUpload2");
    $massage3 = upload("fileToUpload3");
    insert($massage, $massage2, $massage3, $date, $date2, $date3, $time, $time2, $time3, $type, $massageDb);
    redir();
    //image
}
//$type = $_GET['type'];
//echo "massage1 = $massage<br>";
//echo "massage2 = $massage2<br>";
//echo "massage3 = $massage3<br>";
//echo "date = $date<br>";
//echo "date2 = $date2<br>";
//echo "date3 = $date3<br>";
//echo "time = $time<br>";
//echo "time2 = $time2<br>";
//echo "time3 = $time3<br>";
//echo "type = $type<br>";


?>


</body>

</html>