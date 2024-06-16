<?php
$halaman = "Detail Produk";
require "phpqrcode/qrlib.php";
?>
<?php require 'comp/header.php'; ?>

<?php
require 'admin/function/init.php';
$id = get("id");
$berita = query_select("berita", ["where" => "id_berita = '$id'"])[0];

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
  </div>


  <?php
// Fungsi untuk format tanggal ke "Tanggal Diunggah dd-mm-yyyy Pukul HH:ii:ss"
function formatTanggal($tanggal)
{
    // Ubah format tanggal ke timestamp
    $timestamp = strtotime($tanggal);
    
    // Format tanggal ke "Tanggal Diunggah dd-mm-yyyy Pukul HH:ii:ss"
    $formatted_date = date('d-m-Y', $timestamp);
    $formatted_time = date('H:i:s', $timestamp);

    return "Tanggal Diunggah {$formatted_date} Pukul {$formatted_time}";
}
?>

<?php include 'Comp/footer.php'; ?>