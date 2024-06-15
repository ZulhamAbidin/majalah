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
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <?php partials("aside.php") ?>
  
  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <?php partials("nav.php") ?>  
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card " style="min-height: 70vh">
            <div class="card-body">

              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Detail Berita</h6>
                <a href="berita.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
              </div>

              <?php alert(); ?>

              <img src="assets/img/<?= htmlspecialchars($item["gambar"]) ?>" class="img-fluid mb-4" alt="">
              <div><?= $item["judul"] ?></div>
              <div><?= $item["penulis"] ?></div>
              <div><?= $item["tanggal_publish"] ?></div>
              <div><?= $item["nama_kategori"] ?></div>
              <div><?= $item["isi"] ?></div>
              
            </div>
          </div>
        </div>
        
      </div>

      <?php partials("footer.php") ?>  

    </div>

  </main>
  
  <?php partials("end.php") ?>  
</body>

</html>
