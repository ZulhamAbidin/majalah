<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

if (!isset($_SESSION[KEY]["login"])) {

  setError("Silahkan Login Terlebih Dahulu!");
  direct("login.php");
  
}

$id_sub = $_SESSION[KEY]["login"][0]["id_sub"];
$majalah = query_select('penjualan', 
  [
    "join" => "majalah ON majalah.id_majalah = penjualan.id_majalah",
    "where" => "id_sub = '$id_sub'",
    "orderby" => "penjualan.id_p DESC",
  ]
);

?>

<style>
  .shadow-sm {
    box-shadow: 0px 3px 5px rgba(0, 0, 0, .15);
  }

  footer {
    text-align: center;
  }

  @media (max-width: 576px) {
    .card-title {
      font-size: 14px;
    }

    .card-text {
      font-size: 12px;
    }

    footer p {
      font-size: 10px;
    }
  }
</style>

<?php require 'Comp/navbar.php'; ?>

<style>
  .jumbotron {
    height: 200px;
    background: url('assets/img/bg.jpg');
    background-size: cover;
    background-position: 0px -300px;
  }

  .jumbotron h2,
  .jumbotron h5 {
    text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.35);
  }
</style>
<div class="jumbotron border mt-5">
  <div class="container pt-5 text-center">
    <h2 class="display-4 text-white mb-3 ">Majalah Anda</h2>


  </div>
</div>

<section class="main mt-4 pt-4" id="produk " style="min-height: 88vh;">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3">
      <h5 class="">Majalah Yang Anda Beli</h5>
      <a href="logout.php" class="btn btn-danger text-white">Logout</a>
    </div>

    <?php alert(); ?>

    <div class="row">

      <?php if ($majalah) : ?>

        <?php $i = 0 ?>
        <?php foreach ($majalah as $item) : ?>
          <div class="col-12 mb-4">
              
            <div class="card shadow border-0">

              <div class="card-body " style="">

              <div class="row">
                <div class="col-4">

                  <div style="width:100%; height: 200px; background-size: cover; background-position: center; background-image: url(admin/assets/img/<?= $item['cover'] ?>);">
                    
                  </div>
                  
                </div>

                <div class="col-md-6">
                  <h6 class="card-title  text-dark fw-bold"><?= $item['judul'] ?></h6>

                  <?php if ($item["status_pembayaran"] == 0): ?>
                    <p class="text-danger">Menunggu Pembayaran</p>
                  <?php endif; ?>
                  <?php if ($item["status_pembayaran"] == 2) : ?>
                    <p class="text-danger">Menunggu Konfirmasi Admin</p>
                  <?php endif; ?>

                  <?php if ($item["status_pembayaran"] == 3) : ?>
                    <p class="text-danger">Pembayaran Ditolak<br>Harap Upload Ulang Bukti Pembayaran</p>
                  <?php endif; ?>
                </div>


                <div class="col-md-2">
                  <?php if ($item["status_pembayaran"] == 1): ?>

                    <a href="baca.php?id=<?= $item["id_majalah"] ?>" class="btn btn-warning text-white">Baca</a>

                  <?php endif ?>
                  <?php if($item["status_pembayaran"] == 0 || $item["status_pembayaran"] == 3): ?>

                    <a href="pembayaran.php?id=<?= $item["id_p"] ?>" class="btn btn-danger text-white">Pembayaran</a>

                  <?php endif ?>

                  <a href="invoice.php?id=<?= $item['id_p'] ?>" class="btn btn-primary">Buka Invoice</a>

                </div>
              </div>
              </div>
            </div>

          </div>
          <?php $i++ ?>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>

  </div>

</section>
<!-- endContent -->

<?php include 'Comp/footer.php'; ?>