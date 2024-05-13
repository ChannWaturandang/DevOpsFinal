<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Minuman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <!-- kiri -->
        <div class="kiri">
            <div class="wrap"></div>
            <img id="profile-img" src="./image/user.png" alt="Profile">
            <h2>User</h2>
            <hr>
            <a class="btn btn-primary mb-2" href="home.php">Home</a>
            <a class="btn btn-primary mb-2" href="makanan.php">Makanan</a>
            <a class="btn btn-primary" href="minuman.php">Minuman</a>
            <a class="btn btn-primary" href="settings.php">Settings</a>
            <a class="btn btn-primary" href="about.php">About</a>
        </div>

        <!-- kanan -->
        <div class="datm fluid">
            <h1>Data Minuman</h1>
            <div class="kanan">
                <!-- Button -->
                <div class="data2">
                    <input type="text" id="search-input" placeholder="Cari minuman...">
                    <button id="search-button">Cari</button>
                    <button class="menu-button btn-success" data-bs-toggle="modal" data-bs-target="#insertModal">Tambah
                        Data Baru</button>

                    <table id="minuman-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th class="text-center">Nama Minuman</th>
                                <th class="text-center">Harga Minuman</th>
                                <th class="text-center">Dibuat Pada</th>
                                <th class="text-center">Diperbarui Pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kode PHP untuk menampilkan data minuman
                            $conn = mysqli_connect('localhost', 'root', '', 'final');

                            if (!$conn) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }

                            $sql = "SELECT nama_minuman, harga_minuman, created_at, updated_at FROM tbl_minuman";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['nama_minuman'] . "</td>";
                                    echo "<td> Rp. " . $row['harga_minuman'] . "</td>";
                                    echo "<td>" . $row['created_at'] . "</td>";
                                    echo "<td>" . $row['updated_at'] . "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<button class='btn btn-primary edit-button' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>";
                                    echo "<button class='btn btn-danger delete-button'>Hapus</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Tidak ada data minuman.</td></tr>";
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- insert new modal -->
                <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel"
                    aria-hidden="true">
                    <!-- Modal untuk menambahkan data baru -->
                    <div class="modal-dialog">
                        <!-- Isi form untuk memasukkan data baru -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="insertModalLabel">Tambah Data Baru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="insertForm" method="POST" action="insert.php">
                                    <div class="mb-3">
                                        <label for="insertNamaMinuman" class="form-label">Nama Minuman</label>
                                        <input type="text" class="form-control" name="insertNamaMinuman"
                                            id="insertNamaMinuman" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="insertHargaMinuman" class="form-label">Harga Minuman</label>
                                        <input type="text" class="form-control" name="insertHargaMinuman"
                                            id="insertHargaMinuman" required>
                                    </div>

                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="submit"
                                        id="insertDataButton">Tambah
                                        Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <!-- Modal untuk mengedit data -->
                    <div class="modal-dialog">
                        <!-- Isi form untuk mengedit data -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Data Minuman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="editNamaMinuman" class="form-label">Nama Minuman</label>
                                        <input type="text" class="form-control" name="editNamaMinuman"
                                            id="editNamaMinuman" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editHargaMinuman" class="form-label">Harga Minuman</label>
                                        <input type="text" class="form-control" name="editHargaMinuman"
                                            id="editHargaMinuman" required>
                                    </div>

                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="saveChangesButton">Simpan
                                        Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                    aria-hidden="true">
                    <!-- Modal untuk konfirmasi hapus -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JavaScript untuk operasi CRUD -->
                <script>
                    // functions.js

                    document.addEventListener('DOMContentLoaded', function () {
                        const searchInput = document.getElementById('search-input');
                        const searchButton = document.getElementById('search-button');
                        const minumanTable = document.getElementById('minuman-table');
                        const saveChangesButton = document.getElementById('saveChangesButton');
                        const insertDataButton = document.getElementById('insertDataButton');
                        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
                        const editModal = new bootstrap.Modal(document.getElementById('editModal'));

                        searchButton.addEventListener('click', () => {
                            const searchTerm = searchInput.value.toLowerCase();
                            const rows = minumanTable.rows;

                            for (let i = 1; i < rows.length; i++) {
                                const cells = rows[i].cells;
                                const shouldShow = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchTerm));

                                if (shouldShow) {
                                    rows[i].style.display = '';
                                } else {
                                    rows[i].style.display = 'none';
                                }
                            }
                        });

                        searchInput.addEventListener('input', () => {
                            searchButton.click();
                        });

                        minumanTable.addEventListener('click', (event) => {
                            const target = event.target;

                            if (target.classList.contains('edit-button')) {
                                const row = target.closest('tr');
                                const idMinuman = row.cells[0].getAttribute('data-id');
                                const namaMinuman = row.cells[1].textContent;
                                const hargaMinuman = row.cells[2].textContent;

                                document.getElementById('editIdMinuman').value = idMinuman;
                                document.getElementById('editNamaMinuman').value = namaMinuman;
                                document.getElementById('editHargaMinuman').value = hargaMinuman;
                                editModal.show();
                            } else if (target.classList.contains('delete-button')) {
                                const row = target.closest('tr');
                                const idMinuman = row.cells[0].getAttribute('data-id');

                                const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                                confirmDeleteModal.show();

                                confirmDeleteButton.addEventListener('click', () => {
                                    const xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'functions.php');
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                    const data = `submit=delete&deleteIdMinuman=${encodeURIComponent(idMinuman)}`;

                                    xhr.onload = function () {
                                        if (xhr.status === 200) {
                                            alert(xhr.responseText);
                                            location.reload();
                                        } else {
                                            alert('Gagal menghapus data. Silakan coba lagi.');
                                        }
                                    };

                                    xhr.send(data);

                                    confirmDeleteModal.hide();
                                });
                            }
                        });

                        insertDataButton.addEventListener('click', function () {
                            const namaMinuman = document.getElementById('insertNamaMinuman').value;
                            const hargaMinuman = document.getElementById('insertHargaMinuman').value;

                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'functions.php');
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                            const data = `submit=insert&insertNamaMinuman=${encodeURIComponent(namaMinuman)}&insertHargaMinuman=${encodeURIComponent(hargaMinuman)}`;

                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    alert(xhr.responseText);
                                    location.reload();
                                } else {
                                    alert('Gagal memasukkan data. Silakan coba lagi.');
                                }
                            };

                            xhr.send(data);
                        });

                        saveChangesButton.addEventListener('click', () => {
                            const idMinuman = document.getElementById('editIdMinuman').value;
                            const namaMinuman = document.getElementById('editNamaMinuman').value;
                            const hargaMinuman = document.getElementById('editHargaMinuman').value;

                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'functions.php');
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                            const data = `submit=update&editIdMinuman=${encodeURIComponent(idMinuman)}&editNamaMinuman=${encodeURIComponent(namaMinuman)}&editHargaMinuman=${encodeURIComponent(hargaMinuman)}`;

                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    alert(xhr.responseText);
                                    location.reload();
                                } else {
                                    alert('Gagal menyimpan perubahan. Silakan coba lagi.');
                                }
                            };

                            xhr.send(data);
                        });
                    });

                </script>

                <!-- Bootstrap JS dan Popper.js -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </div>
        </div>
    </div>
</body>

</html>