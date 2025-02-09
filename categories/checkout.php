<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - <?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-w0psZSh9XiCObQSy"></script>
    <style>
        body {
            background-color: #0d1117;
            color: #c9d1d9;
            font-family: 'Arial', sans-serif;
        }
        .checkout-container {
            max-width: 500px;
            margin: auto;
            background: #161b22;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 170, 255, 0.5);
        }
        h2 {
            text-align: center;
            color: #00aaff;
        }
        .btn-primary {
            background-color: #0077cc;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background-color: #005fa3;
        }
        .btn-secondary {
            background-color: #444c56;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #33393f;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="checkout-container">
            <h2>Checkout</h2>
            <p>Anda akan membeli: <strong><?= htmlspecialchars($title) ?></strong></p>
            <p>Harga: Rp <?= number_format((float) str_replace(['Rp', '.', ','], '', $price), 0, ',', '.') ?></p>
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
                <button type="button" id="pay-button" class="btn btn-primary w-100">Bayar Sekarang</button>
                <a href="../index.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const price = <?= $price ?>;
            const title = "<?= $title ?>";

            if (!name || !email) {
                alert("Harap isi semua data!");
                return;
            }

            fetch('snap_token.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title, price, name, email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    snap.pay(data.token);
                } else {
                    alert("Gagal mendapatkan token pembayaran!");
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
