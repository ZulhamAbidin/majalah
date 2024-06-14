<nav class="navbar navbar-expand-lg navbar-dark shadow bg-dark fixed-top p-3">
  <div class="container">
    <!-- <a class="navbar-brand" href="#">SEPATU WARRIOR</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto my-auto">
        <a class="nav-item nav-link" href="index.php">Beranda</a>
        <a class="nav-item nav-link" href="about.php">About</a>
        <a class="nav-item nav-link" href="berita.php">News</a>

        <a href="index.php" class="text-white ms-3 me-3" style="transform: translateY(3px); text-decoration: none">
          <h4 class="fw-bolder " style="text-transform: uppercase; ">Majalah Online</h4>
        </a>
        <a class="nav-item nav-link" href="contact.php">Contact Me</a>
        <a class="nav-item nav-link" href="majalah.php">Majalah</a>

        <?php if (isset($_SESSION[KEY]["login"])): ?>
          <a class="nav-item nav-link" href="logout.php">Logout</a>
        <?php else: ?>
          <a class="nav-item nav-link" href="login.php">Login</a>
        <?php endif ?>

      </div>
    </div>
  </div>
</nav>
<script>
  let navLink = document.querySelectorAll('.nav-link');
  navLink.forEach(e => {
    if (e.innerHTML == '<?= $halaman ?>') {
      e.classList.add('active');
    }
  });
</script>