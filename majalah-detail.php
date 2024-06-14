<?php
$halaman = "Detail Produk";
?>
<?php require 'comp/header.php'; ?>

<?php
require 'admin/function/init.php';

$id = get("id");

$majalah = query_select("majalah", ["where" => "id_majalah = '$id'"])[0];


?>

<?php require 'comp/navbar.php'; ?>

<section class="main mt-3 pt-5">

  <div class="container pt-4">
    <div class="card shadow-sm border-0 mt-4 mb-5">
      <div class="card-body p-5">
        <h2 class="mb-4 mt-3">Majalah <?= $majalah["judul"] ?></h2>

        <center>
          <img src="admin/assets/img/<?= $majalah['cover'] ?>" class=" mb-4" alt="" style="width: 100%;">
        </center>

        <p>Edisi : <?= $majalah["edisi"] ?></p>
        <p><?= $majalah["desk"] ?></p>

        <a href="majalah-beli.php?id=<?= $id ?>" class="btn btn-sm btn-warning text-white">Beli Majalah</a>
        


      </div>
    </div>

  </div>
</section>



<?php include 'Comp/footer.php'; ?>