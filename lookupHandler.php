<?php
session_start();
require_once '_header.php';
$input = $_GET['input'];

if(strlen($input) == 12) {
    $db = new BusinessService();
    $results = $db->findTripByRef($input);
    
    if($results == NULL) { echo ' Record not found <br>'; }
    else { print_r($results); }
} else {
    echo 'You have provided an invalid input. <br>';
}

echo 'You entered ' . strtoupper($input);

require_once '_footer.php';
?>