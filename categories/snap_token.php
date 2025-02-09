<?php
require __DIR__ . '/../vendor/autoload.php';
// Pastikan sudah install Midtrans SDK dengan Composer

// Set konfigurasi Midtrans
\Midtrans\Config::$serverKey = 'SB-Mid-server-vRjgBJH5GmiaZQhwcQaCz0ub';
\Midtrans\Config::$isProduction = false; // Ganti true jika di mode live
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Ambil data dari request
header("Content-Type: application/json");

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

// Pastikan data yang dikirim tidak kosong atau null
if (!isset($input['title']) || !isset($input['price']) || !isset($input['name']) || !isset($input['email'])) {
    echo json_encode(['error' => 'Data tidak lengkap']);
    exit;
}

$order_id = 'ORDER-' . uniqid(); // Order ID unik

$transaction_details = [
    'order_id' => $order_id,
    'gross_amount' => (int)$input['price'], // Total harga harus integer
];

$customer_details = [
    'first_name' => $input['name'],
    'email' => $input['email'],
];

$item_details = [
    [
        'id' => 'game-' . uniqid(),
        'price' => (int)$input['price'],
        'quantity' => 1,
        'name' => $input['title'],
    ]
];

$transaction = [
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
];

try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(['token' => $snapToken]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
