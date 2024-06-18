<?php
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
    direct("login.php");
    die;
}

$id_schedules = $carrierName = $vesselName = $voyageNumber = $tradeLine = $portCodeOrigin = $departureDate = $transhipment = $transhipmentDeparture = $portCodeDestination = $arrivalDate = $duration = $forwarder = $berthingTerminal = $requestQuote = "";

if (isset($_GET['id'])) {
    $id_schedules = $_GET['id'];

    $sql = "SELECT * FROM schedules WHERE id_schedules = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_schedules);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
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
        
        direct("schedules.php");
        die;
    }
} else {
    
    direct("schedules.php");
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
        direct("schedules.php");
        die;
    } else {
        echo "Error: " . $stmt_update->error;
    }
}

$hal = "sch";
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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Edit</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h2 class="mb-0">Schedules Edit</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . htmlspecialchars($id_schedules); ?>"
                                    method="POST">
                                  <div class="row">
                                  <input type="hidden" name="id_schedules"
                                        value="<?php echo htmlspecialchars($id_schedules); ?>">
                                    <div class="col-12 col-md-4">
                                        <label for="carrierName" class="form-label mt-3">Nama Pengangkut</label>
                                        <input type="text" class="form-control" id="carrierName" name="carrierName"
                                            required value="<?php echo htmlspecialchars($carrierName); ?>">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="vesselName" class="form-label mt-3">Nama Kapal</label>
                                        <input type="text" class="form-control" id="vesselName" name="vesselName"
                                            required value="<?php echo htmlspecialchars($vesselName); ?>">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="voyageNumber" class="form-label mt-3">Nomor Perjalanan</label>
                                        <input type="text" class="form-control" id="voyageNumber" name="voyageNumber"
                                            value="<?php echo htmlspecialchars($voyageNumber); ?>">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="tradeLine" class="form-label mt-3">Jalur Perdagangan</label>
                                        <input type="text" class="form-control" id="tradeLine" name="tradeLine"
                                            value="<?php echo htmlspecialchars($tradeLine); ?>">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="portCodeOrigin" class="form-label mt-3">Kode Pelabuhan Asal</label>
                                        <input type="text" class="form-control" id="portCodeOrigin"
                                            name="portCodeOrigin"
                                            value="<?php echo htmlspecialchars($portCodeOrigin); ?>">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="departureDate" class="form-label mt-3">Tanggal Keberangkatan</label>
                                        <input type="date" class="form-control" id="departureDate" name="departureDate"
                                            value="<?php echo htmlspecialchars($departureDate); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="transhipment" class="form-label mt-3">Pengangkutan Ulang</label>
                                        <input type="text" class="form-control" id="transhipment" name="transhipment"
                                            value="<?php echo htmlspecialchars($transhipment); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="transhipmentDeparture" class="form-label mt-3">Tanggal Keberangkatan
                                            Transhipment</label>
                                        <input type="date" class="form-control" id="transhipmentDeparture"
                                            name="transhipmentDeparture"
                                            value="<?php echo htmlspecialchars($transhipmentDeparture); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="portCodeDestination" class="form-label mt-3">Kode Pelabuhan
                                            Tujuan</label>
                                        <input type="text" class="form-control" id="portCodeDestination"
                                            name="portCodeDestination"
                                            value="<?php echo htmlspecialchars($portCodeDestination); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="arrivalDate" class="form-label mt-3">Tanggal Kedatangan</label>
                                        <input type="date" class="form-control" id="arrivalDate" name="arrivalDate"
                                            value="<?php echo htmlspecialchars($arrivalDate); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="duration" class="form-label mt-3">Durasi</label>
                                        <input type="text" class="form-control" id="duration" name="duration"
                                            value="<?php echo htmlspecialchars($duration); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="forwarder" class="form-label mt-3">Eksportir</label>
                                        <input type="text" class="form-control" id="forwarder" name="forwarder"
                                            value="<?php echo htmlspecialchars($forwarder); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="berthingTerminal" class="form-label mt-3">Terminal Berlabuh</label>
                                        <input type="text" class="form-control" id="berthingTerminal"
                                            name="berthingTerminal"
                                            value="<?php echo htmlspecialchars($berthingTerminal); ?>">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="requestQuote" class="form-label mt-3">Permintaan Penawaran</label>
                                        <input class="form-control" id="requestQuote" name="requestQuote"
                                            value="<?php echo htmlspecialchars($requestQuote); ?>"></input>
                                    </div>
                                    <div class="col-12 text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="schedules.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                  </div>
                                </form>
                            </div>

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
