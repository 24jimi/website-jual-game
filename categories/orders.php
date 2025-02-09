<?php
require 'config.php';

$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Pesanan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Game</th>
                    <th>Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['game_title']) ?></td>
                        <td><?= htmlspecialchars($row['price']) ?></td>
                        <td><?= htmlspecialchars($row['payment_method']) ?></td>
                        <td>
                            <a href="edit_order.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_order.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pesanan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 3000); // Redirect setelah 3 detik
</script>

</body>
</html>
