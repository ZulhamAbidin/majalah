<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

$berita = query_select('berita', ["orderby" => "id_berita DESC", "limit" => "3"]);
$majalah = query_select('majalah', ["orderby" => "id_majalah DESC", "limit" => "3"]);
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
<!-- Navbar -->
<?php require 'Comp/navbar.php'; ?>
<!-- endnavbar -->

<!-- Jumbotron -->
<?php require 'Comp/jumbotron.php' ?>
<!-- End Jumbotron -->

<!-- content -->
<section class="main mt-4 pt-4" id="produk " style="min-height: 88vh;">
  <div class="container">
    <h5 class="mb-4 pb-3">Berita Terbaru</h5>
    <div class="row">

      <?php if ($berita) : ?>

        <?php $i = 0 ?>
        <?php foreach ($berita as $item) : ?>
          <?php
          if ($i > 3) {
            break;
          }
          ?>
          <div class="col-md-4 col-6 mb-4">
            <a class="text-decoration-none" href="detail.php?id=<?= $item['id_berita'] ?>">
              
            <div class="card shadow border-0">
              <div style="width:100%; height: 200px; background-size: cover; background-position: center; background-image: url(admin/assets/img/<?= $item['gambar'] ?>);">
                
              </div>
              <div class="card-body" style="height: 150px">
                <h6 class="card-title  text-dark fw-bold"><?= $item['judul'] ?></h6>
              </div>
            </div>

            </a>

          </div>
          <?php $i++ ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <div class="col-12 text-center mt-5">
        <a href="berita.php" style="text-decoration: none;">Lihat Semua Berita</a>
      </div>

    </div>

  </div>

</section>
<!-- endContent -->

<!-- content -->
<section class="main mt-4 pt-4" id="produk " style="min-height: 88vh;">
  <div class="container">
    <h5 class="mb-4 pb-3">Majalah Terbaru</h5>
    <div class="row">

      <?php if ($majalah) : ?>

        <?php $i = 0 ?>
        <?php foreach ($majalah as $item) : ?>
          <?php
          if ($i > 3) {
            break;
          }
          ?>
          <div class="col-md-4 col-6 mb-4">
            <a class="text-decoration-none" href="majalah-detail.php?id=<?= $item["id_majalah"] ?>">
              
            <div class="card shadow border-0">
              <div style="width:100%; height: 200px; background-size: cover; background-position: center; background-image: url(admin/assets/img/<?= $item['cover'] ?>);">
                
              </div>
              <div class="card-body" style="height: 150px">
                <h6 class="card-title  text-dark fw-bold"><?= $item['judul'] ?></h6>
              </div>
            </div>

            </a>

          </div>
          <?php $i++ ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <div class="col-12 text-center mt-5">
        <a href="majalah.php" style="text-decoration: none;">Lihat Semua Majalah</a>
      </div>

    </div>

  </div>

</section>
<!-- endContent -->

<?php include 'Comp/footer.php'; ?>