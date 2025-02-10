<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmbaGaming - cari game favoritmu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom CSS */
        body {
            background-color: #0f1923;
            color: #e5e5e5;
        }
        
        .navbar-custom {
            background-color: #1a2634;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        
        .navbar-custom .navbar-brand {
            color: #00ff9d;
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .navbar-custom .nav-link {
            color: #ffffff !important;
            margin: 0 10px;
            transition: 0.3s;
        }
        
        .navbar-custom .nav-link:hover {
            color: #00ff9d !important;
        }
        
        .hero-section {
            background: linear-gradient(rgba(15, 25, 35, 0.9), rgba(15, 25, 35, 0.9)), 
                        url('https://source.unsplash.com/1600x900/?gaming-setup') no-repeat center center;
            background-size: cover;
            height: 500px;
            display: flex;
            align-items: center;
            color: white;
            border-bottom: 4px solid #00ff9d;
        }
        
        .product-card {
            transition: 0.3s;
            margin-bottom: 20px;
            background-color: #1a2634;
            border: 1px solid #2a3744;
            color: #ffffff;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 255, 157, 0.2);
            border-color: #00ff9d;
        }
        
        .category-section {
            padding: 50px 0;
            background-color: #0f1923;
        }
        
        .about-section {
            padding: 80px 0;
            background-color: #1a2634;
            color: #ffffff;
        }
        
        .footer {
            background-color: #0a0f15;
            color: white;
            padding: 50px 0;
            border-top: 4px solid #00ff9d;
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
        
        .btn-outline-primary {
            border-color: #00ff9d;
            color: #00ff9d;
        }
        
        .btn-outline-primary:hover {
            background-color: #00ff9d;
            color: #0f1923;
            border-color: #00ff9d;
        }

        .card-title {
            color: #00ff9d;
        }

        .text-primary {
            color: #00ff9d !important;
        }

        hr {
            border-color: #2a3744;
        }

        .social-links a {
            color: #00ff9d !important;
            transition: 0.3s;
        }

        .social-links a:hover {
            color: #00cc7d !important;
            transform: translateY(-2px);
        }

        .logo-icon {
    display: inline-block;
    margin-right: 8px;
    font-size: 1.5rem;
    color: #00ff9d;
    transition: transform 0.5s ease-in-out;
}

.navbar-brand:hover .logo-icon {
    transform: rotate(360deg) scale(1.2);
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
        <a class="navbar-brand" href="#">
    <span class="logo-icon"><i class="fas fa-gamepad"></i></span> AmbaGaming</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Jenis Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang Toko</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container text-center">
            <h1 class="display-4">Selamat Datang di AmbaGaming</h1>
            <p class="lead">Temukan berbagai game terbaik dengan harga bersaing</p>
            <a href="#products" class="btn btn-primary btn-lg">Jelajahi Game</a>
        </div>
    </section>


    <!-- Products Section -->
    <section class="category-section" id="products">
        <div class="container">
            <h2 class="text-center mb-5">Kategori Game</h2>
            <div class="row">
                <?php
                $categories = [
                    ['name' => 'Action & Adventure', 'icon' => 'fas fa-gamepad', 'desc' => 'Game petualangan dan aksi seru'],
                    ['name' => 'RPG', 'icon' => 'fas fa-dragon', 'desc' => 'Game peran dengan cerita mendalam'],
                    ['name' => 'Sports & Racing', 'icon' => 'fas fa-car-side', 'desc' => 'Game olahraga dan balapan'],
                    ['name' => 'Strategy', 'icon' => 'fas fa-chess', 'desc' => 'Game strategi dan taktik'],
                    ['name' => 'Simulation', 'icon' => 'fas fa-city', 'desc' => 'Game simulasi kehidupan dan manajemen'],
                    ['name' => 'Horror & Survival', 'icon' => 'fas fa-ghost', 'desc' => 'Game horor dan bertahan hidup']
                ];

                foreach ($categories as $category) {
                    echo '<div class="col-md-4">
                        <div class="card product-card">
                            <div class="card-body text-center">
                                <i class="' . $category['icon'] . ' fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">' . $category['name'] . '</h5>
                                <p class="card-text">' . $category['desc'] . '</p>
                                <a href="' . ($category['name'] === 'Action & Adventure' ? 'categories/action-adventure.php' : 
                                            ($category['name'] === 'RPG' ? 'categories/rpg.php' : 
                                            ($category['name'] === 'Sports & Racing' ? 'categories/sports-racing.php' :
                                            ($category['name'] === 'Strategy' ? 'categories/strategy.php' :
                                            ($category['name'] === 'Simulation' ? 'categories/simulation.php' :
                                            ($category['name'] === 'Horror & Survival' ? 'categories/horror.php' : '#')))))) . '" 
                                   class="btn btn-outline-primary">Lihat Game</a>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-4">AmbaGamingStore</h2>
                    <p class="lead">AmbaGamingStore adalah platform game digital terpercaya yang menyediakan berbagai game original dengan harga terbaik.</p>
                    <p>Kami menawarkan:</p>
                    <ul>
                        <li>Game Original 100%</li>
                        <li>Aktivasi Instan</li>
                        <li>Support 24/7</li>
                        <li>Harga Bersaing</li>
                        <li>Pembayaran Aman</li>
                        <li>Update Game Terbaru</li>
                    </ul>
                    <button class="btn btn-primary">Hubungi Kami</button>
                </div>
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/600x400/?gaming" alt="Game Store" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>GameStore</h5>
                    <p>Platform game digital terpercaya dengan koleksi game terlengkap.</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> Jl. Contoh No. 123<br>
                        <i class="fas fa-phone"></i> +62 123 456 789<br>
                        <i class="fas fa-envelope"></i> info@gameamba.com
                    </p>
                </div>
                <div class="col-md-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> AmbaGaming. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
