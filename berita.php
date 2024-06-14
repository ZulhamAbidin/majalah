<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

$berita = query_select('berita', ["orderby" => "id_berita DESC"]);

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
    <h2 class="display-4 text-white mb-3 ">Berita</h2>
  </div>
</div>

<!-- content -->
<section class="main mt-4 pt-4" id="produk " style="min-height: 88vh;">
  <div class="container">
    <h5 class="mb-4 pb-3">Berita Terbaru</h5>
    <div class="row">

      <?php if ($berita) : ?>

        <?php $i = 0 ?>
        <?php foreach ($berita as $item) : ?>
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

    </div>

  </div>

</section>
<!-- endContent -->

<?php include 'Comp/footer.php'; ?>