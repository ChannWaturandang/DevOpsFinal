<?php
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'final');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insertNamaMinuman']) && isset($_POST['insertHargaMinuman'])) {
    $namaMinuman = $_POST['insertNamaMinuman'];
    $hargaMinuman = $_POST['insertHargaMinuman'];

    // Validasi harga harus berupa angka
    if (!is_numeric($hargaMinuman)) {
        echo json_encode(['status' => 'error', 'message' => 'Harga minuman harus berupa angka.']);
        exit; // Stop eksekusi jika harga bukan angka
    }

    // Insert data ke dalam tabel
    $sql = "INSERT INTO tbl_minuman(nama_minuman, harga_minuman) VALUES ('$namaMinuman', '$hargaMinuman')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan data.']);
        exit;
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>
