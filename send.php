<?php
session_start();
require("massageDb.php");
$massageDb = new MassageDb();

$t = $_POST['t'];
if ($t == "text") {
    $type = "1";
    $massage = trim($_POST['massage']);
    $massage2 = trim($_POST['massage2']);
    $massage3 = trim($_POST['massage3']);
    $date = $_POST['date'];
    $date2 = $_POST['date2'];
    $date3 = $_POST['date3'];
    $time = $_POST['time'];
    $time2 = $_POST['time2'];
    $time3 = $_POST['time3'];
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
} elseif ($t == "sticker") {
    $type = "3";
    //sticker

} elseif ($t == "pic") {
    $type = "2";
    $_FILES['fileToUpload'] = $_POST['fileToUpload'];
    $random = time();
    $target_dir = "image/";
    $target_dir = $target_dir . $random;

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//    $_FILES["fileToUpload"]["name"] = "5678";
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


// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    elseif ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Allow certain file formats
    elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    elseif ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $random . "." . $imageFileType;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            $_FILES["fileToUpload"]["name"] = "5978";
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            echo "name : " . $target_dir;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    //image
} else {
    if (!header("Location: broadcast.php")) {
        echo '<meta http-equiv="refresh" content="0;URL=broadcast.php">';
    }
}
$type = $_GET['type'];
echo "massage1 = $massage<br>";
echo "massage2 = $massage2<br>";
echo "massage3 = $massage3<br>";
echo "date = $date<br>";
echo "date2 = $date2<br>";
echo "date3 = $date3<br>";
echo "time = $time<br>";
echo "time2 = $time2<br>";
echo "time3 = $time3<br>";
echo "type = $type<br>";


function convertDateTime($date, $time)
{
    date_default_timezone_set('UTC');

//    $d = str_replace('/', ',', '07-23-2009');
//    $d = str_replace('-', ',', '2019-05-23');
//    $t = str_replace(':', ',', '13:30');
    $d = str_replace('-', ',', $date);
    $t = str_replace(':', ',', $time);
    $date = $t . ',0,' . $d;
    $fulldate = explode(',', $date);
    echo '<br>';
    $h = $fulldate[0];
    $i = $fulldate[1];
    $s = $fulldate[2];
//    $m = $fulldate[3];
//    $d =$fulldate[4];
//    $y = $fulldate[5];
    $y = $fulldate[3];
    $m = $fulldate[4];
    $d = $fulldate[5];

    echo date("h-i-s-M-d-Y", mktime($h, $i, $s, $m, $d, $y)) . "<br>";
    echo strtotime("$m/$d/$y $h:$i") . "<br>";
    // $unixstamp = strtotime($_GET['bday']);
    // //
    // $dateTime = DateTime::createFromFormat('Y-m-d', $_GET['bday']);
    // //แปลงเป็น timestamp --> 2019-xx-xx
    // echo $dateTime->getTimestamp();
    //
    // $y = date("Y", $dateTime->getTimestamp());
    // $m = date("m", $dateTime->getTimestamp());
    // $d = date("d", $dateTime->getTimestamp());
    // echo $y . "-" . $m . "-" . $d;
}


if (!header("Location: mmassage.php")) {
    echo '<meta http-equiv="refresh" content="0;URL=broadcast.php">';
}

?>