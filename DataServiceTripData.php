<?php
require_once 'Autoloader.php';
class DataServiceTrip {
    private $conn;
    
    function __construct($mysqli) {
        $this->conn = $mysqli;
    }
    
    
    function getAllTrips() {
        $stmt = $this->conn->prepare("SELECT * FROM TRIP");
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) {
            echo "assume the SQL statement has an issue...";
            return null;
            exit;
        }
        if($result->num_rows == 0) {
            return null;
        } else {
            $trip_array = array();
            while($trip = $result->fetch_assoc()) {
                array_push($trip_array, $trip);
            }
            return $trip_array;
        }
    }
    
    function findTripByRef($n) {
        $stmt = $this->conn->prepare("SELECT * FROM CATALOG WHERE TRIP_REF = ?");
        $stmt->bind_param("s", $n);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) {
            echo "assume the SQL statement has an issue...";
            return null;
            exit;
        }
        if($result->num_rows == 0) {
            return null;
        } else {
            $trip_array = array();
            while($trip = $result->fetch_assoc()) {
                array_push($trip_array, $trip);
            }
            return $trip_array;
        }
    }
    
    function deleteTripById($id) {
        $stmt = $this->conn->prepare("DELETE FROM TRIP WHERE TRIP_ID = ?");
        $stmt->bind_param("i", $id);
        
        $stmt->execute();
        $result = $stmt->affected_rows;
        
        //print_r($result);
        if ($result <= 0) {
            return false;
        } else if ($result >= 1) {
            return true;
        }
    }
    
    function deleteTripByRef($ref) {
        $stmt = $this->conn->prepare("DELETE FROM TRIP WHERE TRIP_ID = ?");
        $stmt->bind_param("i", $ref);
        
        $stmt->execute();
        $result = $stmt->affected_rows;
        
        //print_r($result);
        if ($result <= 0) {
            return false;
        } else if ($result >= 1) {
            return true;
        }
    }
    
    function insertTrip($trip_ref, $trip_start, $trip_end, $trip_zip) {
        $stmt = $this->conn->prepare("INSERT INTO TRIP (TRIP_ID, TRIP_REF, TRIP_START, TRIP_END, TRIP_ZIP) VALUES (NULL, ?, ?, ?, ?);");
        $stmt->bind_param("ssss", $trip_ref, $trip_start, $trip_end, $trip_zip);
        
        $stmt->execute();
        $result = $stmt->affected_rows;
        //print_r($result);
        if ($result <= 0) {
            return false;
        } else if ($result >= 1) {
            return true;
        }
    }
    
    function updateTripById($trip_id, $trip_ref, $trip_start, $trip_end, $trip_zip) {
        $stmt = $this->conn->prepare("UPDATE TRIP SET TRIP_REF = ?, TRIP_START = ?, TRIP_END = ?, TRIP_ZIP = ? WHERE TRIP_ID = ?");
        $stmt->bind_param("ssssi", $trip_ref, $trip_start, $trip_end, $trip_zip, $trip_id);
        
        $stmt->execute();
        $result = $stmt->affected_rows;
        //print_r($result);
        if ($result <= 0) {
            return false;
        } else if ($result >= 1) {
            return true;
        }
    }
    
    function updateTripByRef($trip_ref, $trip_start, $trip_end, $trip_zip) {
        $stmt = $this->conn->prepare("UPDATE TRIP SET TRIP_START = ?, TRIP_END = ?, TRIP_ZIP = ? WHERE TRIP_REF = ?");
        $stmt->bind_param("ssss", $trip_start, $trip_end, $trip_zip, $trip_ref);
        
        $stmt->execute();
        $result = $stmt->affected_rows;
        //print_r($result);
        if ($result <= 0) {
            return false;
        } else if ($result >= 1) {
            return true;
        }
    }
    
    function connClose() {
        $this->conn->close();
    }
}
?>