<?php
require 'admin/function/init.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';

if ($query) {
    $sql = 'SELECT id_majalah, judul, cover, edisi 
            FROM majalah 
            WHERE judul LIKE ? OR edisi LIKE ? 
            ORDER BY id_majalah DESC';
    $stmt = $conn->prepare($sql);
    $search_term = '%' . $query . '%';
    $stmt->bind_param('ss', $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();
    $majalah = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Jika tidak ada query, ambil semua majalah
    $majalah = query_select('majalah', ['orderby' => 'id_majalah DESC']);
}

if ($majalah) {
    foreach ($majalah as $item) {
        echo '<div class="col-sm-12 col-xl-4 mb-4">
                <div class="card product-card">
                    <div class="card-img-top">
                        <a href="majalah-detail.php?id=' . $item['id_majalah'] . '">
                            <img src="admin/assets/img/' . $item['cover'] . ' " width="100%" alt="image" class="img-prod img-fluid">
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="majalah-detail.php?id=' . $item['id_majalah'] . '">
                            <p class="prod-content mb-0 text-muted text-center fw-semibold">' . $item['judul'] . '</p>
                        </a>
                        <div class=" mt-2">
                            <h4 class="mb-0 text-truncate text-center">Edisi <b>' . $item['edisi'] . '</b></h4>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<div class="col-12"><p class="text-center">Tidak ada hasil ditemukan untuk pencarian Anda.</p></div>';
}
?>
