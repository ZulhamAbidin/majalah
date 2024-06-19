<?php 
require 'function/init.php';

if (requestMethod() == "POST") {

  $data = validate(["email", "password"]);

  if ($data) {

    $email = $data["email"];
    $password = $data["password"];

    $user = query_find("admin", "email = '$email' AND password = '$password'");

    if ($user) {
      $_SESSION[KEY]["login"] = $user;

      // Check user's role and redirect accordingly
      if ($user['role'] == 1) {
        direct("index.php");
      } elseif ($user['role'] == 0) {
        direct("berita.php");
      }
      
      die; // Ensure script stops execution after redirection
    } else {
      setError("Username atau Password Salah!");      
    }
    
  } else {
    setError("Username atau Password Tidak Boleh Kosong!");
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
  <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="../assets/fonts/inter/inter.css" id="main-font-link">
  <link rel="stylesheet" href="../assets/fonts/phosphor/duotone/style.css">
  <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
  <link rel="stylesheet" href="../assets/fonts/feather.css">
  <link rel="stylesheet" href="../assets/fonts/fontawesome.css">
  <link rel="stylesheet" href="../assets/fonts/material.css">
  <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link">
  <link rel="stylesheet" href="../assets/css/style-preset.css">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
  data-pc-theme_contrast="" data-pc-theme="light">
  
  <div class="page-loader">
    <div class="bar"></div>
  </div>

  <div class="auth-main">
    <div class="auth-wrapper v1">
      <div class="auth-form">
      

        <?php 
              alert()
            ?>

        <div class="text-center"><a href="#"><img src="../assets/images/logo-dark.png" alt="img"></a></div>
        <div class="saprator my-3"><span>Login Admin with your work email.</span></div>
        <style>
    </style>
        <div class="card" style=" border: none !important; ">

        <form role="form" method="POST">
          <div class="row">

            <div class="col-12">
              <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="email">
              </div>
            </div>

            <div class="col-12">
              <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>

            <div class="d-flex mt-1 justify-content-between align-items-center">
              <div class="form-check"><input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                  checked=""> <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label></div>
            </div>

            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="../index.php" type="button" class="mt-2 btn btn-primary">Kembali</a>
            </div>

          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/plugins/popper.min.js"></script>
  <script src="../assets/js/plugins/simplebar.min.js"></script>
  <script src="../assets/js/plugins/bootstrap.min.js"></script>
  <script src="../assets/js/fonts/custom-font.js"></script>
  <script src="../assets/js/pcoded.js"></script>
  <script src="../assets/js/plugins/feather.min.js"></script>
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