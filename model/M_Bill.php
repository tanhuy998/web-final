<?php
    require_once 'M_Database.php';

    class Bill {
        private $user_id;
        private $list = array(); // specify the list of ordered product
        private $adress;
        private $placed; // a specified object of this class just only has 1 chance to place an order

        public function __construct($_userID, array $_list, string $_adress = '') {
            $this->user_id = $_userID;
            $this->list = $_list;
            $this->adress = $_adress;
            $this->placed = false;
        }

        // this funtion will place an order
        // database structure:
        //      bill table is the table that hold the information about an order of user
        //      order_list table is the table that hold an information about how a product is choose
        //      order_list has foreign key references to bill 
        //      the relation ship of two tables is 1 - n (bill - order_list)
        public function Place() {
            // if this object hasn't been placed to database yet
            if ($this->placed === false) {
                $this->placed = true;

                if (count($list) == 0) {
                    return false;
                }

                $userID = $this->user_id;
                $_adress = $this->adress;

                $db = new Database();
                // insert bill record first
                $sql = "INSERT INTO bill (IDTAIKHOAN, THOIGIAN, DC) VALUES ('$userID', NOW(), '$_adress')";

                // #1 if insert successfully
                if ($db->InsertData($sql)) {
                    unset($db);
                    $db = new Database();

                    // get the newest bill's ID that already insert
                    $sql = "SELECT MAX(ID) AS ID FROM bill";

                    $resource = $db->SelectData($sql);

                    $arr = $resource->fetch_assoc();
                    
                    // #1-2 if return an exist bill ID
                    if (count($arr) == 1) {
                        $bill_id = $arr['ID'];

                        unset($db);

                        foreach ($this->list as $pID => $qty) {
                            $db = new Database();
                            
                            // fetching throgh the order list and insert each product
                            $sql = "INSERT INTO order_list (IDHOADON, IDSANPHAM, SOLUONG) VALUES ('$bill_id', '$pID', '$qty')";

                            // #1-2-3 if insert failed
                            if (!$db->InsertData($sql)) {

                                // delete all thing we have inserted
                                unset($db);
                                $db = new Database();
                                $sql = "DELETE FROM order_list WHERE order_list.IDHOADON = '$bill_id'";
                                $db->DeleteData($sql);
                                unset($db);

                                $db = new Database();
                                $sql = "DELETE FROM bill WHERE bill.ID = '$bill_id'";
                                $db->DeleteData($sql);

                                return false;
                            }
                        }

                        return true;
                    }
                    else { // #1-1 else when there no return bill ID
                        return false;
                    }
                }
                else { #1 else when the insertion of bill record is failed
                    return false;
                }
            }   // if this object has been placed to database
            else {
                return false;
            }
        }
    }
?>