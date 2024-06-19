<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $id_p = $input['id_p'];
    $status_pembayaran = $input['status_pembayaran'];

    $sql = "UPDATE penjualan SET status_pembayaran = ? WHERE id_p = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status_pembayaran, $id_p);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method."]);
}

$conn->close();
?>
