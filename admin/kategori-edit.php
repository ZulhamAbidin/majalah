<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("kategori", ["where" => "id_kategori = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("kategori.php");
  die;
}

if (requestMethod() == "POST" )  {

	$data = validate(["nama"]);

	if ($data) {

		query_update("kategori", $data, "id_kategori = '$id'");
		setSuccess("Berhasil Disimpan!");
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

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
  data-pc-theme="light">

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
                <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Kategori</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit</li>
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

        <div class="card">
          <div class="card-body">

            <form role="form" method="POST">

                <div class="mb-3">
                  <label for="">Nama Kategori</label>
                  <input type="text" value="<?= old("nama", $item["nama"]) ?>" class="form-control"
                    placeholder="Nama Kategori" name="nama">
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                
            </form>

          </div>
        </div>

      </div>

    </div>

  </div>

  <?php partials("footer.php") ?>
  <?php partials("end.php") ?>
</body>

</html>
