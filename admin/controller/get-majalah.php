<?php
require '../function/init.php';

header('Content-Type: application/json');

$sql = 'SELECT id_majalah, judul, edisi, harga_digital, harga_cetak, harga_keduanya FROM majalah';
$result = $conn->query($sql);

$data = [];
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
} else {
    echo json_encode(["error" => $conn->error]);
    die;
}

echo json_encode(["data" => $data]);
?>
