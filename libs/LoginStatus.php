<?php
    require_once 'HashCode.php';
    require_once '../model/M_Database.php';
    /*
        requirement: just include this file when already start a session
     */

    class AccessToken {
        
        public static function AnonymousToken() {
            $db = new Database();

            $sql = "SELECT * FROM account INNER JOIN account_type ON account.LOAITK = account_type.ID WHERE account_type.LOAI = 'anonymous'";

            $account_resource = $db->SelectData($sql);

            $anonymous = $account_resource->fetch_assoc();

            //first, encode the id and password
            $id = convert_uuencode($anonymous['ID']);
            $pass = convert_uuencode($anonymous['MATKHAU']);

            // first token layer is concate $id + "token" + $pass
            $token_layer1 = $id.'token'.$pass;
            // second token layer is encode the the first layer
            $token_layer2 = convert_uuencode($token_layer1);

            return $token_layer2; 
        }

        public static function GetID(string $token) {
            // decode the token string
            $token_step1 = convert_uudecode($token);
            // after decode we'll have a string, then we split this string into 2 piece by string "token" delimiter
            $token_step2 = explode('token',$token_step1);

            // if the return array has less or greater than 2 element, it's mean the token is invalid then return false
            if (count($token_step2) != 2) return false;

            // this is for we pass the condition above when the returned array has 2 element
            $id = convert_uudecode($token_step2[0]);    //decode again for each array element
            $pass = convert_uudecode($token_step2[1]);

            $db = new Database();

            $sql = "SELECT * FROM account INNER JOIN account_type ON account.LOAITK = account_type.ID WHERE account.ID = $id and account.MATKHAU = $pass";

            $account_resource = $db->SelectData($sql);
            $account;

                // check for this token is valid or not
            if ($account_resource->num_rows > 0) {
                $account = $account_resource->fetch_assoc();

                return convert_uuencode($id);
            }
            else {
                return false;
            }
        }
    }

    class Login {
        public function __construct() {

        }

        public static function CheckLogin() {
            if (isset($_SESSION['user'])) {
                return true;
            }
            else {
                return false;
            }
        }

        public static function Start() {
            // check when there is a login session
            if (!isset($_SESSION['user'])) { // if there is no user login
                echo 1;
                /*
                    Now we have two situation
                    situation #1: there is no access token in cookie. So we create an access token for account Anonymous type for non member viseter
                    situation #2: there is an access token in cookie. We must check the token is valid or not
                                    if the token is valid so we store the id of user for session
                                    else we create an access token for account Anonymous type for non-member for session
                 */
                // check for access token in cookie
                if (!isset($_COOKIE['token'])) { // Situation #1 if there is  no login session in cookie
                    $token = AccessToken::AnonymousToken();
                    echo 11;
                    // set cookie name "token" which envaluate to anonymous account
                    setcookie('token',$token, time() + (86400 *30),'/'); // $token variable here always valid because it's returned by AccessToken::Anonoymous()
                    $_SESSION['user'] = AccessToken::GetID($token);
                }
                else { // Situation #2
                    $token = $_COOKIE['token'];
                    echo 12;
                    // if the token is valid
                    if ($id = AccessToken::GetID($token)) { // if statement here check the value of variable $id, not check $id is equal to AccessToken::GetID($token) 
                        $_SESSION['user'] = $id; // id here is encoded 
                        echo 121;
                    }
                    else {
                        echo 122;
                        $token = AccessToken::AnonymousToken();
    
                        // set cookie name "token" which envaluate to anonymous account
                        setcookie('token',$token, time() + (86400 *30),'/');
                        $_SESSION['user'] = AccessToken::GetID($token);
                    }
                }
            }
            else {
                echo 'seted';
            }
        }

        public static function Out() {
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);

                $token = AccessToken::AnonymousToken();
                echo 11;
                // set cookie name "token" which envaluate to anonymous account
                setcookie('token',$token, time() + (86400 *30),'/'); // $token variable here always valid because it's returned by AccessToken::Anonoymous()
                $_SESSION['user'] = AccessToken::GetID($token);
            }
        }
    }

    
?>