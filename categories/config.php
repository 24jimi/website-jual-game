<?php
$host = "localhost";
$user = "root"; // Ganti jika ada username lain
$pass = ""; // Ganti jika ada password
$dbname = "amba_gaming";

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
