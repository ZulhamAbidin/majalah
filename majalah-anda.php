<?php
session_start();
$halaman = "Majalah";
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
                        <img src="assets/images/widget/welcome-banner.png" alt="Welcome Banner" class="img-fluid mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3">
        <h3 class="">Majalah</h3>
    </div>
</div>

<div class="container">
<?php alert(); ?>
</div>

<div class="container">
    <div class="row">
        <?php if ($majalah) : ?>
        <?php foreach ($majalah as $item) : ?>
        <div class="col-sm-6 col-xl-4">
            <div class="card product-card">
                <div class="ps-3 pt-3 text-center fw-semibold">
                    <?php if ($item["status_pembayaran"] == 0) : ?>
                        <p class="text-danger">Menunggu Pembayaran</p>
                    <?php elseif ($item["status_pembayaran"] == 2) : ?>
                        <p class="text-danger">Menunggu Konfirmasi Pembayaran Admin</p>
                    <?php elseif ($item["status_pembayaran"] == 3) : ?>
                        <p class="text-danger">Pembayaran Ditolak<br>Harap Upload Ulang Bukti Pembayaran</p>
                    <?php endif; ?>
                    <?php if ($item["status_pembayaran"] == 1) : ?>
                        <p class="text-success">Pembayaran Berhasil<br></p>
                    <?php endif; ?>
                </div>
                <div class="card-img-top">
                    <a href="#"><img src="admin/assets/img/<?= $item['cover'] ?>" width="100%" alt="image" class="img-prod img-fluid"></a>
                    <!-- button hapus -->
                    <a href="#" class="btn-prod-cart card-body position-absolute end-0 bottom-0 btn-delete" data-id="<?= $item['id_p'] ?>">
                        <div class="btn btn-danger"><svg class="pc-icon"><use xlink:href="#custom-bag"></use></svg></div>
                    </a>
                </div>
                <div class="card-body">
                    <a href="">
                        <p class="prod-content mb-0 text-muted text-center mb-4"><?= $item['judul'] ?></p>
                    </a>
                    <div class="d-flex align-items-center justify-content-center gap-1 mt-2">
                        <?php if ($item["status_pembayaran"] == 1) : ?>
                            <a href="baca.php?id=<?= $item["id_majalah"] ?>" class="btn btn-warning text-white">Baca</a>
                            <a href="invoice.php?id=<?= $item['id_p'] ?>" class="btn btn-primary">Buka Invoice</a>
                        <?php elseif ($item["status_pembayaran"] == 0 || $item["status_pembayaran"] == 3) : ?>
                            <a href="pembayaran.php?id=<?= $item["id_p"] ?>" class="btn btn-danger text-white">Pembayaran</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <p class="text-center">Ups... Anda Tidak Memiliki Majalah.</p>
        <a href="majalah.php" class="btn btn-primary">Lihat Semua Majalah</a>
        <?php endif; ?>
    </div>
</div>

<?php include 'Comp/footer.php'; ?>

<script src="assets/js/plugins/sweetalert2.all.min.js"></script>
<script src="assets/js/pages/ac-alert.js"></script>
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`delete-majalah.php?id=${id}`, {
                        method: 'GET',
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); // Debug respons dari server
                        if (data.trim() === 'success') {
                            Swal.fire(
                                'Dihapus!',
                                'Majalah berhasil dihapus.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Dihapus!',
                                'Majalah berhasil dihapus.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat menghapus majalah. Silakan coba lagi.',
                            'error'
                        );
                    });
                }
            });
        });
    });
});


</script>
