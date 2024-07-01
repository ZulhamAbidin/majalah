<?php $halaman = "Majalah" ?>
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
        m.edisi,
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

    // $status_pembayaran = '';
    //  switch ($row['status_pembayaran']) {
    //      case 1:
    //          $status_pembayaran = '<span class="badge bg-success rounded-pill">Sudah Dibayar</span>';
    //          break;
    //      case 3:
    //          $status_pembayaran = '<span class="badge bg-danger rounded-pill">Belum Dibayar</span>';
    //          break;
    //      default:
    //          $status_pembayaran = '<span class="badge bg-light-secondary rounded-pill">Menunggu Konfirmasi Pembayaran Dari Admin</span>';
    //          break;
    //  }

    $rekening_text = '';
    switch ($row['metode_pembayaran']) {
        case 'BRI':
            $rekening_text = '
            <h5>Pastikan anda telah melakukan pembayaran ke : </h5>
                <p class="rekening-bri fw-semibold">bri 31243 1233 123 A.n Majalah Online</p>
            ';
            break;
        case 'BCA':
            $rekening_text = '
            <h5>Pastikan anda telah melakukan pembayaran ke : </h5>
                <p class="rekening-bca fw-semibold">bca 31243 1233 123 A.n Majalah Online</p>
            ';
            break;
        case 'BNI':
            $rekening_text = '
            <h5>Pastikan anda telah melakukan pembayaran ke : </h5>
                <p class="rekening-bni fw-semibold">bni 31243 1233 123 A.n Majalah Online</p>
            ';
            break;
        case 'BSI':
            $rekening_text = '
                <h5>Pastikan anda telah melakukan pembayaran ke : </h5>
                <p class="rekening-bsi fw-semibold">BSI 31243 1233 123 A.n Majalah Online</p>
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

<?php require 'Comp/header.php'; ?>
<?php require 'Comp/navbar.php'; ?>


<style>
		.majalah-column {
			max-width: 210px !important;
			padding: 10px !important;
			white-space: normal !important;
			word-break: break-word !important;
			overflow-wrap: break-word !important;
		}
	</style>


<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12">
                    <div class="row align-items-center g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-2">
                                <img src="assets/images/logo-dark.png" class="img-fluid" alt="images">
                                <?php if ($row['status_pembayaran'] == 3) : ?>
                                    <span class="badge bg-danger rounded-pill ms-2">Belum Dibayar</span>
                                <?php elseif ($row['status_pembayaran'] == 1) : ?>
                                    <span class="badge bg-success rounded-pill ms-2">Sudah Dibayar</span>
                                <?php else : ?>
                                    <span class="badge bg-light-secondary rounded-pill ms-2">Status Pembayaran</span>
                                <?php endif; ?>
                            </div>
                            <p class="mb-0">INV <?= $no_transaksi ?></p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h6>Date <span class="text-muted f-w-400"><?= $tgl_penjualan ?></span></h6>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Subscriber</th>
                                    <th>Judul Majalah</th>
                                    <th>Paket Pembelian</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th class="text-end">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>x</td>
                                    <td><?= $row['nama'] ?></td>
                                    <td class="majalah-column"><?= $row['judul'] ?> <span class="fw-semibold"> Edisi <?= $row['edisi'] ?></span></td>
                                    <td><?= $paket_pembelian ?></td>
                                    <td><?= $row['metode_pembayaran'] ?></td>
                                    <td><?= $status_pembayaran ?></td>
                                    <td class="text-end">Rp <?= $harga ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-start">
                        <hr class="mb-2 mt-1 border-secondary border-opacity-50">
                    </div>
                </div>
                <div class="col-12">
                    <div class="invoice-total ms-auto">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="text-muted mb-1 text-start">Total Yang Harus Dibayarkan</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-1 text-end">Rp <?= $harga ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12"><label class="form-label">Note</label>
                    <p class="mb-0"><?= $rekening_text ?></p>
                </div>
                <div class="col-12 text-end d-print-none">
                    <a href="majalah-anda.php" class="btn btn-outline-secondary btn-print-invoice"> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>