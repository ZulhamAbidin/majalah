<?php

require 'admin/function/init.php';

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID tidak ditemukan</div>";
    exit;
}

$id = intval($_GET['id']);

$query = $conn->prepare("
    SELECT 
        p.id_p, 
        p.id_sub, 
        s.nama,
        p.id_majalah, 
        m.judul,
        p.harga, 
        m.harga_digital,
        m.harga_cetak,
        m.harga_keduanya,
        p.status_pembayaran, 
        p.bukti_pembayaran, 
        p.tgl_penjualan, 
        p.metode_pembayaran, 
        p.no_transaksi 
    FROM penjualan p
    LEFT JOIN subscriber s ON p.id_sub = s.id_sub
    LEFT JOIN majalah m ON p.id_majalah = m.id_majalah
    WHERE p.id_p = ?
");
$query->bind_param('i', $id);
$query->execute();
$result = $query->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $paket_pembelian = '';
    if ($row['harga_keduanya'] > 0) {
        $paket_pembelian = 'Digital & Cetak';
    } elseif ($row['harga_digital'] > 0) {
        $paket_pembelian = 'Digital';
    } elseif ($row['harga_cetak'] > 0) {
        $paket_pembelian = 'Cetak';
    } else {
        $paket_pembelian = 'Tidak Diketahui';
    }

    $harga = number_format($row['harga'], 0, ',', '.');
    $tgl_penjualan = date('d-m-Y', strtotime($row['tgl_penjualan']));
    $status_pembayaran = $row['status_pembayaran'] == 1 ? 'Sudah Dibayar' : 'Menunggu Konfirmasi Pembayaran Dari Admin';

    $rekening_text = '';
    switch ($row['metode_pembayaran']) {
        case 'BRI':
            $rekening_text = '
                <h5>Pastikan anda melakukan pembayaran ke :</h5>
                <h3 class="rekening-bri">BRI 31243 1233 123</h3>
                <h3 class="rekening-bri">A.n Admin</h3>
                <h3 class="rekening-bri">Jumlah Yang Harus Dibayarkan : Rp ' . $harga . '</h3>
            ';
            break;
        case 'BCA':
            $rekening_text = '
                <h5>Pastikan anda melakukan pembayaran ke :</h5>
                <p class="rekening-bca">BCA 31243 1233 123</p>
                <p class="rekening-bca">A.n Admin</p>
                <p class="rekening-bca">Jumlah Yang Harus Dibayarkan : Rp ' . $harga . '</p>
            ';
            break;
        case 'BNI':
            $rekening_text = '
                <h5>Pastikan anda melakukan pembayaran ke :</h5>
                <p class="rekening-bni">BNI 31243 1233 123</p>
                <p class="rekening-bni">A.n Admin</p>
                <p class="rekening-bni">Jumlah Yang Harus Dibayarkan : Rp ' . $harga . '</p>
            ';
            break;
        case 'BSI':
            $rekening_text = '
                <h5>Pastikan anda melakukan pembayaran ke :</h5>
                <p class="rekening-bsi">BSI 31243 1233 123</p>
                <p class="rekening-bsi">A.n Admin</p>
                <p class="rekening-bsi">Jumlah Yang Harus Dibayarkan : Rp ' . $harga . '</p>
            ';
            break;
        default:
            $rekening_text = '<p>Metode pembayaran tidak valid.</p>';
            break;
    }

    $no_transaksi = $row['no_transaksi'] ? strtoupper($row['no_transaksi']) : 'N/A';

} else {
    echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Invoice</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Invoice</h3>
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5>ID Transaksi: <?= $no_transaksi ?></h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <h5>Tanggal: <?= $tgl_penjualan ?></h5>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Subscriber</th>
                                    <th>Judul Majalah</th>
                                    <th>Harga</th>
                                    <th>Status Pembayaran</th>
                                    <th>Paket Pembelian</th>
                                    <th>Metode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['judul'] ?></td>
                                    <td>Rp <?= $harga ?></td>
                                    <td><?= $status_pembayaran ?></td>
                                    <td><?= $paket_pembelian ?></td>
                                    <td><?= $row['metode_pembayaran'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <h5 class="fw-bold">Metode Pembayaran:</h5>
                                <p class="fs-5"><?= $row['metode_pembayaran'] ?></p>
                            </div>
                            <div class="col-md-4">
                                <p class="fs-5"><?= $rekening_text ?></p>
                            </div>
                            <div class="col-md-4 text-end">
                                <h5 class="fw-bold">No. Transaksi:</h5>
                                <p class="fs-5"><?= $no_transaksi ?></p>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <p>Terima kasih telah bertransaksi dengan kami!</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
