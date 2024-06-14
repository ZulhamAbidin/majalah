<?php
require 'admin/function/init.php';

if (!isset($_SESSION[KEY]['login'])) {
    setError('Silahkan Login Terlebih Dahulu!');
    direct('login.php');
}

$id = get('id');
$jenis = get('jenis');
$id_subscriber = get('id_sub');

if (!$id || !$jenis || !$id_subscriber) {
    setError('Parameter tidak lengkap.');
    direct('index.php');
}

$majalah = query_select('majalah', ['where' => "id_majalah = '$id'"])[0];

if (!$majalah) {
    setError('Majalah tidak ditemukan.');
    direct('index.php');
}

switch ($jenis) {
    case 'digital':
        $harga = $majalah['harga_digital'];
        break;
    case 'cetak':
        $harga = $majalah['harga_cetak'];
        break;
    case 'keduanya':
        $harga = $majalah['harga_keduanya'];
        break;
    default:
        setError('Jenis pembelian tidak valid.');
        direct('index.php');
        break;
}

$data = [
    'id_sub' => $id_subscriber,
    'id_majalah' => $id,
    'harga' => $harga,
    'status_pembayaran' => 0, 
    'bukti_pembayaran' => '0', 
    'tgl_penjualan' => date('Y-m-d'),
];

$result = query_insert('penjualan', $data);

if ($result) {
    setSuccess('Pembelian berhasil! Silahkan lakukan pembayaran.');
    direct('majalah-anda.php');
} else {
    setError('Gagal melakukan pembelian. Silahkan coba lagi.');
    direct('index.php');
}
?>
