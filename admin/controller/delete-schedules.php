<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_schedules = $_POST['id_schedules'];

    $sql = "DELETE FROM schedules WHERE id_schedules = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_schedules);

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
