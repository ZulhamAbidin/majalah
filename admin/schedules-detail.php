<?php 
require 'function/init.php'; 

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id_schedules = $_GET['id'];
$sql = 'SELECT * FROM schedules WHERE id_schedules = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_schedules);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan.");
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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Detail</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Schedules Detail</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="container">
                                <div class="row">
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Nama Pengangkut</label>
                                        <p><?php echo htmlspecialchars($data['CarrierName']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Nama Kapal</label>
                                        <p><?php echo htmlspecialchars($data['VesselName']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Nomor Perjalanan</label>
                                        <p><?php echo htmlspecialchars($data['VoyageNumber']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Jalur Perdagangan</label>
                                        <p><?php echo htmlspecialchars($data['TradeLine']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Kode Pelabuhan Asal</label>
                                        <p><?php echo htmlspecialchars($data['PortCodeOrigin']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Tanggal Keberangkatan</label>
                                        <p><?php echo htmlspecialchars($data['DepartureDate']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Transhipment</label>
                                        <p><?php echo htmlspecialchars($data['Transhipment']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Keberangkatan Transhipment</label>
                                        <p><?php echo htmlspecialchars($data['TranshipmentDeparture']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Kode Pelabuhan Tujuan</label>
                                        <p><?php echo htmlspecialchars($data['PortCodeDestination']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Tanggal Kedatangan</label>
                                        <p><?php echo htmlspecialchars($data['ArrivalDate']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Durasi</label>
                                        <p><?php echo htmlspecialchars($data['Duration']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Forwarder</label>
                                        <p><?php echo htmlspecialchars($data['Forwarder']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Terminal Berthing</label>
                                        <p><?php echo htmlspecialchars($data['BerthingTerminal']); ?></p>
                                    </div>
                                    <div class="mb-3 col-6 col-md-4">
                                        <label class="form-label">Permintaan Kutipan</label>
                                        <p><?php echo htmlspecialchars($data['RequestQuote']); ?></p>
                                    </div>
                                    <div class="mb-3 col-12 col-md-12 text-end">
                                        <a href="schedules.php" class="btn btn-primary">Kembali</a>
                                    </div>

                                </div>
                            </div>
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
