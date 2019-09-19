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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-image: url("backg.jpg");
        /*background-color: #cccccc;*/
        height: auto;
    }

    .i {
        width: 80%;
        margin-top: 20%;
    }

    .l {
        float: left;
        /*margin-left: 10%;*/
        box-shadow: 1px 1px 50px 1px;
        border-radius: 50px;
    }

    .f {
        /*float: center;*/
        align-content: center;
        /*margin-left: 5%;*/
        /*margin-right: 5%;*/
        box-shadow: 1px 1px 50px 1px;
        border-radius: 50px;
    }

    .t {
        float: right;
        /*margin-right: 10%;*/
        box-shadow: 1px 1px 50px 1px;
        border-radius: 50px;
    }

    @media (max-width: 400px) {
        .i {
            /*width: 50%;*/
            /*margin-top: 20%;*/
            /*height: 10000px;*/
        }
        .l {
            /*float: left;*/
            /*margin-left: 10%;*/
            box-shadow: 1px 1px 50px 1px;
            border-radius: 30px;
            width: 150px;
            margin-left: 20px;
            /*align-content: center;*/
        }

        .f {
            /*float: center;*/
            /*align-content: center;*/
            /*margin-left: 5%;*/
            /*margin-right: 5%;*/
            margin-left: 20px;
            box-shadow: 1px 1px 50px 1px;
            border-radius: 30px;
            width: 150px;
        }

        .t {
            /*float: right;*/
            /*margin-right: 10%;*/
            margin-left: 20px;
            box-shadow: 1px 1px 50px 1px;
            border-radius: 30px;
            width: 150px;
        }

    }
</style>

<body>
<!--<div class="container-fluid">-->
<div align="center">
    <div class="i">
        <a href="?line"><input type="image" name="line" src="lineIcon.png" alt="Button" value="x" class="l"></a>
        <input type="image" src="FBIcon.png" alt="Button" value="f" class="f">
        <input type="image" src="twitterIcon.png" alt="Button" value="t" class="t">
    </div>
</div>
<!--</div>-->

<?php
session_start();

require("userDb.php");

require("lineDB.php");
//    require ('logDb.php');
$userDb = new UserDb();
$lineDb = new LineDb();
if (is_null($_SESSION['email'])) {
    header("Location: login.php");
}
//    $logDb = new logDb();
//    $logDb->logUpdate($userDb->getUserId($_SESSION['email']),"login",$logDb->get_client_ip()."");
if (isset($_GET['line'])) { //icon line
    echo $_GET['line'];
    if (!is_null($_SESSION['email'])) {

        if ($lineDb->checkFirstTime($_SESSION['email']) == 1) {

            header("Location: firsttimelinetoken.php");
        } else {
            header("Location: profile.php");
        }
    }

}
?>


</body>

</html>