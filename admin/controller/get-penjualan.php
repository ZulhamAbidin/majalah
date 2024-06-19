<?php
require '../function/init.php';

header('Content-Type: application/json');

$sql = 'SELECT p.id_p, p.id_sub, p.id_majalah, p.harga, p.status_pembayaran, p.bukti_pembayaran, p.tgl_penjualan, p.metode_pembayaran, p.no_transaksi,
                s.nama AS subscriber_nama,
                m.judul AS judul_majalah
        FROM penjualan p
        LEFT JOIN subscriber s ON p.id_sub = s.id_sub
        LEFT JOIN majalah m ON p.id_majalah = m.id_majalah';

$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["error" => "Query failed: " . $conn->error]));
}

$datas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['status_pembayaran'] = (int)$row['status_pembayaran'];
        $datas[] = $row;
    }
} else {
    die(json_encode(["error" => "No data found"]));
}

echo json_encode(["datas" => $datas]);
$conn->close();
?>
