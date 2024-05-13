

<?php
include "../makanan.php";

$conn = mysqli_connect('localhost', 'root', '', 'final');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitedit']) && isset($_POST['hargaMakanan'])) {
    $namaMakanan = $_POST['namaMakanan'];
    $hargaMakanan = $_POST['hargaMakanan'];

    $sql = "UPDATE tbl_makanan SET harga_makanan='$hargaMakanan' WHERE nama_makanan='$namaMakanan'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data.']);
    }
}

else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

mysqli_close($conn);
