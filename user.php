<?php

require_once("./myConn.php");

class UserDb extends MyCon
{

    function UserDb()
    {
    }

    function getUserId($email)
    {
        $query = "select userid from user where email = '" . $email . "' and status = 1";
        try {
            $result = $this->getConnent()->query($query);
            if ($result->rowCount() == 0) {
                return 0;
            } else {
                $fetch = $result->fetch(PDO::FETCH_BOTH);
                return $fetch[0];
            }
        } catch (Exception $exc) {
            echo $exc;
            echo $exc->getTraceAsString();
        }
    }

    function getAll()
    {
        $query = "select * from user where status = 1";
        try {
            $result = $this->getConnent()->query($query);
            $a = $result->fetchAll();
            return $a;
        } catch (Exception $exc) {
            echo $exc;
            echo $exc->getTraceAsString();
        }
    }

    function checkEmail($email)
    {
        $query = "select email from user where status = 1 and email = '" . $email . "'";
        //        echo "$query";
        try {
            $result = $this->getConnent()->query($query);
            //            echo $result->rowCount();
            if ($result->rowCount() == "0") { //not same
                return 0;
            } else { //same
                return 1;
            }
        } catch (Exception $exc) {
            return 1;
            echo $exc->getTraceAsString();
        }
    }

    function login($email, $password)
    {
        $query = "select email, password from user where email = '" . $email . "' AND password = '" . $password . "' and status = 1";
        //        echo "$query";
        try {
            $result = $this->getConnent()->query($query);
            if ($result->rowCount() == 1) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return 0;
        }
    }

    function getName($email)
    {
        $query = "select fname from user where email = '" . $email . "'";
        //        echo "$query";
        try {
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
            return $result[0][0];
            /*if ($result->rowCount() == 1) {
                return 1;
            } else {
                return 0;
            }*/
        } catch (Exception $ex) {
            return 0;
        }
    }

    function getLastName($email)
    {
        $query = "select lname from user where email = '" . $email . "'";
        //        echo "$query";
        try {
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
            return $result[0][0];
            /*if ($result->rowCount() == 1) {
                return 1;
            } else {
                return 0;
            }*/
        } catch (Exception $ex) {
            return 0;
        }
    }

    function checkAdmin($email, $password)
    {
        $query = "select email, password from user where email = '" . $email . "' AND password = '" . $password . "' and status = 1 and type = 2";

        try {
            $result = $this->getConnent()->query($query);
            if ($result->rowCount() == 1) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return 0;
        }
    }

    function showall()
    {
        $query = 'select * from user where status = 1';
        try {
            $result = $this->getConnent()->query($query);
            $cul = $result->columnCount();
            while ($fetch = $result->fetch(PDO::FETCH_BOTH)) {
                for ($index = 0; $index < $cul; $index++) {
//                    echo $fetch[$index] . "<br>";
                }
            }
        } catch (Exception $ex) {
            echo "$ex";
        }
    }

    function getPassword($email)
    {
        try {
            $query = "SELECT password from user where email = '" . $email . "'";
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();
            return $result[0][0];
        } catch (Exception $ex) {
            return null;
        }
    }

    function checkNullPassword($email)
    {
        try {
            $query = "SELECT password from user where email = '" . $email . "'";
            $result = $this->getConnent()->query($query);
            $result = $result->fetchAll();

            return ($result[0][0] == "") ? true : false;
        } catch (Exception $ex) {
            return null;
        }
    }

    function editPassword($newPassword, $userid)
    {
        try {
            $query = "UPDATE user SET password = '$newPassword' WHERE userid = $userid";
            $this->getConnent()->query($query);

//            echo $query;
            return true;
        } catch (Exception $ex) {
            return null;
        }
    }

    function updateUser($ar, $userid)
    {
        try {
            $query = "UPDATE user SET fname = " . $ar['fname'] . ", lname = " . $ar['lname'] . ", pic = " . $ar['pic'] . "
            WHERE userid = $userid";
            $this->getConnent()->query($query);

//            echo $query;
            return true;
        } catch (Exception $ex) {
            return null;
        }
    }

    function updateProfile($ar, $userid)
    {
        try {
            $query = "UPDATE user SET fname = '" . $ar['fname'] . "', lname = '" . $ar['lname'] . "' WHERE userid = $userid";
            $this->getConnent()->query($query);

//            echo $query;
            return true;
        } catch (Exception $ex) {
            return null;
        }
    }
}

?>

