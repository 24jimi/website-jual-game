<?php
require 'vendor/autoload.php'; // Pastikan kamu sudah menginstall Midtrans SDK via Composer

// Set konfigurasi Midtrans
\Midtrans\Config::$serverKey = 'YOUR_SERVER_KEY';
\Midtrans\Config::$isProduction = false; // Gunakan true jika di mode live
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Ambil data dari request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$order_id = uniqid(); // Generate Order ID unik

$transaction_details = [
    'order_id' => $order_id,
    'gross_amount' => (int)$input['price'], // Total harga
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
