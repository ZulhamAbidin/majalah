<?php $halaman = "Home" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

$berita = query_select('berita', ["orderby" => "id_berita DESC", "limit" => "3"]);
$majalah = query_select('majalah', ["orderby" => "id_majalah DESC", "limit" => "3"]);
?>


<?php require 'Comp/navbar.php'; ?>
<?php require 'Comp/jumbotron.php' ?>

<section>
  <div class="container title">
    <div class="row justify-content-center text-center wow fadeInUp animated" data-wow-delay="0.2s"
      style="visibility: visible; animation-delay: 0.2s;">
      <div class="col-md-8 col-xl-6">
        <h2 class="mb-3">Berita Terbaru</h2>
        <p class="mb-0">Temukan informasi terbaru dan terpercaya dari berbagai bidang di setiap update kami. Dari berita
          politik hingga teknologi, gaya hidup hingga kesehatan, kami hadir untuk memastikan Anda tetap terhubung dengan
          dunia.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row align-items-center justify-content-center">
      <?php if ($berita) : ?>

      <?php $i = 0 ?>
      <?php foreach ($berita as $item) : ?>
      <?php
      if ($i > 3) {
        break;
      }
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body mt-2">
            <h5 class="mb-3 text-center"><?= $item['judul'] ?></h5>
            <p class="text-muted">
            </p><img class="pt-2" alt="image" src="admin/assets/img/<?= $item['gambar'] ?>" width="100%">
            <a class="btn btn-primary mt-3" href="detail.php?id=<?= $item['id_berita'] ?>">Lihat Detail Berita <i
                class="ti ti-external-link"></i></a>
          </div>
        </div>
      </div>
      <?php $i++ ?>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <div class="my-4 my-sm-5 wow fadeInUp" data-wow-delay="0.4s">
          <a href="berita.php" class="btn btn-primary me-2">Lihat Semua Berita</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-4">
    <div class="row justify-content-center text-center wow fadeInUp animated" data-wow-delay="0.2s"
      style="visibility: visible; animation-delay: 0.2s;">
      <div class="col-md-8 col-xl-6">
        <h2 class="mb-3">Majalah Terbaru</h2>
        <p class="mb-0">Temukan informasi Majalah dan terpercaya dari berbagai bidang di setiap update kami. Dari
          Majalah politik hingga teknologi, gaya hidup hingga kesehatan, kami hadir untuk memastikan Anda tetap
          terhubung dengan dunia.</p>
      </div>
    </div>
  </div>

  <div class="container pt-4">
    <div class="row">

      <?php if ($majalah) : ?>
      <?php $i = 0 ?>
      <?php foreach ($majalah as $item) : ?>
      <?php
      if ($i > 3) {
        break;
      }
      ?>
      <div class="col-sm-6 col-xl-4">
        <div class="card product-card">
          <div class="card-img-top">
            <a href="majalah-detail.php?id=<?= $item["id_majalah"] ?>">
              <img src="admin/assets/img/<?= $item['cover'] ?>" alt="image" width="100%" class="img-prod img-fluid">
            </a>
          </div>
          <div class="card-body">

            <a href="majalah-detail.php?id=<?= $item["id_majalah"] ?>">
              <p class="prod-content mb-0 text-muted text-center"><?= $item['judul'] ?></p>
            </a>

            <div class="d-flex align-items-center justify-content-between mt-2">
              <a class="btn btn-primary mt-3 item-center" href="majalah-detail.php?id=<?= $item["id_majalah"] ?>">Lihat Detail
                Majalah <i class="ti ti-external-link"></i>
              </a>
            </div>

          </div>
        </div>
      </div>
      <?php $i++ ?>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <div class="my-sm-5 wow fadeInUp" data-wow-delay="0.4s">
          <a href="majalah.php" class="btn btn-primary me-2">Lihat Semua Majalah</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container title mt-4 pt-4">
    <div class="row justify-content-center text-center wow fadeInUp animated" data-wow-delay="0.2s"
      style="visibility: visible; animation-delay: 0.2s;">
      <div class="col-md-8 col-xl-6">
        <h2 class="mb-3"> Shipping & Logistic Talks</h2>
        <p class="mb-0">Pembicaraan ini akan membahas berbagai aspek penting terkait dengan pengiriman dan logistik
          global.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/uJ4meNw4gyI?si=L4ybdSkErrhctTcH"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
  </div>



<?php include 'Comp/footer.php'; ?>