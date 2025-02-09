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
    <style>
        /* Gaya dasar */
body {
    background-color: #0f1923;
    color: #e5e5e5;
    font-family: 'Poppins', sans-serif;
    padding: 20px;
}

/* Container Checkout */
.checkout-container {
    max-width: 600px;
    margin: auto;
    background: #1a2634;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 255, 157, 0.3);
}

/* Header */
.checkout-title {
    text-align: center;
    color: #00ff9d;
    font-size: 26px;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 20px;
}

/* Input Fields */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    color: #00ff9d;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 2px solid #00ff9d;
    border-radius: 5px;
    background-color: #0f1923;
    color: #e5e5e5;
    transition: 0.3s;
}

.form-control:focus {
    border-color: #00cc7d;
    box-shadow: 0px 0px 8px rgba(0, 255, 157, 0.5);
    outline: none;
}

/* Tombol Checkout */
.btn-checkout {
    width: 100%;
    padding: 12px;
    background-color: #00ff9d;
    color: #0f1923;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-checkout:hover {
    background-color: #00cc7d;
    transform: translateY(-2px);
    box-shadow: 0px 4px 10px rgba(0, 255, 157, 0.4);
}

/* Box Game Info */
.game-info {
    background: linear-gradient(45deg, #00ff9d, #00cc7d);
    padding: 15px;
    border-radius: 8px;
    text-align: center;
    color: #0f1923;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Animasi */
@keyframes glow {
    0% { box-shadow: 0 0 5px rgba(0, 255, 157, 0.3); }
    50% { box-shadow: 0 0 15px rgba(0, 255, 157, 0.6); }
    100% { box-shadow: 0 0 5px rgba(0, 255, 157, 0.3); }
}

.checkout-container:hover {
    animation: glow 1.5s infinite alternate;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Checkout</h2>
        <p>Anda akan membeli: <strong><?= htmlspecialchars($title) ?></strong></p>
        <p>Harga: <strong><?= htmlspecialchars($price) ?></strong></p>

        <form action="process_checkout.php" method="POST">
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

            <div class="mb-3">
                <label for="payment" class="form-label">Metode Pembayaran</label>
                <select class="form-control" id="payment" name="payment">
                    <option value="bank_transfer">Transfer Bank</option>
                    <option value="gopay">GoPay</option>
                    <option value="ovo">OVO</option>
                    <option value="dana">DANA</option>
                    <option value="credit_card">Kartu Kredit</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Bayar Sekarang</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
