<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan input JSON dari body request
    $input = json_decode(file_get_contents('php://input'), true);
    $id_p = $input['id_p'];

    $sql = "DELETE FROM penjualan WHERE id_p = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_p);

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
