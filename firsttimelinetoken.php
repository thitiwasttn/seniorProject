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
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body {
            background-image: url("backg.jpg");
            background-repeat: no-repeat;
            /*background-color: #cccccc;*/
        }

        .f1 {
            border-radius: 5px;
            background-color: #f2f2f2;
            box-shadow: 1px 1px 50px 1px;
            padding: 20px;
            width: 30%;
            margin-top: 20%;

        }

        input[type = text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type = submit] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            cursor: pointer;
            color: white;
            background-color: #0099ff;
        }
    </style>
</head>

<body>

<?php
require 'lineDB.php';
require_once('userDb.php');
session_start();
if ($_SESSION['email'] == "") {
    header("Location: login.php");
}
$lineDb = new LineDB();
$userDb = new UserDb();
if (isset($_POST['add'])) {
    $token = $_POST['token'];
    $ar = array("email" => "'" . $_SESSION['email'] . "'", "channel_access_token" => "'$token'");
    $lineDb->addToken($ar);
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $ar = array("email" => "'" . $_SESSION['email'] . "'", "password" => "'$password'", "fname" => "''", "lname" => "''", "status" => "1", "type" => "1");
        $userDb->add($ar, "user");
    }
    header("Location: profile.php");

}
?>
</body>
<div class="container-fluid">
    <div align="center">
        <div class="col-md-12 mybox massagemanager x1">
            <form action="firsttimelinetoken.php" method="POST">
                <p>
                    We don't found your token<br>
                    please put your token.<br>
                </p>
                <input type="text" name="token" placeholder="your token..." class="form-control"/>
                <?php
                if ($userDb->checkNullPassword($_SESSION['email'])) {


                    ?>
                    <p>
                        And set your password for nexttime your come<br>
                        you will can login with id and password<br>
                    </p>
                    <input type="password" name="password" placeholder="password" class="form-control">
                    <?php
                }
                ?>
                <input type="submit" value="Add" name="add"/>
            </form>
        </div>
    </div>
</div>
</html>
