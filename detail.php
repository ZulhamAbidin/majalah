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

<section class="main mt-3 pt-5">

  <div class="container pt-4">
    <div class="card shadow-sm border-0 mt-4 mb-5">
      <div class="card-body p-5">
        <h2 class="mb-4 mt-3"><?= $berita["judul"] ?></h2>

        <center>
          <img src="admin/assets/img/<?= $berita['gambar'] ?>" class=" mb-4" alt="" style="width: 100%;">
        </center>

        <?= $berita["isi"] ?>


      </div>
    </div>

  </div>
</section>



<?php include 'Comp/footer.php'; ?>