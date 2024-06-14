<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

?>



<style>
  .shadow-sm {
    box-shadow: 0px 3px 5px rgba(0, 0, 0, .15);
  }

  footer {
    text-align: center;
  }

  @media (max-width: 576px) {
    .card-title {
      font-size: 14px;
    }

    .card-text {
      font-size: 12px;
    }

    footer p {
      font-size: 10px;
    }
  }
</style>
<!-- Navbar -->
<?php require 'Comp/navbar.php'; ?>
<!-- endnavbar -->

<style>
  .jumbotron {
    height: 700px;
    background: url('assets/img/bg.jpg');
    background-size: cover;
    background-position: 0px -300px;
    background-repeat: no-repeat;
  }

  .jumbotron h2,
  .jumbotron h5 {
    text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.35);
  }
</style>
<div class="jumbotron border mt-5">
  <div class="container pt-5 text-center">
    <h2 class="display-4 text-white mb-3 mt-4">About</h2>
    <h3 class="text-white mt-5" style="text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);">Sebuah platform yang menginspirasi, menghibur, <br>dan memberdayakan pembaca dengan <br>konten berkualitas tinggi tentang gaya hidup, fashion, seni, <br>budaya, dan banyak lagi.</h3>
  </div>
</div>


<?php include 'Comp/footer.php'; ?>