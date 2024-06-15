<?php
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
    direct("login.php");
    die;
}

// Inisialisasi variabel untuk menyimpan data schedules
$id_schedules = $carrierName = $vesselName = $voyageNumber = $tradeLine = $portCodeOrigin = $departureDate = $transhipment = $transhipmentDeparture = $portCodeDestination = $arrivalDate = $duration = $forwarder = $berthingTerminal = $requestQuote = "";

// Tangkap id yang dikirimkan dari URL
if (isset($_GET['id'])) {
    $id_schedules = $_GET['id'];

    // Query untuk mengambil data schedules berdasarkan id
    $sql = "SELECT * FROM schedules WHERE id_schedules = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_schedules);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Ambil data schedules
        $row = $result->fetch_assoc();
        $carrierName = $row['CarrierName'];
        $vesselName = $row['VesselName'];
        $voyageNumber = $row['VoyageNumber'];
        $tradeLine = $row['TradeLine'];
        $portCodeOrigin = $row['PortCodeOrigin'];
        $departureDate = $row['DepartureDate'];
        $transhipment = $row['Transhipment'];
        $transhipmentDeparture = $row['TranshipmentDeparture'];
        $portCodeDestination = $row['PortCodeDestination'];
        $arrivalDate = $row['ArrivalDate'];
        $duration = $row['Duration'];
        $forwarder = $row['Forwarder'];
        $berthingTerminal = $row['BerthingTerminal'];
        $requestQuote = $row['RequestQuote'];
    } else {
        // Jika id tidak ditemukan, redirect ke halaman schedules.php atau berikan pesan error
        direct("schedules.php");
        die;
    }
} else {
    // Jika tidak ada id yang dikirim, redirect ke halaman schedules.php atau berikan pesan error
    direct("schedules.php");
    die;
}

// Proses update data jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan dari form
    $carrierName = $_POST['carrierName'];
    $vesselName = $_POST['vesselName'];
    $voyageNumber = $_POST['voyageNumber'];
    $tradeLine = $_POST['tradeLine'];
    $portCodeOrigin = $_POST['portCodeOrigin'];
    $departureDate = $_POST['departureDate'];
    $transhipment = $_POST['transhipment'];
    $transhipmentDeparture = $_POST['transhipmentDeparture'];
    $portCodeDestination = $_POST['portCodeDestination'];
    $arrivalDate = $_POST['arrivalDate'];
    $duration = $_POST['duration'];
    $forwarder = $_POST['forwarder'];
    $berthingTerminal = $_POST['berthingTerminal'];
    $requestQuote = $_POST['requestQuote'];

    // Query untuk update data schedules
    $sql_update = "UPDATE schedules SET 
                    CarrierName = ?, 
                    VesselName = ?, 
                    VoyageNumber = ?, 
                    TradeLine = ?, 
                    PortCodeOrigin = ?, 
                    DepartureDate = ?, 
                    Transhipment = ?, 
                    TranshipmentDeparture = ?, 
                    PortCodeDestination = ?, 
                    ArrivalDate = ?, 
                    Duration = ?, 
                    Forwarder = ?, 
                    BerthingTerminal = ?, 
                    RequestQuote = ?
                  WHERE id_schedules = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssssssssisssi", 
                             $carrierName, 
                             $vesselName, 
                             $voyageNumber, 
                             $tradeLine, 
                             $portCodeOrigin, 
                             $departureDate, 
                             $transhipment, 
                             $transhipmentDeparture, 
                             $portCodeDestination, 
                             $arrivalDate, 
                             $duration, 
                             $forwarder, 
                             $berthingTerminal, 
                             $requestQuote, 
                             $id_schedules);

    if ($stmt_update->execute()) {
        // Redirect ke halaman schedules.php setelah berhasil update
        direct("schedules.php");
        die;
    } else {
        // Handle error jika terjadi kesalahan saat update
        echo "Error: " . $stmt_update->error;
    }
}
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
                    <div class="card " style="min-height: 70vh">
                        <div class="card-body">
                            <h6 class="mb-4">Edit Daftar Jadwal</h6>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . htmlspecialchars($id_schedules); ?>" method="POST">
                                <input type="hidden" name="id_schedules" value="<?php echo htmlspecialchars($id_schedules); ?>">
                                <div class="mb-3">
                                    <label for="carrierName" class="form-label">Nama Pengangkut</label>
                                    <input type="text" class="form-control" id="carrierName" name="carrierName" required value="<?php echo htmlspecialchars($carrierName); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="vesselName" class="form-label">Nama Kapal</label>
                                    <input type="text" class="form-control" id="vesselName" name="vesselName" required value="<?php echo htmlspecialchars($vesselName); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="voyageNumber" class="form-label">Nomor Perjalanan</label>
                                    <input type="text" class="form-control" id="voyageNumber" name="voyageNumber" value="<?php echo htmlspecialchars($voyageNumber); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="tradeLine" class="form-label">Jalur Perdagangan</label>
                                    <input type="text" class="form-control" id="tradeLine" name="tradeLine" value="<?php echo htmlspecialchars($tradeLine); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="portCodeOrigin" class="form-label">Kode Pelabuhan Asal</label>
                                    <input type="text" class="form-control" id="portCodeOrigin" name="portCodeOrigin" value="<?php echo htmlspecialchars($portCodeOrigin); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="departureDate" class="form-label">Tanggal Keberangkatan</label>
                                    <input type="date" class="form-control" id="departureDate" name="departureDate" value="<?php echo htmlspecialchars($departureDate); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="transhipment" class="form-label">Pengangkutan Ulang</label>
                                    <input type="text" class="form-control" id="transhipment" name="transhipment" value="<?php echo htmlspecialchars($transhipment); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="transhipmentDeparture" class="form-label">Tanggal Keberangkatan Transhipment</label>
                                    <input type="date" class="form-control" id="transhipmentDeparture" name="transhipmentDeparture" value="<?php echo htmlspecialchars($transhipmentDeparture); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="portCodeDestination" class="form-label">Kode Pelabuhan Tujuan</label>
                                    <input type="text" class="form-control" id="portCodeDestination" name="portCodeDestination" value="<?php echo htmlspecialchars($portCodeDestination); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="arrivalDate" class="form-label">Tanggal Kedatangan</label>
                                    <input type="date" class="form-control" id="arrivalDate" name="arrivalDate" value="<?php echo htmlspecialchars($arrivalDate); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Durasi</label>
                                    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo htmlspecialchars($duration); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="forwarder" class="form-label">Eksportir</label>
                                    <input type="text" class="form-control" id="forwarder" name="forwarder" value="<?php echo htmlspecialchars($forwarder); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="berthingTerminal" class="form-label">Terminal Berlabuh</label>
                                    <input type="text" class="form-control" id="berthingTerminal" name="berthingTerminal" value="<?php echo htmlspecialchars($berthingTerminal); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="requestQuote" class="form-label">Permintaan Penawaran</label>
                                    <textarea class="form-control" id="requestQuote" name="requestQuote" rows="3"><?php echo htmlspecialchars($requestQuote); ?></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="schedules.php" class="btn btn-secondary">Cancel</a>
                            </form>
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
