<?php
// Tambahkan ini di awal file untuk melihat error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek keberadaan file
$test_image = './images/rdr.jpg';
if (file_exists($test_image)) {
    echo "File exists!";
} else {
    echo "File not found: " . $test_image;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action & Adventure Games - AmbaGaming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #0f1923;
            color: #e5e5e5;
        }

        .navbar-custom {
            background-color: #1a2634;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .game-card {
            background-color: #1a2634;
            border: 1px solid #2a3744;
            transition: 0.3s;
            height: 100%;
        }

        .game-card:hover {
            transform: translateY(-5px);
            border-color: #00ff9d;
            box-shadow: 0 4px 15px rgba(0, 255, 157, 0.2);
        }

        .game-card img {
            height: 300px;
            object-fit: cover;
        }

        .game-card .card-title {
            color: #00ff9d;
        }

        .price {
            color: #00ff9d;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #00ff9d;
            border: none;
            color: #0f1923;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #00cc7d;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 255, 157, 0.3);
        }

        .back-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .category-header {
            background: linear-gradient(rgba(15, 25, 35, 0.9), rgba(15, 25, 35, 0.9)),
                        url('https://source.unsplash.com/1600x400/?action-game') no-repeat center center;
            background-size: cover;
            padding: 60px 0;
            margin-bottom: 40px;
            border-bottom: 4px solid #00ff9d;
        }

        .game-image-container {
            position: relative;
            overflow: hidden;
            height: 300px;
        }

        .game-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            max-width: 100%;
        }

        .game-card:hover .game-image-container img {
            transform: scale(1.05);
        }

        .platform, .release-date {
            font-size: 0.9rem;
            color: #8a8a8a;
            margin-bottom: 0.5rem;
        }

        .platform i, .release-date i {
            margin-right: 5px;
            color: #00ff9d;
        }

        /* Tambahkan style untuk logo */
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-container {
            background: linear-gradient(45deg, #00ff9d, #00cc7d);
            padding: 8px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 15px rgba(0, 255, 157, 0.3);
            transition: all 0.3s ease;
        }

        .logo-container:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 255, 157, 0.5);
        }

        .logo-icon {
            font-size: 1.8rem;
            color: #0f1923;
        }

        .brand-text {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #00ff9d, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 10px rgba(0, 255, 157, 0.3);
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo-container:hover .logo-icon {
            animation: rotate 1s linear infinite;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="category-header">
        <div class="container">
            <h1 class="text-center mb-3">Action & Adventure Games</h1>
            <p class="text-center lead">Jelajahi koleksi game action dan adventure terbaik kami</p>
        </div>
    </div>

    <!-- Ubah bagian navbar brand -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand brand-logo" href="#">
                <div class="logo-container">
                    <i class="fas fa-gamepad logo-icon"></i>
                    <i class="fas fa-vr-cardboard logo-icon ms-1"></i>
                </div>
                <span class="brand-text">AmbaGaming</span>
            </a>
            <!-- ... existing navbar code ... -->
        </div>
    </nav>

    <!-- Games Section -->
    <div class="container mb-5">
        <div class="row g-4">
            <?php
            $games = [
                [
                    'title' => 'Red Dead Redemption 2',
                    'image' => './images/rdr.jpg',
                    'description' => 'Petualangan epik di Wild West dengan grafis memukau dan cerita yang mendalam.',
                    'price' => 'Rp 599.000',
                    'rating' => '9.8/10',
                    'platform' => 'PC, PS4, Xbox One',
                    'release_date' => '26 Oktober 2018'
                ],
                [
                    'title' => 'God of War Ragnarök',
                    'image' => './images/gow.jpg',
                    'description' => 'Lanjutan kisah epik Kratos dan Atreus dalam mitologi Norse.',
                    'price' => 'Rp 799.000',
                    'rating' => '9.7/10',
                    'platform' => 'PS4, PS5',
                    'release_date' => '9 November 2022'
                ],
                [
                    'title' => 'Assassin\'s Creed Valhalla',
                    'image' => './images/valhalla.jpg',
                    'description' => 'Jelajahi era Viking dalam petualangan open-world yang menakjubkan.',
                    'price' => 'Rp 499.000',
                    'rating' => '9.0/10',
                    'platform' => 'PC, PS4, PS5, Xbox One, Xbox Series X/S',
                    'release_date' => '10 November 2020'
                ],
                [
                    'title' => 'The Last of Us Part II',
                    'image' => './images/lastofast.jpg',
                    'description' => 'Game survival horror dengan narasi mendalam dan gameplay yang intens.',
                    'price' => 'Rp 699.000',
                    'rating' => '9.5/10',
                    'platform' => 'PS4, PS5',
                    'release_date' => '19 Juni 2020'
                ],
                [
                    'title' => 'Elden Ring',
                    'image' => './images/ring.jpg',
                    'description' => 'RPG action yang menantang dalam dunia fantasi yang luas.',
                    'price' => 'Rp 799.000',
                    'rating' => '9.6/10',
                    'platform' => 'PC, PS4, PS5, Xbox One, Xbox Series X/S',
                    'release_date' => '25 Februari 2022'
                ],
                [
                    'title' => 'Horizon Forbidden West',
                    'image' => './images/horizon.jpg',
                    'description' => 'Petualangan sci-fi yang memukau dengan grafis next-gen.',
                    'price' => 'Rp 699.000',
                    'rating' => '9.3/10',
                    'platform' => 'PS4, PS5',
                    'release_date' => '18 Februari 2022'
                ]
            ];

            foreach ($games as $game) {
                echo '<div class="col-md-4">
                    <div class="card game-card">
                        <div class="game-image-container">
                            <img src="' . $game['image'] . '" class="card-img-top" alt="' . $game['title'] . '">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . $game['title'] . '</h5>
                            <p class="card-text">' . $game['description'] . '</p>
                            <p class="platform"><i class="fas fa-desktop"></i> ' . $game['platform'] . '</p>
                            <p class="release-date"><i class="far fa-calendar-alt"></i> ' . $game['release_date'] . '</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="price">' . $game['price'] . '</span>
                                <span class="rating"><i class="fas fa-star text-warning"></i> ' . $game['rating'] . '</span>
                            </div>
                            <div class="d-grid">
                                <a href="checkout.php?title=' . urlencode($game['title']) . '&price=' . intval(str_replace(['Rp', '.', ','], '', $game['price'])) . '" class="btn btn-primary">Beli Sekarang</a>

                            </div>
                        </div>
                    </div>
                </div>';
            }
            
            
            ?>
        </div>
    </div>

    <!-- Back Button -->
    <a href="../index.php" class="btn btn-primary back-button">
        <i class="fas fa-arrow-left"></i> Kembali ke Beranda
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 