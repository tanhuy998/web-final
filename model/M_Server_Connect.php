<?php
    class M_Connection {
        private $serverName = "localhost";
        private $account;
        private $password;
        private $dbName;
        private $conn;

        public function __construct($acc,$pass,$_dbName) {
            $this->account = $acc;
            $this->password = $pass;
            $this->dbName = $_dbName;
            $this->conn = new mysqli($this->serverName, $this->account, $this->password, $this->dbName);
            $this->conn->set_charset('utf8');
        }

        public function OpenConnection() {
            if ($this->conn->connect_error) {
                die ("connected failed");
            }
        }

        public function ExecuteQuery($sql) {
            $this->OpenConnection();

            $result = $this->conn->query($sql);
            $this->CloseConnection();

            return $result;
        }

        public function CloseConnection() {
            $this->conn->close();
        }
    }
?>