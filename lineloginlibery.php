<?php

class LineLoginLib
{

    private $_CLIENT_ID;
    private $_CLIENT_SECRET;
    private $_CALLBACK_URL;
    private $_STATE_KEY = 'random_state_str';

//    public function __construct($_CLIENT_ID, $_CLIENT_SECRET, $_CALLBACK_URL)
//    {
//        $this->_CLIENT_ID = $_CLIENT_ID;
//        $this->_CLIENT_SECRET = $_CLIENT_SECRET;
//        $this->_CALLBACK_URL = $_CALLBACK_URL;
//    }

    public function __construct()
    {
        $this->_CLIENT_ID = '1575314335';
        $this->_CLIENT_SECRET = '88cead35fa5cb42685570b8f5d1183d6';
        $this->_CALLBACK_URL = 'http://muzillalab.com/tn/callback.php';
    }


    public function authorize()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION[$this->_STATE_KEY] = $this->randomToken();

        $url = "https://access.line.me/oauth2/v2.1/authorize?" .
            http_build_query(array(
                    'response_type' => 'code', // ไม่แก้ไขส่วนนี้
                    'client_id' => $this->_CLIENT_ID,
                    'redirect_uri' => $this->_CALLBACK_URL,
                    'scope' => 'openid email profile', // ไม่แก้ไขส่วนนี้
                    'state' => $_SESSION[$this->_STATE_KEY]
                )
            );
        $this->redirect($url);
    }

    public function requestAccessToken($params, $returnResult = NULL, $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION[$this->_STATE_KEY]) || $params['state'] !== $_SESSION[$this->_STATE_KEY]) {
            if (isset($_SESSION[$this->_STATE_KEY])) {
                unset($_SESSION[$this->_STATE_KEY]);
            }
            return false;
        }

        if (isset($_SESSION[$this->_STATE_KEY])) {
            unset($_SESSION[$this->_STATE_KEY]);
        }

        $code = $params['code'];
        $tokenURL = "https://api.line.me/oauth2/v2.1/token";

        $headers = array(
            'Content-Type: application/x-www-form-urlencoded'
        );
        $data = array(
            'grant_type' => 'authorization_code',
            'code' => (string)$code,
            'redirect_uri' => $this->_CALLBACK_URL,
            'client_id' => $this->_CLIENT_ID,
            'client_secret' => $this->_CLIENT_SECRET
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
//        $_SESSION['pee'] = $result;
        $result = json_decode($result, TRUE);

        if ($httpCode == 200) {
            if (!is_null($result) && array_key_exists('access_token', $result)) {
                if (is_null($returnResult)) {
                    return $result['access_token'];
                } else {
                    if (array_key_exists('id_token', $result)) {
                        $userData = explode(".", $result['id_token']);
                        list($alg, $data) = array_map('base64_decode', $userData);
                        $result['alg'] = $alg;
                        $result['user'] = $data;
                    }
                    return $result;
                }
            } else {
                return NULL;
            }
        } else {
            if (is_null($returnResult)) {
                return NULL;
            } else {
                return $result;
            }
        }
    }

    public function userProfile($accessToken, $returnResult = NULL, $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;
        $accToken = $accessToken;
        $profileURL = "https://api.line.me/v2/profile";

        $headers = array(
            'Authorization: Bearer ' . $accToken
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $profileURL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($result, TRUE);

        if ($httpCode == 200) {
            if (!is_null($result) && array_key_exists('userId', $result)) {
                if (is_null($returnResult)) {
                    return $result['userId'];
                } else {
                    return $result;
                }
            } else {
                return NULL;
            }
        } else {
            if (is_null($returnResult)) {
                return NULL;
            } else {
                return $result;
            }
        }
    }

    public function verifyToken($accessToken, $returnResult = NULL, $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;
        $accToken = $accessToken;
        $verifyURL = "https://api.line.me/oauth2/v2.1/verify";

        $headers = array();

        $data = array(
            'access_token' => $accToken
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $verifyURL . "?" . http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($result, TRUE);

        if ($httpCode == 200) {
            if (!is_null($result) && array_key_exists('scope', $result)) {
                if (is_null($returnResult)) {
                    return $result['scope'];
                } else {
                    return $result;
                }
            } else {
                return NULL;
            }
        } else {
            if (is_null($returnResult)) {
                return NULL;
            } else {
                return $result;
            }
        }
    }

    public function refreshToken($refreshToken, $data, $returnResult = NULL, $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;
        $tokenURL = "https://api.line.me/oauth2/v2.1/token";

        $headers = array(
            'Content-Type: application/x-www-form-urlencoded'
        );

        $data = array(
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id' => $this->_CLIENT_ID,
            'client_secret' => $this->_CLIENT_SECRET
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($result, TRUE);

        if ($httpCode == 200) {
            if (!is_null($result) && array_key_exists('access_token', $result)) {
                if (is_null($returnResult)) {
                    return $result['access_token'];
                } else {
                    return $result;
                }
            } else {
                return NULL;
            }
        } else {
            if (is_null($returnResult)) {
                return NULL;
            } else {
                return $result;
            }
        }
    }

    public function revokeToken($accessToken, $returnResult = NULL, $ssl = NULL)
    {
        $_SSL_VERIFYHOST = (isset($ssl)) ? 2 : 0;
        $_SSL_VERIFYPEER = (isset($ssl)) ? 1 : 0;
        $accToken = $accessToken;
        $revokeURL = "https://api.line.me/oauth2/v2.1/revoke";

        $headers = array(
            'Content-Type: application/x-www-form-urlencoded'
        );

        $data = array(
            'access_token' => $accToken,
            'client_id' => $this->_CLIENT_ID,
            'client_secret' => $this->_CLIENT_SECRET
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $revokeURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $_SSL_VERIFYHOST);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $_SSL_VERIFYPEER);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($result, TRUE);

        if ($httpCode == 200) {
            return true;
        } else {
            return NULL;
        }
    }

    public function redirect($url)
    {
        if (!header("Location: " . $url)) {
            echo '<meta http-equiv="refresh" content="0;URL=' . $url . '">';
        }
        exit;
    }

    public function setStateKey($stateKey)
    {
        $this->_STATE_KEY = $stateKey;
    }

    public function randomToken($length = 32)
    {
        if (!isset($length) || intval($length) <= 8) {
            $length = 32;
        }
        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($length));
        }
        if (function_exists('mcrypt_create_iv')) {
            return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
        }
        if (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($length));
        }
    }


    public function logout()
    {
        $accToken = $_SESSION['ses_login_accToken_val'];
        unset(
            $_SESSION['ses_login_accToken_val'],
            $_SESSION['ses_login_refreshToken_val'],
            $_SESSION['ses_login_userData_val']
        );
        if ($this->revokeToken($accToken)) {
            echo "Logout Line Success<br>";
        }
        $this->redirect("login.php");
    }

    public function getpic()
    {
        $pic = json_decode($_SESSION['ses_login_userData_val'], true);

        return $pic['picture'];
    }

    public function getEmail()
    {
        $email = json_decode($_SESSION['ses_login_userData_val'], true);

        return $email['email'];
    }

    public function getChannelId()
    {
        $CID = json_decode($_SESSION['ses_login_userData_val'], true);

        return $CID['aud'];
    }

    public function getName()
    {
        $name = json_decode($_SESSION['ses_login_userData_val'], true);

        return $name['name'];
    }

    function getLimitBroadCast($ACCESS_TOKEN)
    {
        $arrayHeader = array();
        $arrayHeader[] = "Content-Type: application/json";
        $arrayHeader[] = "Authorization: Bearer {$ACCESS_TOKEN}";
        $strUrl = "https://api.line.me/v2/bot/message/quota";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result,true);

        exit;
    }

    function getSent($ACCESS_TOKEN)
    {
        $arrayHeader = array();
        $arrayHeader[] = "Content-Type: application/json";
        $arrayHeader[] = "Authorization: Bearer {$ACCESS_TOKEN}";


        $strUrl = "https://api.line.me/v2/bot/message/quota/consumption";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

//    exit;
//    echo $result;
        $result = json_decode($result,true);
//        print_r($result);

        return $result;
        exit;
    }


}
