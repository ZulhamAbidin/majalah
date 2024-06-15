<?php
$halaman = 'Detail Produk';
require 'comp/header.php';
require 'admin/function/init.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION[KEY]['login']['id_sub'])) {
    setError('Silahkan Login Terlebih Dahulu!');
    direct('login.php');
}

$id = get('id');
$majalah = query_select('majalah', ['where' => "id_majalah = '$id'"])[0];

if (!$majalah) {
    setError('Majalah tidak ditemukan.');
    direct('index.php');
}

$id_sub = $_SESSION[KEY]['login']['id_sub'];
$penjualan = query_select("penjualan", ["where" => "id_sub = '$id_sub' AND id_majalah = '$id'"]);
$hasPurchased = !empty($penjualan);
?>

<?php require 'comp/navbar.php'; ?>

<section class="main mt-3 pt-5">
    <div class="container pt-4">
        <div class="card shadow-sm border-0 mt-4 mb-5">
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-md-6">
                        <center>
                            <img src="admin/assets/img/<?= $majalah['cover'] ?>" class="mb-4" alt="" style="width: 100%;">
                        </center>
                        <h5>Harga Digital : <?= rp($majalah['harga_digital']) ?><br>
                            Harga Cetak : <?= rp($majalah['harga_cetak']) ?>, <br>
                            Harga Cetak dan Digital : <?= rp($majalah['harga_keduanya']) ?></h5>
                        <p>Edisi : <?= $majalah['edisi'] ?></p>
                        <p><?= $majalah['desk'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <h5>Data Pembeli</h5>
                        </div>
                        <table border="0">
                            <tr>
                                <td>Nama</td>
                                <td><?= $_SESSION[KEY]['login']['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $_SESSION[KEY]['login']['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $_SESSION[KEY]['login']['email'] ?></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td><?= $_SESSION[KEY]['login']['no_telp'] ?></td>
                            </tr>
                        </table>

                        <?php if (!$hasPurchased): ?>
                            <a href="beli.php?id=<?= $id ?>&jenis=digital&id_sub=<?= $id_sub ?>" class="mt-3 btn btn-success">Majalah Digital</a>
                            <a href="beli.php?id=<?= $id ?>&jenis=cetak&id_sub=<?= $id_sub ?>" class="mt-3 btn btn-success">Majalah Cetak Fisik</a>
                            <a href="beli.php?id=<?= $id ?>&jenis=keduanya&id_sub=<?= $id_sub ?>" class="mt-3 btn btn-success">Majalah Cetak Dan Digital</a>
                        <?php else: ?>
                            <p class="text-success mt-3">Anda sudah membeli majalah ini.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'comp/footer.php'; ?>
