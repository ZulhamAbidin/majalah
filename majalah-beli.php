<?php
$halaman = 'Detail Produk';
require 'comp/header.php';
require 'admin/function/init.php';

if (!isset($_SESSION[KEY]['login'])) {
    setError('Silahkan Login Terlebih Dahulu!');
    direct('login.php');
}

$id = get('id');
$majalah = query_select('majalah', ['where' => "id_majalah = '$id'"])[0];

if (!$majalah) {
    setError('Majalah tidak ditemukan.');
    direct('index.php');
}
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
                            Harga Cetak dan Digital :  <?= rp($majalah['harga_keduanya']) ?></h5>
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
                                <td><?= $_SESSION[KEY]['login'][0]['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $_SESSION[KEY]['login'][0]['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $_SESSION[KEY]['login'][0]['email'] ?></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td><?= $_SESSION[KEY]['login'][0]['no_telp'] ?></td>
                            </tr>
                        </table>
                        <a href="beli.php?id=<?= $id ?>&jenis=digital&id_sub=<?= $_SESSION[KEY]['login'][0]['id_sub'] ?>" class="mt-3 btn btn-success">Majalah Digital</a>
                        <a href="beli.php?id=<?= $id ?>&jenis=cetak&id_sub=<?= $_SESSION[KEY]['login'][0]['id_sub'] ?>" class="mt-3 btn btn-success">Majalah Cetak Fisik</a>
                        <a href="beli.php?id=<?= $id ?>&jenis=keduanya&id_sub=<?= $_SESSION[KEY]['login'][0]['id_sub'] ?>" class="mt-3 btn btn-success">Majalah Cetak Dan Digital</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'comp/footer.php'; ?>