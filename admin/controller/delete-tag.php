<?php
require '../function/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tag = $_POST['id_tag'];

    $sql = "DELETE FROM tag WHERE id_tag = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_tag);

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
