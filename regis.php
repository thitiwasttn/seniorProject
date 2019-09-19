<?php
session_start();
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title></title>
    <style>
         body {
            background-image: url("backg.jpg");
            background-color: #cccccc;
            background-repeat: no-repeat;
            
            
        }
    

        .in50[type=text], select {
            width: 49%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .in50[type=password], select {
            width: 49%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .in100[type=text], select {
            width: 98.5%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 98.5%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a046;
        }

        .x1 {
            border-radius: 7px;
            background-color: #f2f2f2;
            box-shadow: 1px 1px 50px 1px;
            padding: 20px;
            width: 50%;
            margin-top: 14%;
        }

        @media (max-width:1000px) {
            .x1 {
                border-radius: 7px;
                background-color: #f2f2f2;
                box-shadow: 1px 1px 50px 1px;
                padding: 20px;
                width: 90%;

                margin-top: 20%
            }

            .in50[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .in50[type=password], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

        } 

    </style>
</head>
<body>
<?php

require 'userDb.php';
$userDb = new UserDb();

function setForm($cpass, $semail, $fill)
{
    ?>
    <div align="center" >
        <form action="regis.php" class="x1" method="post">
            <font size="6"><strong>register</strong></font><hr>
            <input type="text" name="firstname" placeholder="firstname" class="in50"/>
            <input type="text" name="lastname" placeholder="lastname" class="in50"/>
            <br>
            <input type="text" name="email" placeholder="email" width="50" class="in100" value=""/>
            <?php echo '<div  style="color: red">' . $semail; ?>
            <input type="password" name="password" placeholder="password" class="in50"/>
            <input type="password" name="cpassword" placeholder="confirm password" class="in50"/>
            <?php echo '<div  style="color: red">' . $cpass; ?>
            <!--                    <br>-->
            <?php echo '<div  style="color: red">' . $fill; ?>
            <input type="submit" value="confirm" name="submit"/>

        </form>
    </div>
    <?php
}

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $ar = array(
        "email" => "'$email'",
        "password" => "'$password'",
        "fname" => "'$fname'",
        "lname" => "'$lname'",
    );
    if ($fname == "" || $lname == "" || $email == "" || $password == "" || $cpassword == "") {
        setForm("", "", "dont't blank");
    } elseif ($cpassword != $password) {
        setForm("not same", "");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setForm("", "Invalid email format<br>", "");
    } elseif ($userDb->checkEmail($email) == 1) {
        setForm("", "email ซ้ำ<br>", "");
    } elseif ($userDb->checkEmail($email) == 0) {
        if ($userDb->add($ar, "user") == 1) {
            setForm("", "", "done");

            if (!header("Location: home.php")) {
                echo '<meta http-equiv="refresh" content="0;URL=home.php">';
                $_SESSION['email'] = $email;
            }

        } else {
            setForm("", "", "denied");
        }
    }
} else {
    setForm("", "", "");
}
?>


</body>
</html>
