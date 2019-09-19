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
if (isset($_POST['edittext'])) {
    $id = $_POST['massid'];
    $massage = trim($_POST['massage']);
    if (trim($_POST['massage']) != "") {
        $massage = str_replace("'", "\'", $massage);
        $massageDb->updateMassage($massage, $id);
        echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#updatemassage').modal('show');
            });
        </script>";
    } elseif ($_POST['type'] == "2") {
        $filename = upload("fileToUpload");
        if ($filename != "") {
            $massageDb->updateMassage($filename, $id);
            echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#updatemassage').modal('show');
            });
        </script>";
        }
    }
}

if (isset($_POST['editdt'])) {
    $id = $_POST['massid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $tt = $date . " " . $time;
    $massageDb->updateTimeMassage($tt, $id);
    echo "<script type='text/javascript'>
            $(document).ready(function () {
                $('#updatedt').modal('show');
            });
        </script>";
}
//
if(isset($_POST['duplicate']))
{
    $ma = $massageDb->getMassageById($_POST['massid'],$_SESSION['email']);
    $da = $massageDb->getDateTimeByid($_POST['massid'],$_SESSION['email']);
    $ty = $massageDb->getTypeMassage($_POST['massid']);
    $ar = array();
    $ar['massage'] = "'".$ma."'";
    $ar['dateout'] = "'".$da."'";
    $ar['datein'] = "now()";
    $ar['type'] = "1";
    $ar['timeline'] = "'0'";
    $ar['target'] = "1";
    $ar['email'] = "'".$_SESSION['email']."'";
    if($ty == "text")
    {
        $ar['typemassage'] = "1";
    }elseif ($ty == "image")
    {
        $ar['typemassage'] = "2";
    }
    $massageDb->add($ar,"massage");
    if (!header("Location: mmassage.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=mmassage.php">';
    }

}

if (is_null($_POST['massid'])) {
    if (!header("Location: mmassage.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=mmassage.php">';
    }
}
if ($massageDb->getStatusMassage($_POST['massid'], $_SESSION['email']) != "timmer") {
    $disable = "disabled";
} else {
    $disable = "";
}
if (isset($_POST['delete'])) {
    $massageDb->deleteMassage($_POST['massid']);
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
                <li class="nav-item"><a class="nav-link text-warning" href="info.php">Information</a></li>
                <li class="nav-item"><a class="nav-link text-info" href="loginhis.php">Activity</a></li>
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
    <div style="font-size: 32px">
        <div><b>
                <span style="color:#00a5ff;">M</span><span style="color:#0074ff;">a</span><span
                        style="color:#0044ff;">s</span><span style="color:#0013ff;">s</span><span
                        style="color:#2e0dff;">a</span><span style="color:#5d06ff;">g</span><span
                        style="color:#8b00ff;">e</span><span style="color:#b300ff;"> </span><span
                        style="color:#da00ff;">d</span><span style="color:#e600e6;">e</span><span
                        style="color:#f300cd;">t</span><span style="color:#ff00b4;">a</span><span
                        style="color:#ff0092;">i</span><span style="color:#ff0071;">l</span><span
                        style="color:#ff004f;">s</span>
            </b></div>
    </div>
</div>

<div class="container-fluid">
    <div>
        <div style="font-size: 16px">
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="mybox massagemanager">

                        <form method="post" action="massagedetails.php" enctype='multipart/form-data'>
                            <input type="hidden" name="massid" value="<?php echo $_POST['massid']; ?>">
                            <p>
                            <h1 align="center">
                                Massage
                                <!--                                --><?php

                                //print_r($_POST).print_r($_FILES); ?>

                            </h1>
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $massage = $massageDb->getMassageById($_POST['massid'], $_SESSION['email']);
                                    if ($massageDb->getTypeMassage($_POST['massid']) == "text") {
                                        echo '<textarea class="form-control" name="massage" rows="12">' . $massage . '</textarea>';
                                    } elseif ($massageDb->getTypeMassage($_POST['massid']) == "image") {
                                        echo "<div class='bg-light' style='padding: 10px;'><a href='image/$massage'>
                                                <img src='image/$massage' class = 'my-picc'></a></div>";
                                        echo '<div class="custom-file mb-3" style="margin-top: 15px">
                                              <input type="hidden" name="type" value="2">
                                              <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*">
                                              <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <a href="mmassage.php" class="btn btn-outline-primary">Back
                            </a>
                            <input <?php echo $disable; ?> type="submit" name="edittext" value="Edit"
                                                           class="btn btn-outline-warning">
                            <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger">
                        </form>

                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <div class="mybox massagemanager">
                        <p>
                        <h1>
                            Date and Time
                        </h1>
                        </p>
                        <hr>
                        <form method="post" action="massagedetails.php">
                            <input type="hidden" name="massid" value="<?php echo $_POST['massid']; ?>">
                            <div class="row">
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                $y = date("Y", time());
                                $m = date("m", time());
                                $d = date("d", time());
                                $min = $y . "-" . $m . "-" . $d;
                                $datetime = $massageDb->getDateTimeByid($_POST['massid'], $_SESSION['email']);
                                $arr2 = str_split($datetime, 10);
                                $time = str_replace(" ", "", $arr2[1]);
                                ?>
                                <div class="col-md-6 my-dt">
                                    <input type="date" min="<?php echo $min; ?>" value="<?php echo $arr2[0]; ?>"
                                           class="form-control" name="date">
                                </div>
                                <div class="col-md-6 my-dt">
                                    <input type="time" value="<?php echo $time; ?>" class="form-control" name="time">
                                </div>
                            </div>
                            <hr>

                            <input <?php echo $disable; ?> type="submit" name="editdt" value="Edit"
                                                           class="btn btn-outline-warning">
                        </form>

                    </div>

                    <div class="myboxrow2 massagemanager">
                        <p>
                        <h1>
                            Duplicate
                            <img class="my-icon iconPM" src="info.png"
                                 data-container="body"
                                 data-toggle="tooltip"
                                 data-placement="top"
                                 title="ทำการสำเนาข้อความ
                            และเวลาสำหรับการบรอดแคสใหม่ เพื่อประโยชน์ในการบรอดแคสข้อความเดิมในเวลาที่ต่างออกไป
                            หรือเวลาเดิมในข้อความที่ต่างออกไป">
                        </h1>
                        </p>
                        <hr>
                        <form method="post" action="massagedetails.php">
                            <input type="hidden" name="massid" value="<?php echo $_POST['massid'];?>">
                            <input type="submit" name="duplicate" value="Duplicate" class="btn btn-outline-success">
                        </form>
                        <hr>
                    </div>
                </div>

                <div class="clearfix visible-lg"></div>
            </div>
        </div>


        <div class="modal fade" id="updatemassage">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">updated
                        </h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        อัพเดทข้อความแล้ว
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="updatedt">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">updated
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        อัพเดทเวลาแล้ว
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
</body>
</html>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $(function () {
        $('.example-popover').popover({
            container: 'body'
        })
    })

    function blink() {
        $('.iconPM').delay(500).fadeTo(100, 0.5).delay(500).fadeTo(100, 1, blink);
    }

    $(document).ready(function () {
        blink();
    });
</script>
