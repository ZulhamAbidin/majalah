<?php
session_start();
$halaman = "Majalah Online";
require 'Comp/header.php';
require 'admin/function/init.php';

if (!isset($_SESSION[KEY]["login"])) {
    setError("Silahkan Login Terlebih Dahulu!");
    direct("login.php");
}

$id_sub = $_SESSION[KEY]["login"]['id_sub'];
$majalah = query_select('penjualan', [
    "join" => "majalah ON majalah.id_majalah = penjualan.id_majalah",
    "where" => "id_sub = '$id_sub'",
    "orderby" => "penjualan.id_p DESC",
]);

?>
<?php require 'Comp/navbar.php'; ?>
<div class="col-12">
    <div class="card welcome-banner bg-blue-800">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="p-4">
                        <h2 class="text-white"> Majalah Saya</h2>
                        <p class="text-white">
                            Produk kami digunakan di berbagai bidang, seperti fashion, teknologi,
                            kesehatan, kuliner, bisnis, wisata, dan pendidikan. Kami berkomitmen untuk menyajikan
                            konten yang menarik dan informatif kepada pembaca kami. Dengan fokus pada inovasi
                            dan kualitas, kami terus mengembangkan solusi yang relevan untuk kebutuhan industri
                            dan membawa pengalaman yang berharga bagi setiap pengguna produk kami.
                        </p>
                        <a href="majalah.php" class="btn btn-outline-light">Lihat Semua Majalah</a>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="img-welcome-banner">
                        <img src="assets/images/widget/welcome-banner.png" alt="Welcome Banner"
                            class="img-fluid mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="main mt-4 pt-4" id="produk" style="min-height: 88vh;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3">
            <h3 class="">Majalah Yang Anda Beli</h3>
        </div>

        <?php alert(); ?>

        <div class="row">
        <?php if ($majalah) : ?>
            <?php foreach ($majalah as $item) : ?>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="sticky-md-top product-sticky">
                            <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                            <div class="carousel-inner bg-light rounded position-relative">
                                
                                <div class=""><img src="admin/assets/img/<?= $berita['gambar'] ?>"
                                    class="" alt="Product images" width="100%"></div>
                            </div>
                            
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6"><span class="badge bg-success f-14">Berita </span>
                        <h5 class="my-3"><?= $berita["judul"] ?></h5>
                        <h5 class="mt-4 mb-3">Penulis <?= $berita["penulis"] ?>  <?= formatTanggal($berita["tanggal_publish"]) ?></h5>
                        <p><?= $berita["isi"] ?></p>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada majalah yang ditemukan.</p>
            <?php endif; ?>

         </div>

        <div class="row">
            <?php if ($majalah) : ?>
                <?php foreach ($majalah as $item) : ?>
                    <div class="col-12 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div style="width:100%; height: 200px; background-size: cover; background-position: center; background-image: url(admin/assets/img/<?= $item['cover'] ?>);">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="card-title text-dark fw-bold"><?= $item['judul'] ?></h6>
                                        <?php if ($item["status_pembayaran"] == 0) : ?>
                                            <p class="text-danger">Menunggu Pembayaran</p>
                                        <?php elseif ($item["status_pembayaran"] == 2) : ?>
                                            <p class="text-danger">Menunggu Konfirmasi Admin</p>
                                        <?php elseif ($item["status_pembayaran"] == 3) : ?>
                                            <p class="text-danger">Pembayaran Ditolak<br>Harap Upload Ulang Bukti Pembayaran</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if ($item["status_pembayaran"] == 1) : ?>
                                            <a href="baca.php?id=<?= $item["id_majalah"] ?>" class="btn btn-warning text-white">Baca</a>
                                        <?php elseif ($item["status_pembayaran"] == 0 || $item["status_pembayaran"] == 3) : ?>
                                            <a href="pembayaran.php?id=<?= $item["id_p"] ?>" class="btn btn-danger text-white">Pembayaran</a>
                                        <?php endif; ?>
                                        <a href="invoice.php?id=<?= $item['id_p'] ?>" class="btn btn-primary">Buka Invoice</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada majalah yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'Comp/footer.php'; ?>
