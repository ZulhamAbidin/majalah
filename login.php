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
            $_SESSION[KEY]['login'] = $user[0]; // Simpan data pengguna di sesi
            direct("majalah.php");
        } else {
            setError("Username atau Password salah!");
        }
    } else {
        setError("Username dan Password tidak boleh kosong!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login Subcriber</title>
</head>
<body class="bg-light">

  <div class="row justify-content-center mt-5">

    <div class="col-md-4 col-sm-12 mt-4">
      <div class="card border-0">
        <div class="card-body p-4">

          <div class="text-center mb-3">
            <h3>Login Subscriber</h3>
          </div>
          <?php if (hasSuccess()): ?>

            <script>
              setTimeout(() => {
                location.replace("majalah.php");
              }, 3000);
            </script>
            
          <?php endif ?>

          <?php 


          alert();
           ?>


          <form action="" method="POST">
            
            <div class="form-group mb-3">
              <label for="">Username</label>
              <input type="text" name="username" class="form-control mt-2" placeholder="Username">
            </div>

            <div class="form-group mb-3">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control mt-2" placeholder="Password">
            </div>

            <small>Belum Punya Akun? <a href="register.php" class="text-decoration-none text-primary">Buat Akun</a></small>

            <br>

            <button type="submit" class="btn mt-3 btn-warning text-white">Login</button>


          </form>


          
        </div>
      </div>
    </div>
    
  </div>
  
</body>
</html>