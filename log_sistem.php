<?php
// Set response content type
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "final"; // Ganti nama_database dengan nama database Anda

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname); // Tambahkan nama database sebagai parameter keempat

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if username and password exist in database
    $query = "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    // Prepare response data
    $response = array();

    if ($result->num_rows == 1) {
        // Jika username dan password benar, set 'success' menjadi true
        $response['success'] = true;
    } else {
        // Jika username dan password salah, set 'success' menjadi false
        $response['success'] = false;
        
    }

    // Close database connection
    $conn->close();

    // Mengembalikan response dalam format JSON
    echo json_encode($response);
}

