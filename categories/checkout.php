<?php
if (!isset($_GET['title']) || !isset($_GET['price'])) {
    die("Game tidak ditemukan!");
}

$title = urldecode($_GET['title']);
$price = urldecode($_GET['price']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - <?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Checkout</h2>
        <p>Anda akan membeli: <strong><?= htmlspecialchars($title) ?></strong></p>
        <p>Harga: <strong>Rp <?= number_format($price, 0, ',', '.') ?></strong></p>

        <form id="payment-form" method="POST" action="process_checkout.php">
            <input type="hidden" name="snapToken" id="snapToken">
            <input type="hidden" name="title" value="<?= htmlspecialchars($title) ?>">
            <input type="hidden" name="price" value="<?= htmlspecialchars($price) ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="button" id="pay-button" class="btn btn-success">Bayar Sekarang</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            if (!name || !email) {
                alert('Harap isi nama dan email terlebih dahulu!');
                return;
            }

            fetch('snap_token.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    title: "<?= $title ?>",
                    price: "<?= $price ?>",
                    name: name,
                    email: email
                })
            })
            .then(response => response.json())
            .then(data => {
                snap.pay(data.token, {
                    onSuccess: function (result) {
                        document.getElementById('snapToken').value = data.token;
                        document.getElementById('payment-form').submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
