<?php
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
    direct("login.php");
    die;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    if (empty($carrierName)) {
        $errors[] = "Carrier Name harus diisi";
    }

    if (empty($errors)) {
        $carrierName = $conn->real_escape_string($carrierName);
        $vesselName = $conn->real_escape_string($vesselName);
        $voyageNumber = $conn->real_escape_string($voyageNumber);
        $tradeLine = $conn->real_escape_string($tradeLine);
        $portCodeOrigin = $conn->real_escape_string($portCodeOrigin);
        $departureDate = $conn->real_escape_string($departureDate);
        $transhipment = $conn->real_escape_string($transhipment);
        $transhipmentDeparture = $conn->real_escape_string($transhipmentDeparture);
        $portCodeDestination = $conn->real_escape_string($portCodeDestination);
        $arrivalDate = $conn->real_escape_string($arrivalDate);
        $duration = $conn->real_escape_string($duration);
        $forwarder = $conn->real_escape_string($forwarder);
        $berthingTerminal = $conn->real_escape_string($berthingTerminal);
        $requestQuote = $conn->real_escape_string($requestQuote);

        $sql = "INSERT INTO schedules (CarrierName, VesselName, VoyageNumber, TradeLine, PortCodeOrigin, DepartureDate, 
                Transhipment, TranshipmentDeparture, PortCodeDestination, ArrivalDate, Duration, Forwarder, BerthingTerminal, RequestQuote)
                VALUES ('$carrierName', '$vesselName', '$voyageNumber', '$tradeLine', '$portCodeOrigin', '$departureDate', 
                '$transhipment', '$transhipmentDeparture', '$portCodeDestination', '$arrivalDate', '$duration', '$forwarder', '$berthingTerminal', '$requestQuote')";

if ($conn->query($sql) === TRUE) {
    $successMessage = "Data schedules berhasil ditambahkan.";
    $_POST = []; // Mengosongkan array $_POST untuk menghapus nilai yang disubmit sebelumnya

    // Redirect ke halaman schedules.php
    header("Location: schedules.php");
    exit(); // Penting untuk menghentikan eksekusi script setelah redirect
} else {
    $errors[] = "Error: " . $conn->error;
}

    }
}

$conn->close();
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

                            <!-- Form untuk menambah data schedules -->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="mb-3">
                                <label for="carrierName" class="form-label">Nama Pengangkut</label>
                                <input type="text" class="form-control" id="carrierName" name="carrierName" required value="andri okita">
                            </div>
                            <div class="mb-3">
                                <label for="vesselName" class="form-label">Nama Kapal</label>
                                <input type="text" class="form-control" id="vesselName" name="vesselName" required value="MV Pelayaran Jaya">
                            </div>
                            <div class="mb-3">
                                <label for="voyageNumber" class="form-label">Nomor Pelayaran</label>
                                <input type="text" class="form-control" id="voyageNumber" name="voyageNumber" value="V12345">
                            </div>
                            <div class="mb-3">
                                <label for="tradeLine" class="form-label">Jalur Perdagangan</label>
                                <input type="text" class="form-control" id="tradeLine" name="tradeLine" value="Asia-Europe">
                            </div>
                            <div class="mb-3">
                                <label for="portCodeOrigin" class="form-label">Kode Pelabuhan Asal</label>
                                <input type="text" class="form-control" id="portCodeOrigin" name="portCodeOrigin" value="SGSIN">
                            </div>
                            <div class="mb-3">
                                <label for="departureDate" class="form-label">Tanggal Keberangkatan</label>
                                <input type="date" class="form-control" id="departureDate" name="departureDate" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="transhipment" class="form-label">Transshipment</label>
                                <input type="text" class="form-control" id="transhipment" name="transhipment" value="Yes">
                            </div>
                            <div class="mb-3">
                                <label for="transhipmentDeparture" class="form-label">Keberangkatan Transshipment</label>
                                <input type="date" class="form-control" id="transhipmentDeparture" name="transhipmentDeparture" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="portCodeDestination" class="form-label">Kode Pelabuhan Tujuan</label>
                                <input type="text" class="form-control" id="portCodeDestination" name="portCodeDestination" value="Destination Port">
                            </div>
                            <div class="mb-3">
                                <label for="arrivalDate" class="form-label">Tanggal Kedatangan</label>
                                <input type="date" class="form-control" id="arrivalDate" name="arrivalDate" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Durasi</label>
                                <input type="number" class="form-control" id="duration" name="duration" value="5">
                            </div>
                            <div class="mb-3">
                                <label for="forwarder" class="form-label">Pengirim</label>
                                <input type="text" class="form-control" id="forwarder" name="forwarder" value="Forwarder Company">
                            </div>
                            <div class="mb-3">
                                <label for="berthingTerminal" class="form-label">Terminal Sandar</label>
                                <input type="text" class="form-control" id="berthingTerminal" name="berthingTerminal" value="Terminal A">
                            </div>
                            <div class="mb-3">
                                <label for="requestQuote" class="form-label">Permintaan Penawaran</label>
                                <input type="text" class="form-control" id="requestQuote" name="requestQuote" value="Quote Request">
                            </div>



                                <!-- Menampilkan pesan kesalahan jika ada -->
                                <?php if (!empty($errors)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li><?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <!-- Menampilkan pesan sukses jika ada -->
                                <?php if (!empty($successMessage)): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $successMessage; ?>
                                    </div>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-primary">Tambah Data</button>
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
