<?php
require_once("myConn.php");

class MassageDb extends MyCon
{

    function showTimerMassage($email,$order)
    {
        $query = "SELECT  massage.massageid, massage.massage,massage.datein,massage.dateout,massage.timeline,massage.target,massage.typemassage 
FROM massage 
WHERE massage.email = '$email' AND massage.type = 1 ORDER BY $order";
//        echo $query;
        try {
            $result = $this->getConnent()->query($query);
            $f = array();
            while ($fetch = $result->fetch(PDO::FETCH_ASSOC)) {
                $f[] = $fetch;
            }
            return $f;
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }
    }

    function showSentMassage($email,$order)
    {
        $query = "SELECT  massage.massageid, massage.massage,massage.datein,massage.dateout,massage.timeline,massage.target,massage.typemassage FROM massage WHERE massage.email = '$email' AND massage.type = 2 
ORDER BY $order";
//        echo $query."<br>";
//        $f = array();
        try {
            $result = $this->getConnent()->query($query);
            $cul = $result->columnCount();
//            $ar = array();
//            $ar['result'] = $result = $this->getConnent()->query($query);
//            $ar['row'] = $result->columnCount();
//            print_r($ar);
//            echo $cul;
//            return $ar;
            $f = array();
//            $f['row'] = $cul;
//            $f['result'] = $result;
            $i = 0;
            while ($fetch = $result->fetch(PDO::FETCH_ASSOC)) {
                $f[] = $fetch;
//                $i++;
//                for ($index = 0; $index < $cul; $index++)
//                {
//                    echo  $fetch[$index] . "<br>";
//
//                }
            }

//            print_r($f);
            return $f;
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }

    }

    function showErrorMassage($email,$order)
    {
        $query = "SELECT  massage.massageid, massage.massage,massage.datein,massage.dateout,massage.timeline,massage.target,massage.typemassage FROM massage WHERE massage.email = '$email' AND massage.type = 3 
ORDER BY $order";
//        echo $query."<br>";
//        $f = array();
        try {
            $result = $this->getConnent()->query($query);
            $cul = $result->columnCount();
//            $ar = array();
//            $ar['result'] = $result = $this->getConnent()->query($query);
//            $ar['row'] = $result->columnCount();
//            print_r($ar);
//            echo $cul;
//            return $ar;
            $f = array();
//            $f['row'] = $cul;
//            $f['result'] = $result;
            $i = 0;
            while ($fetch = $result->fetch(PDO::FETCH_ASSOC)) {
                $f[] = $fetch;
//                $i++;
//                for ($index = 0; $index < $cul; $index++)
//                {
//                    echo  $fetch[$index] . "<br>";
//
//                }
            }

//            print_r($f);
            return $f;
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }

    }

    function deleteMassage($id)
    {
        $query = "DELETE FROM massage WHERE massageid = " . $id;
        try {
            $result = $this->getConnent()->query($query);

        } catch (Exception $exc) {
            echo "print from MassageDb " . $exc;
        }
    }

    function update($ar, $id)
    {
        $query = "UPDATE massage SET massage = '" . $ar['massage'] . "', datein = now(), dateout = '" . $ar['dateout'] . "', 
        typemassage = " . $ar['typemassage'] . " WHERE massageid = $id";
        echo $query;
        try {
            $result = $this->getConnent()->query($query);
        } catch (Exception $exc) {
            echo "print from MassageDb " . $exc;
        }
    }

    function updateMassage($massage, $massid)
    {
        $query = "UPDATE massage SET massage ='$massage',datein = now() WHERE massageid = $massid";
//        echo $query;
        try {
            $result = $this->getConnent()->query($query);
        } catch (Exception $exc) {
            echo "print from MassageDb " . $exc;
        }
    }

    function updateTimeMassage($date, $massid)
    {
        $query = "UPDATE massage SET dateout ='$date',datein = now() WHERE massageid = $massid";
//        echo $query;
        try {
            $result = $this->getConnent()->query($query);
        } catch (Exception $exc) {
            echo "print from MassageDb " . $exc;
        }
    }

    function updateNoEditMassage($ar, $id)
    {
        $query = "UPDATE massage SET datein = now(), dateout = '" . $ar['dateout'] . "', 
        typemassage = " . $ar['typemassage'] . " WHERE massageid = $id";
        echo $query;
        try {
            $result = $this->getConnent()->query($query);
        } catch (Exception $exc) {
            echo "print from MassageDb " . $exc;
        }
    }

    function getMassageById($massid, $email)
    {
        $query = "SELECT massage FROM massage WHERE massageid = $massid AND email = '$email'";
        try {
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
//            echo $query;
            return $result[0][0];
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }
    }

    function getDateTimeByid($massid, $email)
    {
        $query = "SELECT dateout FROM massage WHERE massageid = $massid AND email = '$email'";
        try {
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
//            echo $query;
            return $result[0][0];
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }
    }

    function getTypeMassage($massid)
    {
        $query = "SELECT typemassage FROM massage WHERE massageid = " . $massid;
        try {
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
//            echo $query;
            return $result[0][0];
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }
    }

    function getStatusMassage($massid, $email)
    {
        $query = "SELECT type FROM massage WHERE massageid = " . $massid . " AND email = '$email'";
        try {
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
//            echo $query;
            return $result[0][0];
        } catch (Exception $exc) {
            echo $exc . "echo from showTime";
            echo $exc->getTraceAsString();
            return 0;
        }
    }
}

?>