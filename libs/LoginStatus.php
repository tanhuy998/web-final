<?php
    require_once 'HashCode.php';
    require_once '../model/M_Database.php';
    require_once '../model/M_Product.php';
    require_once '../model/M_Bill.php';
    require_once '../libs/Cart.php';

    // if (session_status() == PHP_SESSION_NONE) {
    //     session_start();
    // }    
    /*
        requirement: just include this file when already start a session
     */

    class AccessToken {
        
        public static function AnonymousToken() {
            $db = new Database();

            $sql = "SELECT account.ID,account.MATKHAU,account_type.LOAI FROM account INNER JOIN account_type ON account.LOAITK = account_type.ID WHERE account_type.LOAI = 'anonymous'";

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

            $sql = "SELECT * FROM account INNER JOIN account_type ON account.LOAITK = account_type.ID WHERE account.ID = '$id' AND account.MATKHAU = '$pass'";

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

        public static function Token($id,$pass) {
            $db = new Database();
            // must check in the database if the account has $id and $pass value is exist
            $sql = "SELECT * FROM account WHERE account.ID = '$id' AND account.MATKHAU = '$pass'";

            $resource = $db->SelectData($sql);
            
            if ($resource->num_rows > 0) { // if the account is exist, begin the encode the token
                $ID = convert_uuencode($id);
                $PASS = convert_uuencode($pass);

                $token_layer1 = $ID.'token'.$PASS;
                $token_layer2 = convert_uuencode($token_layer1);

                return $token_layer2;
            }
            else { // if the account is not exist return false;
                return false;
            }

        }
    }

    class IsNotUserException extends Exception {
        public function __construc() {
            parent::__construct("You haven't loged in yet!",0);
        }
    }

    class LogIn {
        private $id; // property is encoded
        private $permission; // property is encoded
        private $information;

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

        /*
            this method start a login process without account and password
            this process base on the access token placed on client cookie
        */
        public function Start() {
            // check when there is a login session
            //if (!isset($_SESSION['user'])) { // if there is no user login
            //    echo 1;
                /*
                 *  Now we have two situation
                 *  situation #1: there is no access token in cookie. So we create an access token for account Anonymous type for non member viseter
                 *  situation #2: there is an access token in cookie. We must check the token is valid or not
                 *                  if the token is valid so we store the id of user for session
                 *                  else we create an access token for account Anonymous type for non-member for session
                 */
                // check for access token in cookie
                if (!isset($_COOKIE['token'])) { // Situation #1 if there is  no login session in cookie
                    echo 11;
                    $this->Out();
                }
                else { // Situation #2
                    $token = $_COOKIE['token'];
                    echo 12;
                    // Check if the token is valid
                    if ($id = AccessToken::GetID($token)) { //Situation #2-1 if statement here check the value of variable $id, not check $id is equal to AccessToken::GetID($token)
                        // must decode the id taken from access token to query from database 
                        $tempID = convert_uudecode($id);

                        $db = new Database();

                        $sql = "SELECT account_type.LOAI FROM account INNER JOIN account_type ON account.LOAITK = account_type.ID WHERE account.ID = '$tempID'";

                        $resource = $db->SelectData($sql);
                        $accountType = $resource->fetch_assoc();

                        if (isset($this->information)) {
                            unset($this->information); // clear the information property
                        }
                        //$_SESSION['user'] = $id; // id here is encoded 
                        //$_SESSION['permit'] = convert_uuencode($accountType['LOAI']);
                        $this->id = $id;
                        $this->permission = convert_uuencode($accountType['LOAI']);
                        echo 121;
                    }
                    else { // Situation #2-2 if the acces token get from cookie is invalid
                        echo 122;
                        $this->Out();
                    }
                }
            //}
        }

        /*
            this method start a login process with indentifier
            indentifier here is the account and password
            when the login process is setted up successfully, this method will place an access token on client's cookie
        */
        public function StartWithIdentifier($account,$pass) {
            // password must be hash to in to query from database
            $pass = hashCode($pass);

            $db = new Database();

            $sql = "SELECT account.ID,account.MATKHAU,account_type.LOAI FROM account INNER JOIN account_type ON account.LOAITK = account_type.ID WHERE account.TAIKHOAN = '$account' AND account.MATKHAU = '$pass'";

            $resource = $db->SelectData($sql);

            if ($resource->num_rows > 0) { // if account is exist 
                $account = $resource->fetch_assoc();

                $ID = $account['ID'];
                $pass = $account['MATKHAU'];
                $this->id = convert_uuencode($ID);
                $this->permission = convert_uuencode($account['LOAI']);

                if(isset($this->information)) {
                    unset($this->information);
                }

                $token = AccessToken::Token($ID,$pass);

                // place token on cookie
                setcookie('token',$token, time() + (86400 *30),'/');
            }
            else { // if account doesn't exist 
                $this->Out();
            }
        } 

        public function IsAdmin() {
            $permit = convert_uudecode($this->permission);
            //echo $permit;
            return ($permit == 'admin');
        }

        public function IsAnonymous() {
            $permit = convert_uudecode($this->permission);
            //echo $permit;
            //echo $permit;
            return ($permit == 'anonymous');
        }


        /*
            this method return information of a loged in account depend on some situation
            if user permission is not anonymous and this user's information exists in database the method will return an associative array that specify the structure of an user infomation
            otherwise the method will return false
         */
        public function GetInformation() {
            // first check permission of the account
            if (!$this->IsAnonymous()) { // if permisstion is not anonymous
                // check if $information property is setted
                if (!isset($this->information)) { // if the $information property is not set
                    // then we take the information from database
                    $ID = convert_uudecode($this->id);

                    $db = new Database();
                    
                    $sql = "SELECT TEN,NGSINH,DC,EMAIL,SDT FROM account JOIN account_information ON account.ID = account_information.IDTAIKHOAN WHERE account.ID = '$ID'";

                    $resource = $db->SelectData($sql);

                    // now check the existence of the user's information in database table 
                    if ($resource->num_rows > 0) { // if number of rows returned different than 0 
                        $this->information = $resource->fetch_assoc();
                        return $this->information;
                    }
                    else { // else there's no row returned
                        return false;
                    }
                }
                else { // 
                    return $this->information;
                }
            }
            else { // if permistion is anonymous
                return false;
            }
        }
        /*  
            Log out method is just set the current login process to anonymous permssion
         */
        public function Out() {
            // if (isset($_SESSION['user'])) {
            //     unset($_SESSION['user']);

            //     $token = AccessToken::AnonymousToken();
            //     echo 11;
            //     if (isset($this->information)) {
            //         unset($this->information); // clear information property
            //     }
            //     // set cookie name "token" which envaluate to anonymous account
            //     setcookie('token',$token, time() + (86400 *30),'/'); // $token variable here always valid because it's returned by AccessToken::Anonoymous()
            //     $_SESSION['user'] = AccessToken::GetID($token);
            // }

            $token = AccessToken::AnonymousToken();
            // set cookie name "token" which envaluate to anonymous account
            setcookie('token',$token, time() + (86400 *30),'/'); // $token variable here always valid because it's returned by AccessToken::Anonoymous()

            if (isset($this->information)) {
                unset($this->information); // clear the information property
            }
            //$_SESSION['user'] = AccessToken::GetID($token);
            //$_SESSION['permit'] = convert_uuencode('anonymous');
            $this->id = AccessToken::GetID($token);
            $this->permission = convert_uuencode('anonymous');
        }


        public function PlaceOrder($_adress) {
            // an associative array of products
            $cart_list = GetCartList();

            $user_id = convert_uudecode($this->id);

            $bill = new Bill($user_id, $cart_list, $_adress);
            
            if ($bill->Place()) {
                return true;
            }
            else {
                return false;
            }
        }

        public function Commented($_product_id) {
            $db = new Datanbase();

            $userID = convert_uudecode($this->id);

            $sql = "SELECT * FROM product_comment WHERE product_comment.ID = '$_product_id' AND product_comment.IDTAIKHOAN = '$user_id'";

            $result = $db->SelectData($sql);
            echo 'something';
            if ($result->num_rows > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function LeaveComment($_pID, string $_content) {

            if (!$this->IsAnonymous()) {

                if ($_content != '') {
                    $prd = new Product();

                    $userID = convert_uudecode($this->id);

                    if ($prd->InsertComment($userID, $_pID, $_content)){
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                else {
                    return false;
                }
            }
            else {
                throw new IsNotUserException();
            }
        }
    }

    
?>