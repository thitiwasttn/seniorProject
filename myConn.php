<?php


?>
<?php

class MyCon
{

    var $dbname = "project_thitiwas";
    var $host = "localhost";
    var $user = "thitiwas";
    var $password = "chalo8661";
    var $pdo;

    function MyCon()
    {
        $this->getConnent();
    }

    function getConT()
    {
        $link = mysqli_connect("localhost", "root", "chalo8661", "project");
        if ($link) {
            //            echo "ok";
        }
    }

    function getConnent()
    {
        try {
            $pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->user, $this->password);
            //            $pdo = new PDO("mysql:host=$this->host;dbname=project", 'root', 'chalo8661');
            if ($pdo) {
                //                echo "ok";
                return $pdo;
            }
        } catch (Exception $exc) {
            echo $exc;
            echo $exc->getTraceAsString();
            return null;
        }
    }

    function add($columArray, $tableN)
    {
        $c = "";
        $v = "";
        $c1 = key($columArray);
        $v1 = $columArray[$c1];
        while (next($columArray)) {
            $temp = key($columArray);
            $c = $c . "," . $temp;
            $v = $v . "," . $columArray[$temp];
        }
        $c = $c1 . $c;
        $v = $v1 . $v;
        $sql = "INSERT INTO $tableN (" . $c . ") VALUES (" . $v . ")";
        echo "$sql";
        if ($this->getConnent()->query($sql)) {
            return 1;
        } else {
            return 0;
            //            echo "<br>insert not complete";
        }
    }
}

//$a = new MyCon();
//$a->getConnent();
//$ar1 = array("email" => "'example2@gmail.com'", "password" => "'1234'", "fname" => "'ex2thiti'"
//    , "lname" => "'nupan'", "tel" => "'09999'", "status" => "'1'", "lineid" => "'1'");
?>
