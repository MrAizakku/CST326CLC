<?php
require_once 'Autoloader.php';

class BusinessService {
    private $dbService;
    private $mysqli;
    
    public function __construct() {
        $this->dbService = new DataService();
        $this->mysqli = $this->dbService->getConnect();
    }
    
    function reconnect() {
        $this->mysqli = $this->dbService->getConnect();
    }

    //***************************
    //*   UTILITY FUNCTIONS     *
    //***************************
    
    function GenerateKey($lenght = 12) {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
    
    
    //***************************
    //*    TRIP FUNCTIONS       *
    //***************************
    
    function getAllTrips() {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->getAllTrips();
        $dbtd->connClose();
        return $result;
    }
    
    function findTripByRef($n) {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->findTripByRef($n);
        $dbtd->connClose();
        return $result;
    }
    
    function deleteTripById($id) {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->deleteTripById($id);
        $dbtd->connClose();
        return $result;
    }
    
    function deleteTripByRef($ref) {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->deleteTripByRef($ref);
        $dbtd->connClose();
        return $result;
    }
    
    function insertTrip($trip_ref, $trip_start, $trip_end, $trip_zip) {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->insertTrip($trip_ref, $trip_start, $trip_end, $trip_zip);
        $dbtd->connClose();
        return $result;
    }
    
    function updateTripById($trip_id, $trip_ref, $trip_start, $trip_end, $trip_zip) {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->updateTripById($trip_id, $trip_ref, $trip_start, $trip_end, $trip_zip);
        $dbtd->connClose();
        return $result;
    }
    
    function updateTripByRef($trip_ref, $trip_start, $trip_end, $trip_zip) {
        $dbtd = new DataServiceTripData($this->mysqli);
        $result = $dbtd->updateTripByRef($trip_ref, $trip_start, $trip_end, $trip_zip);
        $dbtd->connClose();
        return $result;
    }
    
}

?>