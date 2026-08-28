<?php

class Database {
   
    private $host = "localhost";
    private $username = "root";      
    private $password = "";         
    private $database = "hospital_management";
    public $connection;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->connection = new mysqli(
            $this->host, 
            $this->username, 
            $this->password, 
            $this->database
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        
        return $this->connection;
    }

    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>