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
    $_POST = []; 

    header("Location: schedules.php");
    exit(); 
} else {
    $errors[] = "Error: " . $conn->error;
}

    }
}
$hal = "sch";
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
    data-pc-theme="light">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <?php partials("aside.php") ?>
    <?php partials("nav.php") ?>

    <div class="pc-container">
        <div class="pc-content">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Schedules</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h2 class="mb-0">Schedules Tambah</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                               <div class="row">

                               <div class="mb-3 col-12 col-md-4">
                                    <label for="carrierName" class="form-label">Nama Pengangkut</label>
                                    <input type="text" class="form-control" id="carrierName" name="carrierName"
                                        required>
                                </div>

                                <div class="mb-3 col-12 col-md-4">
                                    <label for="vesselName" class="form-label">Nama Kapal</label>
                                    <input type="text" class="form-control" id="vesselName" name="vesselName" required
                                        value="MV Pelayaran Jaya">
                                </div>

                                <div class="mb-3 col-12 col-md-4">
                                    <label for="voyageNumber" class="form-label">Nomor Pelayaran</label>
                                    <input type="text" class="form-control" id="voyageNumber" name="voyageNumber">
                                </div>

                                <div class="mb-3 col-12 col-md-4">
                                    <label for="tradeLine" class="form-label">Jalur Perdagangan</label>
                                    <input type="text" class="form-control" id="tradeLine" name="tradeLine">
                                </div>
                                <div class="mb-3 col-12 col-md-4">
                                    <label for="portCodeOrigin" class="form-label">Kode Pelabuhan Asal</label>
                                    <input type="text" class="form-control" id="portCodeOrigin" name="portCodeOrigin">
                                </div>
                                <div class="mb-3 col-12 col-md-4">
                                    <label for="departureDate" class="form-label">Tanggal Keberangkatan</label>
                                    <input type="date" class="form-control" id="departureDate" name="departureDate">
                                </div>

                                <div class="mb-3 col-12 col-md-3">
                                    <label for="transhipment" class="form-label">Transshipment</label>
                                    <input type="text" class="form-control" id="transhipment" name="transhipment">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="transhipmentDeparture" class="form-label">Keberangkatan
                                        Transshipment</label>
                                    <input type="date" class="form-control" id="transhipmentDeparture"
                                        name="transhipmentDeparture">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="portCodeDestination" class="form-label">Kode Pelabuhan Tujuan</label>
                                    <input type="text" class="form-control" id="portCodeDestination"
                                        name="portCodeDestination">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="arrivalDate" class="form-label">Tanggal Kedatangan</label>
                                    <input type="date" class="form-control" id="arrivalDate" name="arrivalDate">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="duration" class="form-label">Durasi</label>
                                    <input type="number" class="form-control" id="duration" name="duration">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="forwarder" class="form-label">Pengirim</label>
                                    <input type="text" class="form-control" id="forwarder" name="forwarder">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="berthingTerminal" class="form-label">Terminal Sandar</label>
                                    <input type="text" class="form-control" id="berthingTerminal"
                                        name="berthingTerminal">
                                </div>
                                <div class="mb-3 col-12 col-md-3">
                                    <label for="requestQuote" class="form-label">Permintaan Penawaran</label>
                                    <input type="text" class="form-control" id="requestQuote" name="requestQuote">
                                </div>

                                <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                               </div>
                                <?php endif; ?>

                                <?php if (!empty($successMessage)): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $successMessage; ?>
                                </div>
                                <?php endif; ?>

                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php partials("footer.php") ?>
    <?php partials("end.php") ?>
</body>

</html>
