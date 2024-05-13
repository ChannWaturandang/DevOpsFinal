<?php
// Set response content type
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
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

    // // Encrypt password
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into database
    $query = "INSERT INTO tbl_login (username, email, number, password) VALUES ('$username', '$email', '$number', '$password')";

    if ($conn->query($query) === TRUE) {
        // If insertion successful, set 'success' to true
        $response['success'] = true;
    } else {
        // If insertion failed, set 'success' to false
        $response['success'] = false;
    }

    // Close database connection
    $conn->close();

    // Mengembalikan response dalam format JSON
    echo json_encode($response);
}
?>
