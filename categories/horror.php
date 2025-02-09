<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horror & Survival Games - AmbaGaming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Style yang sama dengan sebelumnya */
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
            border-color: #ff0000;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
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

        .game-card .card-title {
            color: #ff3333;
        }

        .price {
            color: #ff3333;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #ff3333;
            border: none;
            color: #ffffff;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #cc0000;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        }

        .category-header {
            background: linear-gradient(rgba(15, 25, 35, 0.9), rgba(15, 25, 35, 0.9)),
                        url('https://source.unsplash.com/1600x400/?horror') no-repeat center center;
            background-size: cover;
            padding: 60px 0;
            margin-bottom: 40px;
            border-bottom: 4px solid #ff3333;
        }

        .platform, .release-date {
            font-size: 0.9rem;
            color: #8a8a8a;
            margin-bottom: 0.5rem;
        }

        .platform i, .release-date i {
            margin-right: 5px;
            color: #ff3333;
        }

        .back-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        /* Logo styles dengan tema horror */
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-container {
            background: linear-gradient(45deg, #ff3333, #cc0000);
            padding: 8px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .logo-container:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(255, 0, 0, 0.7);
            background: linear-gradient(45deg, #ff0000, #990000);
        }

        .logo-icon {
            font-size: 1.8rem;
            color: #ffffff;
        }

        .brand-text {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ff3333, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
            animation: flicker 2s infinite;
        }

        /* Tambahkan animasi rotasi */
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo-container:hover .logo-icon {
            animation: rotate 1s linear infinite;
        }

        /* Tambahkan efek flicker untuk tema horror */
        @keyframes flicker {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="category-header">
        <div class="container">
            <h1 class="text-center mb-3">Horror & Survival Games</h1>
            <p class="text-center lead">Rasakan sensasi mencekam dalam koleksi game horror terbaik kami</p>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand brand-logo" href="../index.php">
                <div class="logo-container">
                    <i class="fas fa-ghost logo-icon"></i>
                    <i class="fas fa-skull logo-icon ms-1"></i>
                </div>
                <span class="brand-text">AmbaGaming</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#products">Kategori Game</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#about">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Games Section -->
    <div class="container mb-5">
        <div class="row g-4">
            <?php
            $games = [
                [
                    'title' => 'Resident Evil 4 Remake',
                    'image' => './images/evil.jpg',
                    'description' => 'Remake legendaris dengan grafis modern dan gameplay yang ditingkatkan.',
                    'price' => 'Rp 799.000',
                    'rating' => '9.5/10',
                    'platform' => 'PC, PS5, PS4, Xbox Series X/S',
                    'release_date' => '24 Maret 2023'
                ],
                [
                    'title' => 'Dead Space Remake',
                    'image' => './images/dead.jpg',
                    'description' => 'Petualangan horor sci-fi yang mencekam di luar angkasa.',
                    'price' => 'Rp 759.000',
                    'rating' => '9.3/10',
                    'platform' => 'PC, PS5, Xbox Series X/S',
                    'release_date' => '27 Januari 2023'
                ],
                [
                    'title' => 'Alan Wake 2',
                    'image' => './images/alan.jpg',
                    'description' => 'Game horor psikologis dengan cerita yang mendalam dan visual memukau.',
                    'price' => 'Rp 699.000',
                    'rating' => '9.4/10',
                    'platform' => 'PC, PS5, Xbox Series X/S',
                    'release_date' => '27 Oktober 2023'
                ],
                [
                    'title' => 'Silent Hill 2 Remake',
                    'image' => './images/silent.jpg',
                    'description' => 'Remake dari game horor psikologis klasik yang legendaris.',
                    'price' => 'Rp 749.000',
                    'rating' => '9.0/10',
                    'platform' => 'PC, PS5',
                    'release_date' => 'TBA 2024'
                ],
                [
                    'title' => 'Amnesia: The Bunker',
                    'image' => './images/amnesia.jpg',
                    'description' => 'Survival horror dengan elemen sandbox di setting Perang Dunia I.',
                    'price' => 'Rp 249.000',
                    'rating' => '8.8/10',
                    'platform' => 'PC, PS5, PS4, Xbox Series X/S, Xbox One',
                    'release_date' => '6 Juni 2023'
                ],
                [
                    'title' => 'Layers of Fear',
                    'image' => './images/layers.jpg',
                    'description' => 'Horor psikologis dengan cerita yang berlapis dalam setting artistik.',
                    'price' => 'Rp 399.000',
                    'rating' => '8.7/10',
                    'platform' => 'PC, PS5, Xbox Series X/S',
                    'release_date' => '15 Juni 2023'
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
                                <a href="checkout.php?title=' . urlencode($game['title']) . '&price=' . urlencode($game['price']) . '" class="btn btn-primary">Beli Sekarang</a>
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