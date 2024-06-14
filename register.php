<?php $halaman = "Majalah Online" ?>
<?php

require 'admin/function/init.php';

if (requestMethod() == "POST" )  {

  $data = validate(["nama", "email", "no_telp", "alamat", "username", "password", "pic"]);

  if ($data) {
    setSuccess("Register Berhasil, Silahkan Login!");
    query_insert("subscriber", $data);
    direct("login.php");

  } else {
    setError("Lengkapi Form!");
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
  <title>Register Subcriber</title>
</head>
<body class="bg-light">

  <div class="row justify-content-center mt-5">

    <div class="col-md-6 col-sm-12 mt-4">
      <div class="card border-0">
        <div class="card-body p-4">

          <div class="text-center">
            <h3>Register Subscriber</h3>
          </div>

          <?php 
          alert();
           ?>

          <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control mt-2" placeholder="Nama" value="<?= old("nama") ?>">
            </div>

            <div class="form-group mb-3">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control mt-2" placeholder="Email" value="<?= old("email") ?>">
            </div>

            <div class="form-group mb-3">
              <label for="">No. Telp.</label>
              <input type="text" name="no_telp" class="form-control mt-2" placeholder="No. Telp" value="<?= old("no_telp") ?>">
            </div>

            <div class="form-group mb-3">
              <label for="">Alamat</label>
              <input type="text" name="alamat" class="form-control mt-2" placeholder="Alamat" value="<?= old("alamat") ?>">
            </div>

            <div class="form-group mb-3">
              <label for="">PIC</label>
              <input type="text" name="pic" class="form-control mt-2" placeholder="PIC" value="<?= old("pic") ?>">
            </div>
            
            <div class="form-group mb-3">
              <label for="">Username</label>
              <input type="text" name="username" class="form-control mt-2" placeholder="Username"value="<?= old("username") ?>">
            </div>

            <div class="form-group mb-3">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control mt-2" placeholder="Password" value="<?= old("password") ?>">
            </div>

         <!--    <div class="form-group mb-3">
              <label for="">Foto</label>
              <input type="file" name="foto" class="form-control mt-2" placeholder="Alamat">
            </div> -->

            <small>Sudah Punya Akun? <a href="login.php" class="text-decoration-none text-primary">Login</a></small>

            <br>

            <button type="submit" class="btn mt-3 btn-warning text-white">Register</button>


          </form>


          
        </div>
      </div>
    </div>
    
  </div>
  
</body>
</html>