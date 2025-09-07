<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?> | Proyek Mahasiswa</title>
    <!-- Menggunakan Bootstrap 5 dari CDN untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url('css/template.css');?>">
</head>
<body>

    <!-- Navbar Utama -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('home') ?>">My Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Menu navigasi utama -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'home') ? 'active' : '' ?>" href="<?= site_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (strpos(uri_string(), 'mahasiswa') !== false) ? 'active' : '' ?>" href="<?= site_url('mahasiswa') ?>">Data Mahasiswa</a>
                    </li>
                         <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'dosen') ? 'active' : '' ?>" href="<?= site_url('dosen') ?>">Data Dosen</a>
                    </li>
                </ul>
                <!-- Menu sisi kanan (user) -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            <?= esc(session()->get('nama')) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Wrapper untuk Konten Utama -->
    <main class="container mt-4">
        <div class="content-wrapper">
             <!-- KONTEN ANDA AKAN DI-RENDER DI SINI -->
             <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <strong>&copy; <?= date('Y') ?> <a href="#" class="text-white text-decoration-none">My Website</a>.</strong> All rights reserved.
        </div>
    </footer>

<!-- JavaScript dari Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

