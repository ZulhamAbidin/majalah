<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_majalah = $_POST['id_majalah'];

    $sql = "DELETE FROM majalah WHERE id_majalah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_majalah);

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
