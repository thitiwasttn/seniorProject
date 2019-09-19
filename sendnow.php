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
require('massageDb.php');
require('userDb.php');
require('lineDB.php');
$lineDb = new LineDB();
$LineLogin = new LineLoginLib();
$massageDb = new MassageDb();
$userDb = new UserDb();
function upload()
{
    $random = microtime(true);
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    } elseif ($imageFileType != "jpg" && $imageFileType != "png"
        && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    } elseif ($uploadOk == 0) {
        return false;
    } else {
        $target_file = str_replace(".", "", $target_dir . $random) . "." . $imageFileType;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
//            echo "name : " . $target_file;
            return str_replace(".", "", $random) . "." . $imageFileType;;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }

}

function redir()
{
    if (!header("Location: mmassage.php?sort=datein")) {
        echo '<meta http-equiv="refresh" content="0;URL=mmassage.php?sort=datein">';
    }
}

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


if (isset($_POST['send']))
{

    if (isset($_POST['sw1'])) {
        if ($_POST['type'] == "text") {
            if ($_POST['massage'] != "") {
                $massage = $_POST['massage'];
                $massage = str_replace("'", "\'", $massage);
                $arr = array("email" => "'" . $_SESSION['email'] . "'",
                    "massage" => "'" . $massage . "'",
                    "datein" => "now()",
                    "type" => "1",
                    "typemassage" => "1",
                    "timeline" => "'0'",
                    "target" => "1",
                    "dateout" => "now()");
                $massageDb->add($arr, "massage");
                redir();
            } elseif ($_POST['massage'] == "") {
                echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#nullmassage').modal('show');
                    });
                  </script>";
            }

        } elseif ($_POST['type'] == "image") {
            $filename = upload("fileToUpload");
            if ($filename != "") {

                $arr = array("email" => "'" . $_SESSION['email'] . "'",
                    "massage" => "'" . $filename . "'",
                    "datein" => "now()",
                    "type" => "1",
                    "typemassage" => "2",
                    "timeline" => "'0'",
                    "target" => "1",
                    "dateout" => "now()");
                $massageDb->add($arr, "massage");
                redir();
            } elseif ($filename == "") {
                echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#nullmassage').modal('show');
                    });
                  </script>";
            }

        }
    } elseif (!isset($_POST['sw1'])) {
        if ($_POST['date'] == "" || $_POST['time'] == "") {
            echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#nulltoken').modal('show');
                    });
                  </script>";
        } elseif ($_POST['type'] == "text") {
            if ($_POST['massage'] != "") {
                $massage = $_POST['massage'];
                $massage = str_replace("'", "\'", $massage);
                $arr = array("email" => "'" . $_SESSION['email'] . "'",
                    "massage" => "'" . $massage . "'",
                    "datein" => "now()",
                    "type" => "1",
                    "typemassage" => "1",
                    "timeline" => "'0'",
                    "target" => "1",
                    "dateout" => "'" . $_POST['date'] . " " . $_POST['time'] . "'");
                $massageDb->add($arr, "massage");
                redir();
            } elseif ($_POST['massage'] == "") {
                echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#nullmassage').modal('show');
                    });
                  </script>";
            }

        } elseif ($_POST['type'] == "image") {
            $filename = upload("fileToUpload");
            if ($filename != "") {
                $arr = array("email" => "'" . $_SESSION['email'] . "'",
                    "massage" => "'" . $filename . "'",
                    "datein" => "now()",
                    "type" => "1",
                    "typemassage" => "2",
                    "timeline" => "'0'",
                    "target" => "1",
                    "dateout" => "'" . $_POST['date'] . " " . $_POST['time'] . "'");
                $massageDb->add($arr, "massage");
                redir();
            } elseif ($filename == "") {
                echo "<script type='text/javascript'>
                    $(document).ready(function () {
                        $('#nullmassage').modal('show');
                    });
                  </script>";
            }

        }
    }
    $command = escapeshellcmd('python3 /var/www/html/tn/my_python/my_script.py');
    $output = shell_exec($command);
}
if (isset($_GET['send'])) {
    $check = "checked";
    $display = "none";

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
                <li class="nav-item"><a class="nav-link bg-success text-light" href="sendnow.php?send=now">Broadcast</a>
                </li>
                <li class="nav-item"><a class="nav-link text-warning" href="info.php">Information</a></li>
                <li class="nav-item"><a class="nav-link text-info" href="loginhis.php">Activity</a></li>

            </ul>
            <ul class="nav ml-auto navbar-nav">
                <li class="nav-item">
                    <img src="<?php


                    if ($userDb->getPic($_SESSION['email']) != "") {
                        $pic = $userDb->getPic($_SESSION['email']);
                        // $pic = "http://www.cs.rmutk.ac.th/image/utk.jpg";
                    } elseif ($LineLogin->getpic() != "") {
                        $pic = $LineLogin->getpic();
                    } else {
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
    <div style="font-size: 32px">
        <div><b>
                <span style="color:#fb6630;">B</span><span style="color:#fc6840;">r</span><span
                        style="color:#fc6b4f;">o</span><span style="color:#fd6d5f;">a</span><span
                        style="color:#fe6f6e;">d</span><span style="color:#fe727e;">c</span><span
                        style="color:#ff748d;">a</span><span style="color:#f36ea1;">s</span><span
                        style="color:#e867b6;">t</span><span style="color:#dc61ca;">
            </b></div>
    </div>
</div>

<div class="container-fluid">
    <div>
        <div style="font-size: 16px">
            <div class="row">
                <div class="col-md-6" align="center">
                    <form method="post" action="sendnow.php" enctype='multipart/form-data'>
                        <div class="mybox massagemanager">


                            <p>
                            <h1 align="center">
                                Massage
                                <?php


                                //                                print_r($_POST) . print_r($_FILES); ?>
                            </h1>
                            </p>
                            <hr>
                            <div class="row">
                                <div id="mantes" class="col-md-12">
                                    <textarea class="form-control" name="massage" rows="11"></textarea>
                                </div>
                            </div>
                            <hr>
                            <input <?php ?> type="submit" name="send" value="Send"
                                            class="btn btn-outline-success">

                        </div>
                </div>

                <div class="col-md-6" align="center">

                    <div class="mybox massagemanager">
                        <p>
                        <h1 class="">
                            Type
                        </h1>
                        </p>
                        <hr>
                        <input type="hidden" name="massid" value="">
                        <div class="custom-control custom-switch" style="display: none" <?php ?>>
                            <input <?php echo $check; ?> name="sw1" type="checkbox" class="custom-control-input"
                                                         id="switch1">
                            <label class="custom-control-label" for="switch1">Send now</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input checked type="radio" class="custom-control-input" id="customRadio1" name="type"
                                   value="text"
                                   onclick="reform(1)">
                            <label class="custom-control-label" for="customRadio1">Text</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="type"
                                   value="image"
                                   onclick="reform(2)">
                            <label class="custom-control-label" for="customRadio2">Image</label>
                        </div>
                        <hr>

                    </div>
                    <div id="mydatetime" style="display: <?php echo $display; ?>">
                        <div class="myboxrow2 massagemanager">
                            <p>
                            <h1>
                                Date and Time
                            </h1>
                            </p>
                            <hr>
                            <div class="row">
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                $y = date("Y", time());
                                $m = date("m", time());
                                $d = date("d", time());
                                $min = $y . "-" . $m . "-" . $d;
                                // $arr2 = str_split($datetime, 10);
                                $t = date("H", time());
                                $mn = date("i", time());
                                ?>
                                <div class="col-md-6 my-dt">
                                    <input type="date" min="<?php echo $min; ?>" value="<?php echo $min; ?>"
                                           class="form-control" name="date">
                                </div>
                                <div class="col-md-6 my-dt">
                                    <input type="time" value="<?php echo $t . ":" . $mn; ?>" class="form-control"
                                           name="time">
                                </div>
                            </div>
                            <hr>


                        </div>
                    </div>
                    </form>


                    <div class="clearfix visible-lg"></div>

                </div>

            </div>

            <div class="modal fade" id="nullmassage">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"><img src="xIcon.png" width="50px" height="50px"> Null date and time
                            </h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            massage ว่าง
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">-->
                            <a href="javascript:history.go(-1)" class="btn btn-danger">Close</a>
                            <!--                            </button>-->
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="nulltoken">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"><img src="xIcon.png" width="50px" height="50px"> Null date and time
                            </h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            date and time ว่าง
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">-->
                            <a href="javascript:history.go(-1)" class="btn btn-danger">Close</a>
                            <!--                            </button>-->
                        </div>

                    </div>
                </div>
            </div>
</body>
</html>
<script>
    function reform(typ) {
        if (typ == "1") {
            $("#mantes").empty();
            $("#mantes").append('<textarea class="form-control" name="massage" rows="11"></textarea>');
        } else if (typ == "2") {
            $("#mantes").empty();
            $("#mantes").append('<div class="custom-file mb-3" style="margin-top: 15px">\n' +
                '<input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*">\n' +
                '<label class="custom-file-label" for="customFile">Choose file</label>\n</div>');
            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        }
    }
</script>
<script>
    var switchStatus = false;
    $("#switch1").on('change', function () {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');

            document.getElementById("mydatetime").style.display = "none";

        } else {
            switchStatus = $(this).is(':checked');
            document.getElementById("mydatetime").style.display = "";

        }
    });


</script>