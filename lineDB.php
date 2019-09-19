<?php
//session_start();
require_once("./myConn.php");

class LineDB extends MyCon
{

    var $strLineDb = "line";

    function LineDB()
    {

    }

    function checkFirstTime($email)
    {
        $query = "select * from line where email = '" . $email . "'";
        try {
            $result = $this->getConnent()->query($query);
            if ($result->rowCount() == 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $exc) {

            echo $exc . " echo from checkFirstTime";
            echo $exc->getTraceAsString();
            return 0;
        }
    }

    function addToken($arData)
    {
//        
        if ($this->add($arData, $this->strLineDb) == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    function getToken($email)
    {
        try
        {
            $query = "SELECT channel_access_token from line where email = '".$email."'";
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
            return $result[0][0];
        }catch (Exception $ex)
        {
            return null;
        }
    }
    function editToken($newToken,$email)
    {
        try {
            $query = "UPDATE line SET channel_access_token = '$newToken' WHERE email = '$email'";
            $this->getConnent()->query($query);

//            echo $query;
            return true;
        } catch (Exception $ex) {
            return null;
        }
    }


}

?>
