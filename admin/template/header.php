<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: ../admin/login.php'); 
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - SMAN 11 Bekasi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #1d2f5d;
            --accent-color: #ffa200;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }

        /* Sidebar Styling */
        .sidenav {
            height: 100vh;
            width: var(--sidebar-width);
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: var(--primary-color);
            transition: all 0.3s;
            padding-top: 20px;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .sidenav-header {
            padding: 0 25px 20px;
            border-bottom: 1px solid #333;
            margin-bottom: 20px;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .sidenav a {
            padding: 12px 25px;
            text-decoration: none;
            font-size: 15px;
            color: #bdc3c7;
            display: block;
            transition: 0.2s;
            border-left: 4px solid transparent;
        }

        .sidenav a:hover {
            color: white;
            background: rgba(255,255,255,0.05);
            border-left: 4px solid var(--accent-color);
        }

        .sidenav a.active {
            color: white;
            background: rgba(255,255,255,0.1);
            border-left: 4px solid var(--accent-color);
        }

        /* Main Content Styling */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }

        /* Top Navbar for Mobile Toggle */
        .top-bar {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            border-radius: 8px;
        }

        #sidebarCollapse {
            cursor: pointer;
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 5px 15px;
            border-radius: 4px;
            display: none; /* Hidden on Desktop */
        }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .sidenav {
                left: calc(var(--sidebar-width) * -1);
            }
            .sidenav.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            #sidebarCollapse {
                display: block;
            }
            .overlay {
                display: none;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.5);
                z-index: 999;
                top: 0;
                left: 0;
            }
            .overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<nav class="sidenav" id="sidebar">
    <div class="sidenav-header">
        SMA Negeri 11
    </div>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="home.php">Halaman Utama</a></li>
        <li class="nav-item"><a href="berita.php">Berita Sekolah</a></li>
        <li class="nav-item"><a href="aspirasi.php">Kotak Aspirasi</a></li>
        <li class="nav-item"><a href="fasilitas.php">Fasilitas</a></li>
        <li class="nav-item"><a href="ekskul.php">Manajemen Ekskul</a></li>
        <li class="nav-item mt-4"><a href="logout.php" style="color: white; background-color: #e74c3c;">Keluar (Logout)</a></li>
    </ul>
</nav>

<div class="main-content">
    <div class="top-bar">
        <button type="button" id="sidebarCollapse" onclick="toggleSidebar()">
            ☰ Menu
        </button>
        <h5 class="m-0 ml-3 d-none d-sm-block">Admin Panel - SMAN 11 Bekasi</h5>
    </div>

    <script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('overlay').classList.toggle('active');
    }

    // Menandai menu aktif secara otomatis
    document.querySelectorAll('.sidenav a').forEach(link => {
        if(link.href === window.location.href) {
            link.classList.add('active');
        }
    });
</script>