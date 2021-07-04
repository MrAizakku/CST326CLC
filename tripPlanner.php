<?php
session_start();
require_once '_header.php'; 
echo $message;
$fromDate = $_GET['fromDate'];
$toDate = $_GET['toDate'];
$Destination = $_GET['Destination'];
echo '
    <div class="d-flex text-center bg-secondary">
        <div class="container ms-0">
            <form class="mt-3 mb-1" action="" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-3 text-end">
                                <label for="fromDate" class="form-label">From:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" id="fromDate" name="fromDate" class="form-control mb-2 ip-2" value="'.$fromDate.'" required autofocus />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-3 text-end">
                                <label for="toDate" class="form-label">To:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" id="toDate" name="toDate" class="form-control mb-2 ip-2" value="'.$toDate.'" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-3 text-end">
                                <label for="toDate" class="form-label">Zip Code:</label>
                            </div>
                            <div class="col-9">
                                <input type="number" id="Destination" name="Destination" class="form-control mb-2 ip-2" value="'.$Destination.'" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
'; 

$today_time = strtotime(date("m/d/Y", time()));
$from_time = strtotime($fromDate);
$to_time = strtotime($toDate);
$final_time = strtotime("+6 month", $from_time);

if($fromDate != null && $toDate != null && $fromDate != "" && $toDate != "" && 
    $fromDate <= $toDate && $from_time >= $today_time && $to_time <= $final_time) {
    echo "<div class='alert alert-success'>Trip dates: " . $fromDate . " to " .  $toDate."</div>";
    //$db = new BusinessService();
    //$results
} else if ($fromDate == null && $toDate == null && $fromDate == "" && $toDate == ""){
    //
} else {
    echo "<div class='alert alert-danger'>Error with dates.</div>";
}

include '_tripItinery.php';

require_once '_footer.php';
?>