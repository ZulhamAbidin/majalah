<?php
$current_url = $_SERVER['REQUEST_URI'];

if ($current_url === '/webmajalah/index.php') {
    $show_section_landing = true; 
} else {
    $show_section_landing = false; 
}

if ($current_url === '/webmajalah/schedules.php') {
  $show_section_pengiriman = true; 
} else {
  $show_section_pengiriman = false; 
}

?>

<header id="home" style="">
  <nav class="navbar navbar-expand-md navbar-light default">
    <div class="container">
      <a class="navbar-brand text-primary" href="index.php">
        <img src="assets/images/logo-dark.png" width="40%" alt="logo">
      </a>
      <button class="navbar-toggler rounded" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
          <li class="nav-item px-1"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="berita.php">News</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="schedules.php">Jadwal Pengiriman</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="majalah.php">Majalah</a></li>

          <?php if (isset($_SESSION[KEY]['login']) && $_SESSION[KEY]['login']): ?>
          <li class="nav-item">
            <a class="btn btn btn-primary" href="logout.php">Logout<i class="ti ti-external-link"></i></a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="btn btn btn-primary" href="login.php">Login<i class="ti ti-external-link"></i></a>
          </li>
          <?php endif ?>
        </ul>
      </div>
      
    </div>
  </nav>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var navToggler = document.querySelector(".navbar-toggler");
      var navbarCollapse = document.querySelector(".navbar-collapse");

      navToggler.addEventListener("click", function () {
        navbarCollapse.classList.toggle("show");
      });
    });
  </script>

  
<?php if ($show_section_pengiriman): ?>
  <br><br>
                                                  <!-- silahkan ganti menjadi "buku.jpg", "pelabuhan.jpg", "container.jpg"   -->
  <div class="mt-2" style="background-image: url('assets/images/landing/pelabuhan.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">  
  <div class="row justify-content-center">
      <div class="col-md-10 text-center">
        <h1 class="mb-4 wow fadeInUp text-white mt-5 pt-5" data-wow-delay="0.2s">Jangkauan Cukup Luas 
        <br>Dengan Majalah Kami <br>
        <span class="text-white">Majalah Online</span> </h1>
        <div class="row justify-content-center text-white wow fadeInUp" data-wow-delay="0.3s">
          <div class="col-md-8">
            <p class="text-white f-16 mb-0">Mendukung Pengiriman ke Seluruh Dunia, Kami Hadir dengan Beragam Konten Eksklusif. Dari Tren Terbaru, Inspirasi Gaya Hidup, Teknologi Terkini, hingga Destinasi Wisata Menakjubkan. Temukan Perspektif Baru dan Berlanggananlah Sekarang untuk Mengikuti Jejak Majalah Kami dalam Menghubungkan Anda dengan Dunia.</p>
          </div>
        </div>
        <div class="my-4 my-sm-5 wow fadeInUp" data-wow-delay="0.4s">
          <a href="majalah.php" class="btn btn-outline-light me-2">Lihat Semua Majalah</a>
          <?php if (isset($_SESSION[KEY]["login"])): ?>
          <a href="majalah-anda.php" class="btn btn-primary">Dashboard</a>
          <?php else: ?>
          <a href="login.php" class="btn btn-primary">Subscribe</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>

  <?php endif; ?>

  <?php if ($show_section_landing): ?>
  <br><br>
                                                  <!-- silahkan ganti menjadi "buku.jpg", "pelabuhan.jpg", "container.jpg"   -->
  <div class="mt-2" style="background-image: url('assets/images/landing/buku.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">  
  <div class="row justify-content-center">
      <div class="col-md-10 text-center">
        <h1 class="mb-4 wow fadeInUp text-white mt-5 pt-5" data-wow-delay="0.2s">Jelajahi Dunia 
        <br>Dengan Majalah Kami <br>
        <span class="text-white">Majalah Online</span> </h1>
        <div class="row justify-content-center text-white wow fadeInUp" data-wow-delay="0.3s">
          <div class="col-md-8">
            <p class="text-white f-16 mb-0">Nikmati Beragam Konten Eksklusif dari Berbagai Topik Menarik. Dari Tren
              Terbaru, Inspirasi Gaya Hidup, Teknologi Terkini, Hingga Wisata Menakjubkan. Bergabunglah dengan Ribuan
              Pembaca Setia Kami dan Temukan Wawasan Baru di Setiap Edisi.</p>
          </div>
        </div>
        <div class="my-4 my-sm-5 wow fadeInUp" data-wow-delay="0.4s">
          <a href="majalah.php" class="btn btn-outline-light me-2">Lihat Semua Majalah</a>
          <?php if (isset($_SESSION[KEY]["login"])): ?>
          <a href="majalah-anda.php" class="btn btn-primary">Dashboard</a>
          <?php else: ?>
          <a href="login.php" class="btn btn-primary">Subscribe</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>

  <?php endif; ?>
  </header>