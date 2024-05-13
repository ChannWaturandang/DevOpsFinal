<?php
$conn = mysqli_connect('localhost', 'root', '', 'final');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['namaMinuman'])) {
    $namaMinuman = $_POST['namaMinuman'];

    $sql = "DELETE FROM tbl_minuman WHERE nama_minuman = '$namaMinuman'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data.']);
    }
}

mysqli_close($conn);
?>
