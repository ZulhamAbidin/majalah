<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("admin", ["where" => "id_admin = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("admin.php");
  die;
}

if (requestMethod() == "POST" )  {
	$data = validate(["nama", "email", "password", "role"]);
	if ($data) {
		query_update("admin", $data, "id_admin = '$id'");
		setSuccess("Berhasil Disimpan!");
		direct("admin.php");
		die;
	} else {
		setError("Lengkapi Form");
	}
}

$hal = "Data Admin";
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
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Edit</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="page-header-title">
                <h2 class="mb-0">Admin Edit</h2>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">

        <div class="col-sm-12">
          <div class="card">

            <div class="card-body">

              <?php toast(); ?>

              <form role="form" method="POST">
                <div class="mb-3">
                  <label for="">Nama</label>
                  <input type="text" value="<?= old("nama", $item["nama"]) ?>" class="form-control" placeholder="Nama"
                    name="nama">
                </div>

                <div class="mb-3">
                  <label for="">Email</label>
                  <input type="email" value="<?= old("email", $item["email"]) ?>" class="form-control"
                    placeholder="Email" name="email">
                </div>

                <div class="mb-3">
                  <label for="">Password</label>
                  <input type="password" value="<?= old("password", $item["password"]) ?>" class="form-control"
                    placeholder="Password" name="password">
                </div>

                <div class="mb-3">
                  <label for="role">Role</label>
                  <select class="form-select" id="role" name="role">
                    <option value="1" <?= ($item["role"] == 1) ? 'selected' : '' ?>>Administrator</option>
                    <option value="0" <?= ($item["role"] == 0) ? 'selected' : '' ?>>Jurnalis</option>
                  </select>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
