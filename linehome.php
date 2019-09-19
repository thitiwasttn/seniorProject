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

            /*padding: 0;*/
            width: auto;
            background-color: #f1f1f1;
            position: fixed;
            height: auto;
            overflow: auto;
            border-radius: 15px;
            background-color: #f2f2f2;
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

        .pro {
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
if (is_null($_GET['m'])) {
    $_GET['m'] = 'info';
}


?>

<body>

    <?php

    function setAc($LineLogin, $a)
    {
        ?>
        <font size="5">
            <ul class="ul">
                <?php echo '<li class="li"><a ' . $a['profile'] . ' href="?m=profile">Profile</a></li>'; ?>
                <?php echo '<li class="li"><a ' . $a['massagemanager'] . ' href="?m=mm">Massage manage</a></li>'; ?>
                <?php echo '<li class="li"><a ' . $a['brc'] . '  href="?m=bc">Broadcast</a></li>'; ?>
                <?php echo '<li class="li"><a ' . $a['info'] . ' href="?m=info">Information</a></li>'; ?>
                <?php echo '<li class="li"><a ' . $a['logout'] . ' href="?logout">log out</a></li>'; ?>

                <li class="li">
                    <div align="center"><img src="<?php echo $LineLogin->getpic(); ?>" class="pro"></div>
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
    <?php
}


// setAc($LineLogin, $a);
//setPageProfile();

//setAc($LineLogin,$a);
if ($_GET['m'] == 'profile') {
    $a = null;
    $a['profile'] = 'class="active"';
    setAc($LineLogin, $a);
    setPageProfile();
} elseif ($_GET['m'] == 'info') {
    $a = null;
    $a['info'] = 'class="active"';
    setAc($LineLogin, $a);
    setPageInformation();
} elseif ($_GET['m'] == 'bc') {
    $a = null;
    $a['brc'] = 'class="active"';
    setAc($LineLogin, $a);
    setPageBroadcast();
} ?>


    <?php
    function setPageProfile()
    {
        echo '<div style="margin-left:364px;padding:1px 16px;height: auto;">';
        echo '<div style="margin-top: 70px;">';
        ?>

        <h1>Profile</h1>
        <?php
        echo '</div>
        </div>';
    }

    function setPageBroadcast()
    {
        echo '<div style="margin-left:364px;padding:1px 16px;height: auto;">';
        echo '<div style="margin-top: 70px;">';
        ?>
        <h1 align="center">Broadcast</h1>
        <hr>
        <div align="center">
            <p>
                ผู้รับ <select>
                    <option value="volvo">ทุกคน</option>
                    <option value="saab">ระบุคุณสมบัติ (ยังไม่เปิดให้บริการ)</option>

                </select>
            </p>
            <p>
                วันที่ส่ง
                <input type="date" id="listingDateOpen" name="date">
                <script>
                    let today = new Date(),
                        day = today.getDate(),
                        month = today.getMonth() + 1, //January is 0
                        year = today.getFullYear();
                    if (day < 10) {
                        day = '0' + day
                    }
                    if (month < 10) {
                        month = '0' + month
                    }
                    today = year + '-' + month + '-' + day;

                    document.getElementById("listingDateOpen").setAttribute("min", today);
                    document.getElementById("listingDateOpen").setAttribute("value", today);
                </script>


            </p>
            <p>
                ไทม์ไลน์ <input type="checkbox" name="timeline" value="true">
            </p>

            <p>
                <form action="linehome.php" method="get">
                    <input type="radio" name="t" value="text" onclick="choose('t','text');" id="text"> text
                    <input type="radio" name="t" value="sticker" onclick="choose('t','sticker');" id="sticker"> sticker
                    <input type="radio" name="t" value="pic" onclick="choose('t','image');" id="image"> image
                </form>
                <script>
                    function choose(varr, valuee) {

                        var url = new URL('http://localhost/project/linehome.php?m=bc');

                        var query_string = url.search;

                        var search_params = new URLSearchParams(query_string);

                        search_params.append(varr, valuee);

                        url.search = search_params.toString();

                        // the new url string
                        var new_url = url.toString();

                        // output : http://demourl.com/path?id=101&topic=main
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
                    echo "";
                }
                ?>
            </p>
        </div>
        <?php
        echo '</div>
        </div>';
    }

    function setPageInformation()
    {
        echo '<div style="margin-left:364px;padding:1px 16px;height: auto;">';
        echo '<div style="margin-top: 70px;">';
        ?>




        <p><?php print_r($_SESSION); ?></p>
        <p><?php print_r(json_decode($_SESSION['ses_login_userData_val'])); ?></p>


        <?php
        echo '</div>
        </div>';
    }


    ?>


</body>

</html>