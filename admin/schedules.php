<!-- http://localhost/webmajalah/admin/schedules.php -->

<?php
require_once 'function/init.php';

if (!isset($_SESSION[KEY]['login'])) {
    direct('login.php');
    die();
}

$sql = 'SELECT id_schedules, CarrierName, VesselName, VoyageNumber, TradeLine, DepartureDate, ArrivalDate FROM schedules';
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql_delete = 'DELETE FROM schedules WHERE id_schedules = ?';
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
        exit();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete schedule.']);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php partials('head.php'); ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <?php partials('aside.php'); ?>

    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <?php partials('nav.php'); ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card" style="min-height: 70vh">
                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-4">
                                <h6 class="mb-0">Daftar Jadwal</h6>
                                <a href="schedules-add.php" class="btn btn-sm bg-gradient-secondary">Tambah
                                Daftar Jadwal</a>
                            </div>

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
                                                <a href="schedules-edit.php?id=<?php echo htmlspecialchars($row['id_schedules']); ?>"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="<?php echo htmlspecialchars($row['id_schedules']); ?>">Delete</button>
                                                    <a href="schedules-detail.php?id=<?php echo htmlspecialchars($row['id_schedules']); ?>" class="btn btn-sm btn-info">Detail</a>
                                                </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="8">Belum ada data schedules.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <?php partials('footer.php'); ?>

        </div>

    </main>

    <?php partials('end.php'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    deleteSchedule(id);
                });
            });

            function deleteSchedule(id) {
                fetch('schedules.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'delete_id=' + id,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Remove the row from the table if deletion was successful
                        if (data.success) {
                            document.getElementById('schedule-' + id).remove();
                        } else {
                            alert('Failed to delete schedule: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting schedule:', error);
                    });
            }
        });
    </script>
</body>

</html>
