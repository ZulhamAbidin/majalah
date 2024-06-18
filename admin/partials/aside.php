<?php 
global $hal;
 ?>


 <!-- [ Sidebar Menu ] start -->
 <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="#" class="b-brand text-primary">
        <img src="../assets/images/logo-dark.png" width="70%" />
      </a>
    </div>

    <div class="navbar-content">

      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0"><?= $_SESSION[KEY]["login"]["nama"] ?></h6>
              <small>Administrator</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="logout.php">
                <i class="ti ti-power"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <ul class="pc-navbar">

        
        <li class="pc-item pc-caption">
          <label>Navigation</label>
        </li>
        
        <li class="pc-item <?= $hal == "Dashboard" ? "active" : "" ?>"><a href="index.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-status-up"></use>
              </svg>
            </span>
            <span class="pc-mtext">Dashboard</span></a>
        </li>

        <li class="pc-item <?= $hal == "Data Kategori" ? "active" : "" ?>"><a href="kategori.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-password-check"></use>
              </svg>
            </span>
            <span class="pc-mtext">Kategori</span></a>
        </li>

        <li class="pc-item <?= $hal == "Data Tag" ? "active" : "" ?>"><a href="tag.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-clipboard"></use>
              </svg>
            </span>
            <span class="pc-mtext">Tag</span></a>
        </li>

        <li class="pc-item <?= $hal == "Majalah" ? "active" : "" ?>"><a href="majalah.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-keyboard"></use>
              </svg>
            </span>
            <span class="pc-mtext">Majalah</span></a>
        </li>

        <li class="pc-item <?= $hal == "sch" ? "active" : "" ?>"><a href="schedules.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-airplane"></use>
              </svg>
            </span>
            <span class="pc-mtext">Schedules</span></a>
        </li>

        <li class="pc-item  <?= $hal == "Penjualan" ? "active" : "" ?>"><a href="penjualan.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-add-item"></use>
              </svg>
            </span>
            <span class="pc-mtext">Penjualan</span></a>
        </li>

        <li class="pc-item <?= $hal == "Berita" ? "active" : "" ?>"><a href="berita.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-keyboard"></use>
              </svg>
            </span>
            <span class="pc-mtext">Berita</span></a>
        </li>

        <li class="pc-item <?= $hal == "Data Admin" ? "active" : "" ?>"><a href="admin.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-user"></use>
              </svg>
            </span>
            <span class="pc-mtext">Data Admin</span></a>
        </li>

        <li class="pc-item"><a href="logout.php" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-notification-status"></use>
              </svg>
            </span>
            <span class="pc-mtext">Logout</span></a>
        </li>

      </ul>
    </div>
  </div>
</nav>