<?php
require '../function/init.php';

header('Content-Type: application/json');

$sql = 'SELECT id_schedules, CarrierName, VesselName, VoyageNumber, TradeLine, DepartureDate, ArrivalDate FROM schedules';
$result = $conn->query($sql);

$data = [];
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Format DepartureDate dan ArrivalDate jika perlu (misal menggunakan format tertentu)
            $row['DepartureDate'] = date('Y-m-d', strtotime($row['DepartureDate'])); // Contoh format tanggal
            $row['ArrivalDate'] = date('Y-m-d', strtotime($row['ArrivalDate'])); // Contoh format tanggal

            $data[] = $row;
        }
    }
} else {
    echo json_encode(["error" => $conn->error]);
    die;
}

echo json_encode(["data" => $data]);
?>
