<?php
$current_url = $_SERVER['REQUEST_URI'];

if ($current_url === '/webmajalah/index.php') {
    $show_section = true; 
} else {
    $show_section = false; 
}
?>

<header id="home" style="">
  <nav class="navbar navbar-expand-md navbar-light default">
    <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/images/logo-dark.svg" alt="logo">
      </a><button class="navbar-toggler rounded" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
          <li class="nav-item px-1"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="berita.php">News</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="schedules.php">Jadwal Pengiriman</a></li>
          <li class="nav-item px-1"><a class="nav-link" href="majalah.php">Majalah</a></li>

          <?php if (isset($_SESSION[KEY]['login']) && $_SESSION[KEY]['login']): ?>
          <li class="nav-item">
            <a class="btn btn btn-success" href="logout.php">Logout<i class="ti ti-external-link"></i></a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="btn btn btn-success" href="login.php">Login<i class="ti ti-external-link"></i></a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>

  <?php if ($show_section): ?>
  <br><br>
  <div class="container"><br>
    <div class="row justify-content-center">
      <div class="col-md-10 text-center">
        <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.2s">Discover the World with Our Magazine <span
            class="hero-text-gradient">Majalah Online</span> </h1>
        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.3s">
          <div class="col-md-8">
            <p class="text-muted f-16 mb-0">Nikmati Beragam Konten Eksklusif dari Berbagai Topik Menarik. Dari Tren
              Terbaru, Inspirasi Gaya Hidup, Teknologi Terkini, Hingga Wisata Menakjubkan. Bergabunglah dengan Ribuan
              Pembaca Setia Kami dan Temukan Wawasan Baru di Setiap Edisi.</p>
          </div>
        </div>
        <div class="my-4 my-sm-5 wow fadeInUp" data-wow-delay="0.4s">
          <a href="majalah.php" class="btn btn-outline-secondary me-2">Lihat Semua Majalah</a>
          <?php if (isset($_SESSION[KEY]["login"])): ?>
          <a href="majalah.php" class="btn btn-primary">Dashboard</a>
          <?php else: ?>
          <a href="login.php" class="btn btn-primary">Subscribe</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>

  <?php endif; ?>
</header