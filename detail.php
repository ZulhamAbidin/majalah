<?php
$halaman = "Detail Produk";
require "phpqrcode/qrlib.php";
?>
<?php require 'comp/header.php'; ?>

<?php
require 'admin/function/init.php';
$id = get("id");
// Modified query to join berita and kategori tables
$query = "
    SELECT berita.*, kategori.nama as nama_kategori
    FROM berita
    LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori
    WHERE berita.id_berita = '$id'
";
$berita = query_select_raw($query)[0];
?>

<?php require 'comp/navbar.php'; ?>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="sticky-md-top product-sticky">
              <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                <div class="carousel-inner bg-light rounded position-relative">
                  <div class=""><img src="admin/assets/img/<?= $berita['gambar'] ?>" class="" alt="Product images"
                      width="100%"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6"><span class="badge bg-success f-14"><?= $berita["nama_kategori"] ?> </span>
            <h1 class="my-3 text-center"><?= $berita["judul"] ?></h1>
            <h5 class="mt-4 mb-3 text-center">Penulis <?= $berita["penulis"] ?> </h5>
            <p><?= $berita["isi"] ?></p>
            <p class="mt-3">Kategori: <?= $berita["nama_kategori"] ?></p> <!-- Display category name -->
            <?= formatTanggal($berita["tanggal_publish"]) ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<?php
function formatTanggal($tanggal)
{
    $timestamp = strtotime($tanggal);
    $formatted_date = date('d-m-Y', $timestamp);
    $formatted_time = date('H:i:s', $timestamp);

    return "Tanggal Diunggah {$formatted_date} Pukul {$formatted_time}";
}
?>

<?php include 'Comp/footer.php'; ?>
