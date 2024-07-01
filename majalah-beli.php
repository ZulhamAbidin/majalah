<?php
$halaman = 'Majalah';
require 'comp/header.php';
require 'admin/function/init.php';

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

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="sticky-md-top product-sticky">
                        <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider"
                            data-bs-ride="carousel">
                            <div class="carousel-inner bg-light rounded position-relative">
                                <div class="card-body position-absolute bottom-0 end-0">
                                    <ul class="list-inline ms-auto mb-0 prod-likes">
                                        <li class="list-inline-item m-0"><a href="#"
                                                class="avtar avtar-xs text-white text-hover-primary"><i
                                                    class="ti ti-zoom-in f-18"></i></a></li>
                                        <li class="list-inline-item m-0"><a href="#"
                                                class="avtar avtar-xs text-white text-hover-primary"><i
                                                    class="ti ti-zoom-out f-18"></i></a></li>
                                        <li class="list-inline-item m-0"><a href="#"
                                                class="avtar avtar-xs text-white text-hover-primary"><i
                                                    class="ti ti-rotate-clockwise f-18"></i></a></li>
                                    </ul>
                                </div>
                                <div class="carousel-item carousel-item-next carousel-item-start"><img
                                        src="admin/assets/img/<?= $majalah['cover'] ?>" width="100%" class=""
                                        alt="Product images"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"><span class="badge bg-success f-12">Majalah Edisi :  <?= $majalah['edisi'] ?></span>
                    <h2 class="my-3"><?= $majalah['judul'] ?></h2>
                    <h5 class="mt-4 mb-3">Deskripsi</h5>
                    <h5 class="mt-4 mb-3 f-w-500 text-justify"><?= $majalah['desk'] ?></h5>

                    <div class="mb-3 row align-items-center">
                        <label class="col-form-label col-lg-3 col-sm-12">
                            <span class="d-block">Unit Pembelian</span>
                        </label>
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="row g-2">
                                <div class="col-auto">
                                    <input type="radio" class="btn-check" id="btnrdolite1" name="btn_radio2"
                                        data-price="<?= rp($majalah['harga_digital']) ?>" data-type="digital"
                                        checked="checked">
                                    <label class="btn btn-sm btn-light-primary" for="btnrdolite1">Digital</label>
                                </div>
                                <div class="col-auto">
                                    <input type="radio" class="btn-check" id="btnrdolite2" name="btn_radio2"
                                        data-price="<?= rp($majalah['harga_cetak']) ?>" data-type="cetak">
                                    <label class="btn btn-sm btn-light-primary" for="btnrdolite2">Cetak Hardcopy</label>
                                </div>
                                <div class="col-auto">
                                    <input type="radio" class="btn-check" id="btnrdolite3" name="btn_radio2"
                                        data-price="<?= rp($majalah['harga_keduanya']) ?>" data-type="keduanya">
                                    <label class="btn btn-sm btn-light-primary" for="btnrdolite3">Digital Dan
                                        Hardcopy</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-4"><b id="priceDisplay"><?= rp($majalah['harga_digital']) ?></b></h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary" id="buyNowButton">Tambahkan Ke Keranjang</button>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const radioButtons = document.querySelectorAll('input[name="btn_radio2"]');
                            const priceDisplay = document.getElementById('priceDisplay');
                            const buyNowButton = document.getElementById('buyNowButton');

                            function updatePrice() {
                                const selectedRadio = document.querySelector(
                                'input[name="btn_radio2"]:checked');
                                if (selectedRadio) {
                                    const newPrice = selectedRadio.getAttribute('data-price');
                                    priceDisplay.textContent = ' ' + newPrice;
                                }
                            }

                            function redirectToBuyPage() {
                                const selectedRadio = document.querySelector(
                                'input[name="btn_radio2"]:checked');
                                if (selectedRadio) {
                                    const type = selectedRadio.getAttribute('data-type');
                                    const url = `beli.php?id=<?= $id ?>&jenis=${type}&id_sub=<?= $id_sub ?>`;
                                    window.location.href = url;
                                }
                            }

                            radioButtons.forEach(radio => {
                                radio.addEventListener('change', updatePrice);
                            });

                            buyNowButton.addEventListener('click', redirectToBuyPage);

                            // Inisialisasi tampilan harga saat halaman dimuat
                            updatePrice();
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header pb-0">
            <ul class="nav nav-tabs profile-tabs mb-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" id="ecomtab-tab-1"
                        data-bs-toggle="tab" href="#ecomtab-1" role="tab" aria-controls="ecomtab-1"
                        aria-selected="true">Data Diri Anda</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-muted py-1">Nama :</td>
                                    <td class="py-1"><?= $_SESSION[KEY]['login']['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Alamat :</td>
                                    <td class="py-1"><?= $_SESSION[KEY]['login']['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">Email :</td>
                                    <td class="py-1"><?= $_SESSION[KEY]['login']['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted py-1">No Telp :</td>
                                    <td class="py-1"><?= $_SESSION[KEY]['login']['no_telp'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'comp/footer.php'; ?>