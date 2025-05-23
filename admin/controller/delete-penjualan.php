<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = json_decode(file_get_contents('php://input'), true);
    $id_p = $input['id_p'];

    $sql_delete_penjualan = "DELETE FROM penjualan WHERE id_p = ?";
    $stmt_delete_penjualan = $conn->prepare($sql_delete_penjualan);
    $stmt_delete_penjualan->bind_param("i", $id_p);

    if ($stmt_delete_penjualan->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $stmt_delete_penjualan->error]);
    }

    $stmt_delete_penjualan->close();
} else {
    echo json_encode(["error" => "Invalid request method."]);
}

$conn->close();
?>
