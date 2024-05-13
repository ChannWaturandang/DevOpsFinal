<?php
$conn = mysqli_connect('localhost', 'root', '', 'final');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['namaMakanan'])) {
    $namaMakanan = $_POST['namaMakanan'];

    $sql = "DELETE FROM tbl_makanan WHERE nama_makanan = '$namaMakanan'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data.']);
    }
}

mysqli_close($conn);

