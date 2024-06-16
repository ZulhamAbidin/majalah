<?php
require 'admin/function/init.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';

if ($query) {
    $sql = 'SELECT id_berita, judul, isi, gambar 
            FROM berita 
            WHERE judul LIKE ? OR isi LIKE ? 
            ORDER BY id_berita DESC';
    $stmt = $conn->prepare($sql);
    $search_term = '%' . $query . '%';
    $stmt->bind_param('ss', $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();
    $berita = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Jika tidak ada query, ambil semua berita
    $berita = query_select('berita', ['orderby' => 'id_berita DESC']);
}

if ($berita) {
    foreach ($berita as $item) {
        echo '<div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body mt-2">
                        <h5 class="mb-3">' . $item['judul'] . '</h5>
                        <p class="text-muted">' . substr($item['isi'], 0, 150) . '</p>
                        <img class="pt-2" alt="image" src="admin/assets/img/' . $item['gambar'] . '" width="100%">
                        <a class="btn btn-light-dark mt-3" href="detail.php?id=' . $item['id_berita'] . '">Lihat Detail Berita <i class="ti ti-external-link"></i></a>
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<div class="col-12"><p class="text-center">Tidak ada hasil ditemukan untuk pencarian Anda.</p></div>';
}
?>
