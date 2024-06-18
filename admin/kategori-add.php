<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

if (requestMethod() == "POST" )  {

	$data = validate(["nama"]);

	if ($data) {

		query_insert("kategori", $data);
		setSuccess("Berhasil Ditambah!");
		direct("kategori.php");
		die;
		
	} else {

		setError("Lengkapi Form");

	}

}

$hal = "Data Kategori";
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
								<li class="breadcrumb-item"><a href="javascript: void(0)">Edit</a></li>
							</ul>
						</div>
						<div class="col-md-12">
							<div class="page-header-title">
								<h2 class="mb-0">Kategori Edit</h2>
							</div>
						</div>
					</div>
				</div>
			</div>


      <div class="row">

        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">              
              <?php alert(); ?>

              <form role="form" method="POST">
                <div class="mb-3">
                  <label for="" class="mb-2">Nama Kategori</label>
                  <input type="text" value="<?= old("nama") ?>" class="form-control" placeholder="Nama Kategori" name="nama">
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
              </form>

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