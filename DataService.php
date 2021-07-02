<?php
require_once 'Autoloader.php';

class DataService {    
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "cst326";
    
    function getConnect() {
        $conn = mysqli_connect($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
        if ($conn->connect_errno) {
            echo "Sorry, this website is experiencing problems.";
            echo "Error: Failed to make a MySQL connection, here is why: \n";
            echo "Errno: " . $conn->connect_errno . "\n";
            echo "Err: " . $conn->connect_error . "\n";
            exit;
        } else {
            return $conn;
        }
    }
}

?>