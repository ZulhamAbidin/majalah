<?php
session_start();
require 'admin/function/init.php';

if (!isset($_SESSION[KEY]["login"])) {
    echo 'not_logged_in';
    exit;
}

if (isset($_GET['id'])) {
    $id_p = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM penjualan WHERE id_p = '$id_p'");

    if ($result) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conn);
    }
} else {
    echo 'invalid_request';
}
?>
