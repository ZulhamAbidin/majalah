<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$berita = query_count("berita");
$majalah = query_count("majalah");
$subscriber = query_count("penjualan");

$hal = "Dashboard";
?>

<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <?php partials("aside.php") ?>
  <?php partials("nav.php") ?>

  <div class="pc-container">
    <div class="pc-content">

    <div class="page-header">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0)">Kategori</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div class="page-header-title">
								<h2 class="mb-0">Kategori</h2>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-md-end mt-3 mt-md-0">
								<a href="kategori-add.php" class="btn btn-primary">+ Tambah Kategori</a>
							</div>
						</div>
					</div>
				</div>
			</div>


      <div class="row">

        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              
            </div>

            <div class="card-body">

              <div class="row">
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <?php partials("footer.php") ?>
  <?php partials("end.php") ?>
</body>
</html>