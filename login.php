<?php
$halaman = "Majalah Online";
require 'admin/function/init.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (requestMethod() == "POST") {
    $data = validate(["username", "password"]);

    if ($data) {
        $username = $data["username"];
        $password = $data["password"];

        $user = query_select("subscriber", ["where" => "username = '$username' AND password = '$password'"]);

        if ($user) {
            setSuccess("Login Berhasil");
            $_SESSION[KEY]['login'] = $user[0]; 
            direct("majalah-anda.php");
        } else {
            setError("Username atau Password salah!");
        }
    } else {
        setError("Username dan Password tidak boleh kosong!");
    }
}
?>

<!doctype html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Login </title>
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

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
  data-pc-theme_contrast="" data-pc-theme="light">
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
        
          <div class="card my-5">
            <form action="" method="POST">
              <div class="card-body">

                <h4 class="text-center f-w-500 mb-3">Login Subscriber</h4>

                <div class="mb-3">
                  <input type="text" name="username" class="form-control" placeholder="username">
                </div>

                <div class="mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="d-flex mt-1 justify-content-between align-items-center">
                  <div class="form-check"><input class="form-check-input input-primary" type="checkbox"
                      id="customCheckc1" checked=""> <label class="form-check-label text-muted"
                      for="customCheckc1">Remember me?</label></div>
                </div>

                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-primary">Login</button>
                  <a href="index.php" type="button" class="mt-2 btn btn-primary">Kembali</a>
                </div>

                <div class="d-flex justify-content-between align-items-end mt-4">
                  <h6 class="f-w-500 mb-0">Don't have an Account?</h6><a href="register.php" class="link-primary">Create Account</a>
                </div>

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