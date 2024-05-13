<?php
$conn = mysqli_connect('localhost', 'root', '', 'final');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['namaMinuman']) && isset($_POST['hargaMinuman'])) {
    $namaMinuman = $_POST['namaMinuman'];
    $hargaMinuman = $_POST['hargaMinuman'];

    $sql = "UPDATE tbl_minuman SET harga_minuman='$hargaMinuman' WHERE nama_minuman='$namaMinuman'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data.']);
    }
}

mysqli_close($conn);
?>
