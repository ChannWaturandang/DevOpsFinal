<?php
// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'final');

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insertNamaMakanan']) && isset($_POST['insertHargaMakanan'])) {
    $namaMakanan = $_POST['insertNamaMakanan'];
    $hargaMakanan = $_POST['insertHargaMakanan'];

    // Validasi harga harus berupa angka
    if (!is_numeric($hargaMakanan)) {
        echo json_encode(['status' => 'error', 'message' => 'Harga makanan harus berupa angka.']);
        exit; // Stop eksekusi jika harga bukan angka
    }

    // Insert data ke dalam tabel
    $sql = "INSERT INTO tbl_makanan(nama_makanan, harga_makanan) VALUES ('$namaMakanan', '$hargaMakanan')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan data.']);
        exit;
    }
}

// Tutup koneksi database
mysqli_close($conn);

