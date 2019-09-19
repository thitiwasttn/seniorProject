<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="mycss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-image: url("backg.jpg");
        /*background-color: #cccccc;*/
    }

    .in50[type=text],
    select {
        width: 49%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .in50[type=password],
    select {
        width: 49%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 98.5%;

    }

    /*input[type=submit]:hover {*/
    /*    background-color: #45a046;*/
    /*}*/

    .x1 {
        border-radius: 5px;
        background-color: #f2f2f2;
        box-shadow: 1px 1px 50px 1px;
        padding: 20px;
        width: 50%;
        margin-top: 20%
    }

    @media (max-width: 1000px) {
        input[type=submit] {
            width: 98.5%;
            margin-top: 15px;
        }

        .x1 {
            border-radius: 5px;
            background-color: #f2f2f2;
            box-shadow: 1px 1px 50px 1px;
            padding: 20px;
            width: 95%;
            margin-top: 30%;
            /*position: absolute;*/
            /*top: 50%;*/
            /*-ms-transform: translateY(-50%);*/
            /*transform: translateY(-60%);*/
        }

        .in50[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .in50[type=password],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

    }

    .rf {
        /*background-color: #4CAF50;*/
        text-align: left;
        /*width: 30%;*/

        margin: 8px;
    }
</style>

<body>

<?php

//require ("lineloginlibery.php");
session_start();
session_destroy();
session_start();
// echo "<script type='text/javascript'>
//             $(document).ready(function () {
//                 $('#added').modal('show');
//             });
//         </script>";
require 'userDb.php';
require 'logDb.php';
function setForm($error)
{
    ?>
    <div>
        <div align="center">
            <form action="login.php" method="POST" class="x1">
                <font size="6"><strong>login</strong></font>
                <hr>
                <input type="text" name="email" placeholder="email" class="in50"/>
                <input type="password" name="password" placeholder="password" class="in50"/>
                <?php
                if ($error != "") {
                    echo '<div style="color: red">' . $error;
                }
                ?>
                <!-- <br> -->
                <hr>
                <input type="submit" value="Login" name="login" class="btn btn-outline-success "/>

                <div class="rf"><a href="regis.php">register</a> | <a href="/tn/reset.html"> forget password </a>
                    | <a href="?linelog"><img src="lineIcon.png" style="width: 20px;height: 20px"> login with LINE
                        account</a>
                </div>
            </form>
        </div>
    </div>
    <?php
}

$logDb = new logDb();
if (!isset($_POST['login'])) {
    setForm("");
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //            $ar = array("email" => "'" . $email . "'", "password" => "'" . $password . "'");
    $userDb = new UserDb();
    if ($userDb->checkAdmin($email, $password) == 1) {
        $logDb->logUpdate($userDb->getUserId($email), "login", $logDb->get_client_ip() . "");
        header("Location: devconsole.php");
        $_SESSION['email'] = $email;
    } elseif ($userDb->login($email, $password) == 1) {
        $_SESSION['email'] = $email;
        $logDb->logUpdate($userDb->getUserId($email), "login", $logDb->get_client_ip() . "");
        header("Location: profile.php");
    } else {
        setForm("email or password is wrong");
    }
}

if (isset($_GET['linelog'])) {


    //require("lineloginlibery.php");
    require_once("lineloginlibery.php");

    // กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $LineLogin = new LineLoginLib();

    if (!isset($_SESSION['ses_login_accToken_val'])) { //ถ้าไม่มี login token ให้ไป login
        $LineLogin->authorize();
        exit;
    }
}
?>
<div class="modal fade" id="added">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                         width="100" height="100"
                         viewBox="0 0 171 171"
                         style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                           stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                           font-family="none" font-weight="none" font-size="none" text-anchor="none"
                           style="mix-blend-mode: normal">
                            <path d="M0,171.99277v-171.99277h171.99277v171.99277z" fill="none"></path>
                            <g fill="#e74c3c">
                                <path d="M153.9,13.68h-136.8c-1.881,0 -3.42,1.539 -3.42,3.42v136.8c0,1.881 1.539,3.42 3.42,3.42h136.8c1.881,0 3.42,-1.539 3.42,-3.42v-136.8c0,-1.881 -1.539,-3.42 -3.42,-3.42zM43.8444,34.2c4.5486,0 8.55,2.2914 10.8756,5.814c2.3256,-3.5226 6.327,-5.814 10.8756,-5.814c7.2162,0 13.0644,5.814 13.0644,12.9618c0,15.1164 -17.4078,22.6746 -23.94,28.0782c-6.5322,-5.4036 -23.94,-12.9618 -23.94,-28.0782c0,-7.1478 5.8482,-12.9618 13.0644,-12.9618zM82.08,140.22h-54.72v-6.84h54.72zM82.08,119.7h-54.72v-6.84h54.72zM82.08,99.18h-54.72v-6.84h54.72zM143.64,140.22h-54.72v-6.84h54.72zM143.64,119.7h-54.72v-6.84h54.72zM143.64,99.18h-54.72v-6.84h54.72zM143.64,78.66h-54.72v-6.84h54.72zM143.64,58.14h-54.72v-6.84h54.72zM143.64,37.62h-54.72v-6.84h54.72z"></path>
                            </g>
                        </g>
                    </svg>
                    Thanks
                </h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" align="center">
                เว็บไซต์นี้จัดทำ และออกเแบบทั้งหมดโดย thitiwas nupan แต่เพียงผู้เดียว
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
<!--                <a class="btn btn-danger" data-dismiss="modal">Close</a>-->
            </div>

        </div>
    </div>
</div>
</body>

</html>
