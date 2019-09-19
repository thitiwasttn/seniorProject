<?php

require_once('myConn.php');

class logDb extends MyCon
{

    function logUpdate($userid, $detail, $ip)
    {
        try {
            $query = "INSERT INTO log SET userid = '$userid', date = now(), detail = '$detail',ip = '$ip'";
            $result = $this->getConnent()->query($query);
//            echo $query;
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
//            echo $ex;
            return false;
        }
    }

    function getLog($userid)
    {
        try {
            $query = "SELECT date,ip FROM log WHERE userid = $userid ORDER BY `log`.`date` DESC";
            $result = $this->getConnent()->query($query);
//            echo $query;
            $f = array();
            while ($fetch = $result->fetch(PDO::FETCH_ASSOC)) {
                $f[] = $fetch;
            }
            return $f;
        } catch (Exception $ex) {
//            echo $ex;
            return false;
        }
    }

    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}


?>