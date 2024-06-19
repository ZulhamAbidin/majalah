<?php
function formatTanggal($tanggal)
{
    $timestamp = strtotime($tanggal);
    $formatted_date = date('d-m-Y', $timestamp);
    $formatted_time = date('H:i:s', $timestamp);

    return "Tanggal Diunggah {$formatted_date} Pukul {$formatted_time}";
}
?>
<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");

$sql = "
SELECT berita.*, kategori.nama AS nama_kategori 
FROM berita 
JOIN kategori ON berita.id_kategori = kategori.id_kategori 
WHERE berita.id_berita = '$id'
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $item = $result->fetch_assoc();
} else {
    direct("berita.php");
    die;
}

$hal = "Berita";
?>


<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
  data-pc-theme="light">

  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <?php partials("aside.php") ?>
  <?php partials("nav.php") ?>

  <div class="pc-container">
    <div class="pc-content">

      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Berita</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Detail</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="page-header-title">
                <h2 class="mb-0">Berita Detail</h2>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="sticky-md-top product-sticky">
                      <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider"
                        data-bs-ride="carousel">
                        <div class="carousel-inner bg-light rounded position-relative">

                          <div class=""><img src="assets/img/<?= $item['gambar'] ?>" class="" alt="Product images"
                              width="100%"></div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6"><span class="badge bg-success f-14">Detail Berita </span>
                    <h1 class="my-3 text-center"><?= $item["judul"] ?></h1>
                    <h5 class="mt-4 mb-3 text-center">Penulis <?= $item["penulis"] ?> </h5>
                    <p><?= $item["isi"] ?></p>
                    <?= formatTanggal($item["tanggal_publish"]) ?>
                  </div>

                </div>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php partials("footer.php") ?>
  <?php partials("end.php") ?>
</body>

</html>
