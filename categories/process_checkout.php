<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $payment = $_POST['payment'];

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO orders (name, email, game_title, price, payment_method) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $title, $price, $payment);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil!'); window.location.href='orders.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
