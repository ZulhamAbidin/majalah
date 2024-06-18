<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("majalah", ["where" => "id_majalah = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("majalah.php");
  die;
}

$hal = "Majalah";
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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Majalah</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Detail</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="page-header-title">
                <h2 class="mb-0">Majalah Detail</h2>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">

        <div class="col-sm-12">
          <div class="card">

            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-12">
                  <img src="assets/img/<?= $item['cover'] ?>" class="img-fluid" alt="Cover Majalah"
                    style="max-width: 100%;">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4"><strong>Judul</strong></div>
                <div class="col-md-8">: <?= $item["judul"] ?></div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4"><strong>Edisi</strong></div>
                <div class="col-md-8">: <?= $item["edisi"] ?></div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4"><strong>Harga Digital</strong></div>
                <div class="col-md-8">: <?= rp($item["harga_digital"]) ?></div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4"><strong>Harga Cetak</strong></div>
                <div class="col-md-8">: <?= rp($item["harga_cetak"]) ?></div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4"><strong>Harga Cetak dan Digital</strong></div>
                <div class="col-md-8">: <?= rp($item["harga_keduanya"]) ?></div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4"><strong>Deskripsi</strong></div>
                <div class="col-md-8">: <?= $item["desk"] ?></div>
              </div>
              <div class="row mb-3">

                <a class="btn btn-primary" href="majalah-lihat.php?id=<?= $item["id_majalah"] ?>">Lihat Majalah</a>
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