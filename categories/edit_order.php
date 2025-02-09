<?php
require 'config.php';

if (!isset($_GET['id'])) {
    die("ID pesanan tidak ditemukan!");
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM orders WHERE id = $id");
$order = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];

    $stmt = $conn->prepare("UPDATE orders SET name=?, email=?, payment_method=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $payment, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan diperbarui!'); window.location.href='orders.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pesanan</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nama:</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($order['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($order['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Metode Pembayaran:</label>
                <select name="payment" class="form-control">
                    <option value="bank_transfer" <?= $order['payment_method'] == 'bank_transfer' ? 'selected' : '' ?>>Transfer Bank</option>
                    <option value="gopay" <?= $order['payment_method'] == 'gopay' ? 'selected' : '' ?>>GoPay</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="orders.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
