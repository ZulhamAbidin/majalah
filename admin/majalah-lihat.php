<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("majalah", ["where" => "id_majalah = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("majalah.php");
  die;
}

$hal = "Majalah";
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
								<li class="breadcrumb-item"><a href="javascript: void(0)">Majalah</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0)">Lihat</a></li>
							</ul>
						</div>
						<div class="col-md-12">
							<div class="page-header-title">
								<h2 class="mb-0">Majalah Lihat</h2>
							</div>
						</div>
					</div>
				</div>
			</div>


      <div class="row">

        <div class="col-sm-12">
          <div class="card">

            <div class="card-body">

            <iframe style="width: 100%; height: 450px;" src="assets/img/<?= $item["isi"] ?>" frameborder="0"></iframe>
            
            </div>
            <div class="card-footer text-end">
            <a href="majalah-detail.php?id=<?= $id ?>" class="btn btn-primary">Kembali</a>
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