<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

// Ambil data schedules dari database
$sql = "SELECT id_schedules, CarrierName, VesselName, VoyageNumber, TradeLine, DepartureDate, ArrivalDate FROM schedules";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <?php partials("aside.php") ?>
  
  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <?php partials("nav.php") ?>  
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card" style="min-height: 70vh">
            <div class="card-body">

              <div class="d-flex justify-content-between mb-4">
                <h6 class="mb-0">Daftar Schedules</h6>
                <a href="schedules-add.php" class="btn btn-sm bg-gradient-secondary">Tambah schedules</a>
              </div>

              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Carrier Name</th>
                      <th>Vessel Name</th>
                      <th>Voyage Number</th>
                      <th>Trade Line</th>
                      <th>Departure Date</th>
                      <th>Arrival Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($result->num_rows > 0): ?>
                      <?php $counter = 1; ?>
                      <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                          <td><?php echo $counter++; ?></td>
                          <td><?php echo isset($row['CarrierName']) ? htmlspecialchars($row['CarrierName']) : ''; ?></td>
                          <td><?php echo isset($row['VesselName']) ? htmlspecialchars($row['VesselName']) : ''; ?></td>
                          <td><?php echo isset($row['VoyageNumber']) ? htmlspecialchars($row['VoyageNumber']) : ''; ?></td>
                          <td><?php echo isset($row['TradeLine']) ? htmlspecialchars($row['TradeLine']) : ''; ?></td>
                          <td><?php echo isset($row['DepartureDate']) ? htmlspecialchars($row['DepartureDate']) : ''; ?></td>
                          <td><?php echo isset($row['ArrivalDate']) ? htmlspecialchars($row['ArrivalDate']) : ''; ?></td>
                          <td>
                            <a href="schedules-edit.php?id=<?php echo isset($row['id_schedules']) ? htmlspecialchars($row['id_schedules']) : ''; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete_schedule.php?id=<?php echo isset($row['id_schedules']) ? htmlspecialchars($row['id_schedules']) : ''; ?>" class="btn btn-sm btn-danger">Delete</a>
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
        </div>
        
      </div>

      <?php partials("footer.php") ?>  

    </div>

  </main>
  
  <?php partials("end.php") ?>  
</body>

</html>
