<?php
    require 'M_Server_Connect.php';

    class Database {
        private $connection;

        public function __construct() {
            $this->connection = new M_Connection('root','','ecommerce');
        }

        public function SelectData($sql) {
            $result =  $this->connection->ExecuteQuery($sql);
            return $result;
        }

        public function InsertData($sql) {
            $result = $this->connection->ExecuteQuery($sql);
            if ($result === TRUE) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }

        public function DeleteData($sql) {
            $result = $this->connection->ExecuteQuery($sql);
            if ($result === TRUE) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }

    
    }
?>