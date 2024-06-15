<?php
require 'admin/function/init.php';

// Set Content-Type header to application/json
header('Content-Type: application/json');

// Query to fetch the data
$sql = 'SELECT id_schedules, CarrierName, VesselName, VoyageNumber, TradeLine, DepartureDate, ArrivalDate FROM schedules';
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode(["data" => $data]);
?>
