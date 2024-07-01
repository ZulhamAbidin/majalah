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

      <style>
    .active {
        position: relative; /* Required for the pseudo-element to be positioned relative to the parent */
        color: #3C6DD9 !important;
    }
    .active::after {
        content: ''; 
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 50%;
        transform: translateX(-50%);
        border-bottom: 1px solid #3C6DD9 !important;
    }
</style>


    
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
          <li class="nav-item px-1"><a class="nav-link <?= $halaman == "Home" ? "active" : "" ?>" href="index.php">Beranda</a></li>
          <li class="nav-item px-1"><a class="nav-link <?= $halaman == "About" ? "active" : "" ?>" href="about.php">About</a></li>
          <li class="nav-item px-1"><a class="nav-link <?= $halaman == "Berita" ? "active" : "" ?>" href="berita.php">News</a></li>
          <li class="nav-item px-1"><a class="nav-link <?= $halaman == "Schedules" ? "active" : "" ?>" href="schedules.php">Jadwal Pengiriman</a></li>
          <li class="nav-item px-1"><a class="nav-link <?= $halaman == "Majalah" ? "active" : "" ?>" href="majalah.php">Majalah</a></li>

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

  <style>
    @media (max-width: 724px) {
        .text-white.f-16.mb-0 {
            padding: 10px; /* Sesuaikan dengan nilai padding yang Anda inginkan */
        }
    }
</style>
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