<?php
require '../function/init.php';

header('Content-Type: application/json');

$sql = 'SELECT p.id_p, s.nama AS subscriber_nama, m.judul AS judul_majalah, p.metode_pembayaran, p.status_pembayaran, p.harga
        FROM penjualan p
        JOIN subscriber s ON p.id_sub = s.id_sub
        JOIN majalah m ON p.id_majalah = m.id_majalah';

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
