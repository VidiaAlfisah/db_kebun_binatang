<?php
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- 1. Judul Tab Browser -->
    <title>Admin - AquaPark Zoo</title>
  <link rel="stylesheet" type="text/css" href="../src/style.css?v=3.0">
</head>
<body>

    <main class="wrap">

        <!-- Sidebar Kiri Vertikal -->
        <aside class="sidebar">
            <header class="brand">
                <!-- 2. Logo / Nama di Sidebar Kiri -->
                <h1>🐬 AquaPark Zoo</h1>
            </header>

            <nav class="menu-vertikal">
                <ul>
                    <li><a href="halaman_admin.php">Dashboard</a></li>
                    <li><a href="halaman_admin.php?open=data_petugas">Data Petugas</a></li>
                    <li><a href="halaman_admin.php?open=data_akuarium">Data Akuarium</a></li>
                    <li><a href="halaman_admin.php?open=data_hewan">Data Hewan</a></li>
                    <li><a href="halaman_admin.php?open=data_perawatan">Data Perawatan</a></li>
                    <li><a href="halaman_admin.php?open=data_pertunjukan">Data Pertunjukan</a></li>
                    <li><a href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')" class="btn-logout">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Area Konten Kanan -->
        <article class="konten-utama">
            <header class="header-konten">
                <!-- 3. Judul dan Sub-Judul di Banner Biru -->
                <h2>Sistem Informasi AquaPark Zoo</h2>
                <p>Dashboard Pengelolaan AquaPark Zoo</p>
            </header>

            <section class="conteudo">
                <?php include "buka_file.php"; ?>
            </section>
        </article>

    </main>

</body>
</html>