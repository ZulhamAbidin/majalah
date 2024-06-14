<?php
$halaman = "Detail Produk";
?>
<?php require 'comp/header.php'; ?>

<?php
require 'admin/function/init.php';

if (!isset($_SESSION[KEY]["login"])) {

  setError("Silahkan Login Terlebih Dahulu!");
  direct("login.php");
  
}

$id = get("id");

$majalah = query_select("majalah", ["where" => "id_majalah = '$id'"])[0];


?>

<?php require 'comp/navbar.php'; ?>

<section class="main mt-3 pt-5">

  <div class="container pt-4">
    <div class="card shadow-sm border-0 mt-4 mb-5">
      <div class="card-body p-5">
        
        <center>
          <h4 class="mb-3"><?= $majalah["judul"] ?></h4>
        </center>

        <iframe style="width: 100%; height: 450px;" src="admin/assets/img/<?= $majalah["isi"] ?>" frameborder="0"></iframe>

        <a href="majalah-anda.php" class="btn btn-secondary">Kembali</a>

      </div>
    </div>

  </div>
</section>



<?php include 'Comp/footer.php'; ?>