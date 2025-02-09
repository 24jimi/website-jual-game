<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM orders WHERE id = $id");
}

echo "<script>alert('Pesanan dihapus!'); window.location.href='orders.php';</script>";
?>
