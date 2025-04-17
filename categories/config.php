<?php
$host = "sql105.infinityfree.com";
$user = "f0_38731845"; // Ganti jika ada username lain
$pass = "immortals2426"; // Ganti jika ada password
$dbname = "if0_38731845_amba_gaming";

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
