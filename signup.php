<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
        background-color: #1d2630;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Menggunakan 100% tinggi viewport */
    }

    /* Memastikan form berada di tengah */
    .row.justify-content-center {
        width: 100%;
    }

    .col-md-6 {
        max-width: 400px; /* Sesuaikan dengan kebutuhan Anda */
        width: 100%;
        background-color: #ffffff; /* Warna latar belakang */
        border-radius: 8px; /* Membuat sudut border membulat */
        padding: 20px; /* Ruang di dalam elemen */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    }

    /* Style untuk label */
    label {
        font-weight: bold; /* Teks tebal */
    }

    /* Style untuk input */
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
        width: 100%; /* Lebar penuh */
        padding: 10px; /* Ruang di dalam input */
        margin-bottom: 20px; /* Ruang antara input */
        border: 1px solid #ced4da; /* Garis pinggir input */
        border-radius: 4px; /* Membuat sudut border membulat */
    }

    /* Style untuk tombol */
    button[type="submit"] {
        width: 100%; /* Lebar penuh */
        padding: 10px; /* Ruang di dalam tombol */
        background-color: #007bff; /* Warna latar belakang */
        color: #ffffff; /* Warna teks */
        border: none; /* Menghapus border */
        border-radius: 4px; /* Membuat sudut border membulat */
        cursor: pointer; /* Ubah kursor menjadi tanda tangan saat diarahkan */
    }

    /* Style untuk tombol saat dihover */
    button[type="submit"]:hover {
        background-color: #0056b3; /* Warna latar belakang saat dihover */
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Sign Up</h2>
                <form id="signupForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="tel" class="form-control" id="number" name="number" placeholder="Enter Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Menghentikan pengiriman formulir secara default

            // Mendapatkan data formulir
            var formData = new FormData(this);

            // Mengirim data ke s.php menggunakan Fetch API
            fetch("sign_sistem.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Sign up successful!");
                    // Redirect to login page or any other page
                    window.location.href = "login.php";
                } else {
                    alert("Sign up failed. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
