<?php
require 'admin/function/init.php';

$halaman = "Detail Produk";

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
?>

<?php require 'comp/header.php'; ?>
<?php require 'comp/navbar.php'; ?>
<div class="container">
<div class="container mt-5">
        <h2>Detail Jadwal</h2>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Nama Pengangkut</th>
                <td><?php echo htmlspecialchars($data['CarrierName']); ?></td>
            </tr>
            <tr>
                <th>Nama Kapal</th>
                <td><?php echo htmlspecialchars($data['VesselName']); ?></td>
            </tr>
            <tr>
                <th>Nomor Perjalanan</th>
                <td><?php echo htmlspecialchars($data['VoyageNumber']); ?></td>
            </tr>
            <tr>
                <th>Jalur Perdagangan</th>
                <td><?php echo htmlspecialchars($data['TradeLine']); ?></td>
            </tr>
            <tr>
                <th>Kode Pelabuhan Asal</th>
                <td><?php echo htmlspecialchars($data['PortCodeOrigin']); ?></td>
            </tr>
            <tr>
                <th>Tanggal Keberangkatan</th>
                <td><?php echo htmlspecialchars($data['DepartureDate']); ?></td>
            </tr>
            <tr>
                <th>Transhipment</th>
                <td><?php echo htmlspecialchars($data['Transhipment']); ?></td>
            </tr>
            <tr>
                <th>Keberangkatan Transhipment</th>
                <td><?php echo htmlspecialchars($data['TranshipmentDeparture']); ?></td>
            </tr>
            <tr>
                <th>Kode Pelabuhan Tujuan</th>
                <td><?php echo htmlspecialchars($data['PortCodeDestination']); ?></td>
            </tr>
            <tr>
                <th>Tanggal Kedatangan</th>
                <td><?php echo htmlspecialchars($data['ArrivalDate']); ?></td>
            </tr>
            <tr>
                <th>Durasi</th>
                <td><?php echo htmlspecialchars($data['Duration']); ?></td>
            </tr>
            <tr>
                <th>Forwarder</th>
                <td><?php echo htmlspecialchars($data['Forwarder']); ?></td>
            </tr>
            <tr>
                <th>Terminal Berthing</th>
                <td><?php echo htmlspecialchars($data['BerthingTerminal']); ?></td>
            </tr>
            <tr>
                <th>Permintaan Kutipan</th>
                <td><?php echo htmlspecialchars($data['RequestQuote']); ?></td>
            </tr>
        </table>
        <a href="schedules.php" class="btn btn-primary">Kembali</a>
    </div>
  </div>
</div>



<?php include 'Comp/footer.php'; ?>

  
