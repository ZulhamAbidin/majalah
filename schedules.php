<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

// Ambil data schedules dari database
$sql = 'SELECT id_schedules, CarrierName, VesselName, VoyageNumber, TradeLine, DepartureDate, ArrivalDate FROM schedules';
$result = $conn->query($sql);

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
    height: 200px;
    background: url('assets/img/bg.jpg');
    background-size: cover;
    background-position: 0px -300px;
  }

  .jumbotron h2,
  .jumbotron h5 {
    text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.35);
  }
</style>
<div class="jumbotron border mt-5">
  <div class="container pt-5 text-center">
    <h2 class="display-4 text-white mb-3 ">Berita</h2>
  </div>
</div>

<!-- content -->
<section class="main mt-4 pt-4" id="produk " style="min-height: 88vh;">
  <div class="container">
  <div class="d-flex justify-content-between mb-4">
                <h6 class="mb-0">Daftar Jadwal</h6>
              </div>
    <div class="row">
    <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Pengangkut</th>
                      <th>Nama Kapal</th>
                      <th>Nomor Perjalanan</th>
                      <th>Jalur Perdagangan</th>
                      <th>Tanggal Keberangkatan</th>
                      <th>Tanggal Kedatangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($result->num_rows > 0): ?>
                      <?php $counter = 1; ?>
                      <?php while ($row = $result->fetch_assoc()): ?>
                        <tr id="schedule-<?php echo htmlspecialchars($row['id_schedules']); ?>">
                          <td><?php echo $counter++; ?></td>
                          <td><?php echo isset($row['CarrierName']) ? htmlspecialchars($row['CarrierName']) : ''; ?></td>
                          <td><?php echo isset($row['VesselName']) ? htmlspecialchars($row['VesselName']) : ''; ?></td>
                          <td><?php echo isset($row['VoyageNumber']) ? htmlspecialchars($row['VoyageNumber']) : ''; ?></td>
                          <td><?php echo isset($row['TradeLine']) ? htmlspecialchars($row['TradeLine']) : ''; ?></td>
                          <td><?php echo isset($row['DepartureDate']) ? htmlspecialchars($row['DepartureDate']) : ''; ?></td>
                          <td><?php echo isset($row['ArrivalDate']) ? htmlspecialchars($row['ArrivalDate']) : ''; ?></td>
                          <td>
                            <a href="detail-schedules.php?id=<?php echo htmlspecialchars($row['id_schedules']); ?>" class="btn btn-sm btn-info">Detail</a>
                        </td>
                        </tr>
                      <?php endwhile; ?>
                    <?php else: ?>
                      <tr><td colspan="8">Belum ada data schedules.</td></tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
    </div>

  </div>

</section>
<!-- endContent -->

<?php include 'Comp/footer.php'; ?>