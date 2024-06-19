<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

if (requestMethod() == "POST" )  {

	$data = validate(["nama", "email", "password", "role"]);

	if ($data) {

		query_insert("admin", $data);
		setSuccess("Berhasil Ditambah!");
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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Tamhah</a></li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Admin Tambah</h2>
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
                  <label for="">Nama</label>
                  <input type="text" value="<?= old("nama") ?>" class="form-control" placeholder="Nama" name="nama">
                </div>

                <div class="mb-3">
                  <label for="">Email</label>
                  <input type="email" value="<?= old("email") ?>" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="mb-3">
                  <label for="">Password</label>
                  <input type="password" value="<?= old("password") ?>" class="form-control" placeholder="Password"
                    name="password">
                </div>

                <div class="mb-3">
                  <label for="role">Role</label>
                  <select id="role" name="role" class="form-select" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="1">Administrator</option>
                    <option value="0">Jurnalis</option>
                  </select>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Tambah</button>
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