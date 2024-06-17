<?php
$halaman = "Detail Produk";
?>
<?php require 'comp/header.php'; ?>

<?php
require 'admin/function/init.php';

$isLoggedIn = isset($_SESSION[KEY]['login']['id_sub']);
$id_sub = $isLoggedIn ? $_SESSION[KEY]['login']['id_sub'] : null;

$id = get("id");
$majalah = query_select("majalah", ["where" => "id_majalah = '$id'"])[0];

$hasPurchased = false;
if ($isLoggedIn) {
    $penjualan = query_select("penjualan", ["where" => "id_sub = '$id_sub' AND id_majalah = '$id'"]);
    if (!empty($penjualan)) {
        $hasPurchased = true;
    }
}
?>

<?php require 'comp/navbar.php'; ?>
<div class="container">
<div class="card shadow-sm border-0 mt-4 mb-5">
      <div class="card-body p-5">
        <h2 class="mb-4 mt-3">Majalah <?= $majalah["judul"] ?></h2>
        <center>
          <img src="admin/assets/img/<?= $majalah['cover'] ?>" class="mb-4" alt="" style="width: 100%;">
        </center>
        <p>Edisi : <?= $majalah["edisi"] ?></p>
        <p><?= $majalah["desk"] ?></p>
        
        <?php if ($isLoggedIn && !$hasPurchased): ?>
          <a href="majalah-beli.php?id=<?= $id ?>" class="btn btn-sm btn-warning text-white">Beli Majalah</a>
        <?php elseif (!$isLoggedIn): ?>
          <a href="login.php" class="btn btn-sm btn-warning text-white">Login untuk Membeli</a>
        <?php else: ?>
          <a href="majalah-anda.php" class=" btn btn-sm btn-primary ">Anda sudah membeli majalah ini, Lihat Majalah Saya</a>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php include 'comp/footer.php'; ?>
