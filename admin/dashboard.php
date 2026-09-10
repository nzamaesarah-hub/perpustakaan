<?php
session_start();
if (empty($_SESSION['id_admin'])) {
    header("Location:../login-admin.php");
}
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/app.css" rel="stylesheet">
</head>

<body class="library-app">
    <div class="app-layout">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-mark">📚</div>
                <div>
                    <div class="brand-title">Perpustakaan Sekolah</div>
                    <div class="brand-subtitle">Panel Administrator</div>
                </div>
            </div>

            <div class="side-label">Menu Utama</div>
            <nav class="side-nav">
                <a class="<?= $halaman === '' ? 'current' : '' ?>" href="dashboard.php">⌂ <span>Dashboard</span></a>
                <a class="<?= $halaman === 'data_buku' ? 'current' : '' ?>" href="?halaman=data_buku">▣ <span>Data Buku</span></a>
                <a class="<?= $halaman === 'data_anggota' ? 'current' : '' ?>" href="?halaman=data_anggota">♙ <span>Data Anggota</span></a>
                <a class="<?= $halaman === 'data_peminjaman' ? 'current' : '' ?>" href="?halaman=data_peminjaman">↔ <span>Peminjaman</span></a>
            </nav>

            <div class="side-bottom">
                <nav class="side-nav">
                    <a href="logout.php">⇥ <span>Logout</span></a>
                </nav>
            </div>
        </aside>

        <main class="main-area">
            <header class="topbar">
                <div>
                    <h1 class="topbar-title">Dashboard Admin</h1>
                    <p class="topbar-subtitle">Kelola data perpustakaan dengan lebih mudah.</p>
                </div>
                <div class="user-chip">
                    <div class="user-avatar">A</div>
                    <span><?= $_SESSION['nama_admin']; ?></span>
                </div>
            </header>

            <div class="content-wrap">
                <div class="content-card">
                    <div class="p-3">
                        <?php
                        //mengambil parameter
                        //cari file ada atau tidak
                        if (file_exists($halaman . ".php")) {
                            //jika ada panggil file yang namanya sama dengan GET
                            include $halaman . ".php";
                        } else { //jika file tidak ada
                        ?>
                            <h4>Selamat Datang <?php echo $_SESSION['nama_admin']; ?> 👋</h4>
                            <p class="text-justify text-muted">
                                Aplikasi Perpustakaan Sekolah Digital merupakan sistem berbasis web
                                yang dirancang untuk membantu pengelolaan data buku, peminjaman,
                                dan pengembalian secara lebih mudah, cepat, dan terorganisir.
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
