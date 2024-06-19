<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_p = $_POST['id_p'];

    $sql = "SELECT * FROM penjualan WHERE id_p = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_p);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $penjualan = $result->fetch_assoc();
            echo json_encode(["penjualan" => $penjualan]);
        } else {
            echo json_encode(["error" => "Penjualan tidak ditemukan."]);
        }
    } else {
        echo json_encode(["error" => "Query failed: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method."]);
}

$conn->close();
?>
