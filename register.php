<?php $halaman = "Majalah Online" ?>
<?php

require 'admin/function/init.php';

if (requestMethod() == "POST" )  {

  $data = validate(["nama", "email", "no_telp", "alamat", "username", "password"]);

  if ($data) {
    setSuccess("Register Berhasil, Silahkan Login!");
    query_insert("subscriber", $data);
    direct("login.php");

  } else {
    setError("Lengkapi Form!");
  }

}

?>

<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="assets/fonts/inter/inter.css" id="main-font-link">
  <link rel="stylesheet" href="assets/fonts/phosphor/duotone/style.css">
  <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css">
  <link rel="stylesheet" href="assets/fonts/feather.css">
  <link rel="stylesheet" href="assets/fonts/fontawesome.css">
  <link rel="stylesheet" href="assets/fonts/material.css">
  <link rel="stylesheet" href="assets/css/style.css" id="main-style-link">
  <link rel="stylesheet" href="assets/css/style-preset.css">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
  
  <div class="page-loader">
    <div class="bar"></div>
  </div>

  <div class="auth-main">
    <div class="auth-wrapper v1">
      <div class="auth-form">


        <?php if (hasSuccess()): ?>
        <script>
          setTimeout(() => {
            location.replace("majalah.php");
          }, 3000);
        </script>

        <?php endif ?>
        <?php 
            alert()
          ?>

        <div class="text-center"><a href="#"><img src="assets/images/logo-dark.png" alt="img"></a></div>
        
          <div class="saprator my-3"><span>Register Subscriber with your work email.</span></div>

          <form action="" method="POST" enctype="multipart/form-data">

            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <input type="text" name="nama" class="form-control" value="<?= old("nama") ?>" placeholder="Nama"></div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <input type="text" name="username" class="form-control" value="<?= old("username") ?>" placeholder="Username"></div>
              </div>
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" value="<?= old("alamat") ?>" name="alamat" placeholder="Alamat Lengkap">
            </div>
            
            <div class="mb-3">
              <input type="email" class="form-control" value="<?= old("email") ?>" name="email" placeholder="Email">
            </div>
            
            <!-- <div class="mb-3">
              <input type="text" class="form-control" value="<?= old("pic") ?>" name="pic" placeholder="Pic">
            </div> -->
            
            <div class="mb-3">
              <input type="number" class="form-control" value="<?= old("no_telp") ?>" name="no_telp" placeholder="No Telfon">
            </div>
            
            <div class="mb-3">
              <input type="password" class="form-control" value="<?= old("password") ?>" name="password" placeholder="password">
            </div>

            <div class="d-flex mt-1 justify-content-between">
              <div class="form-check"><input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked=""> <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms &amp; Condition</label></div>
            </div>

            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">Sign up</button>
            </div>

            <div class="d-flex justify-content-between align-items-end mt-4">
              <h6 class="f-w-500 mb-0">Already have an Account?</h6>
              <a href="login.php" class="link-primary">Login here</a>
            </div>

          </form>
          
        </div>

      </div>
    </div>
  </div>

  <script src="assets/js/plugins/popper.min.js"></script>
  <script src="assets/js/plugins/simplebar.min.js"></script>
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="assets/js/fonts/custom-font.js"></script>
  <script src="assets/js/pcoded.js"></script>
  <script src="assets/js/plugins/feather.min.js"></script>
  <script>
    layout_change('light');
  </script>
  <script>
    change_box_container('false');
  </script>
  <script>
    layout_caption_change('true');
  </script>
  <script>
    layout_rtl_change('false');
  </script>
  <script>
    preset_change('preset-1');
  </script>
  <script>
    main_layout_change('vertical');
  </script>
</body>

</html>