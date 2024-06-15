<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';


$berita = query_select('berita', ["orderby" => "id_berita DESC"]);

?>

<?php require 'Comp/navbar.php'; ?>
<div class="col-12">
    <div class="card welcome-banner bg-blue-800">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="p-4">
                        <h2 class="text-white">Berita</h2>
                        <p class="text-white">
                        Menyajikan berita terkini dari berbagai bidang seperti politik, ekonomi, teknologi,
                            kesehatan, dan budaya. Kami berkomitmen untuk memberikan informasi yang akurat, mendalam,
                            dan terpercaya kepada pembaca kami. Dari liputan langsung hingga analisis mendalam,
                            kami memberikan pandangan yang komprehensif tentang peristiwa global dan lokal yang
                            mempengaruhi masyarakat.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="img-welcome-banner">
                        <img src="assets/images/widget/welcome-banner.png" alt="Welcome Banner"
                            class="img-fluid mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <div class="container title mt-5">
    <div class="row justify-content-center text-center wow fadeInUp animated" data-wow-delay="0.2s"
      style="visibility: visible; animation-delay: 0.2s;">
      <div class="col-md-8 col-xl-6">
        <h2 class="mb-3">Berita Terbaru</h2>
        <p class="mb-0">Temukan informasi terbaru dan terpercaya dari berbagai bidang di setiap update kami. Dari berita politik hingga teknologi, gaya hidup hingga kesehatan, kami hadir untuk memastikan Anda tetap terhubung dengan dunia.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row align-items-center justify-content-center">
    <?php if ($berita) : ?>

    <?php $i = 0 ?>
    <?php foreach ($berita as $item) : ?>
      <?php
      if ($i > 100) {
        break;
      }
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-body mt-2">
            <h5 class="mb-3"><?= $item['judul'] ?></h5>
            <p class="text-muted"><p class="mb-0"><?= substr($item['isi'], 0, 150) ?></p></p><img class="pt-2" alt="image" src="admin/assets/img/<?= $item['gambar'] ?>" width="100%">
            <a class="btn btn-light-dark mt-3"
              href="detail.php?id=<?= $item['id_berita'] ?>">Lihat Detail Berita <i class="ti ti-external-link"></i></a>
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
              <a href="berita.php" class="btn btn-outline-secondary me-2">Lihat Semua Berita</a> 
            </div>
        </div>
      </div>
  </div>

<?php include 'Comp/footer.php'; ?>