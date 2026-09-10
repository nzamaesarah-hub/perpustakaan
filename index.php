<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body class="library-auth">
    <div class="auth-grid row justify-content-center align-items-center">
        <div class="col-12">
            <div class="portal-card mx-auto text-center">
                <img src="logo.jpg" alt="Logo Perpustakaan" class="mb-3">
                <h1>Aplikasi Perpustakaan</h1>
                <p class="portal-intro">Pilih portal yang ingin digunakan untuk melanjutkan.</p>
                <div class="row g-3 justify-content-center mt-2">
                    <div class="col-md-4">
                        <div class="portal-option h-100">
                            <div class="portal-icon">A</div>
                            <h5>Administrator</h5>
                            <p>Kelola buku, anggota, dan peminjaman.</p>
                            <a href="login-admin.php" class="btn btn-primary">Login Admin</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portal-option h-100">
                            <div class="portal-icon">M</div>
                            <h5>Anggota</h5>
                            <p>Cari buku dan lihat riwayat peminjaman.</p>
                            <a href="login-anggota.php" class="btn btn-primary">Login Anggota</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portal-option h-100">
                            <div class="portal-icon">+</div>
                            <h5>Pendaftaran</h5>
                            <p>Daftar sebagai anggota perpustakaan baru.</p>
                            <a href="pendaftaran-anggota.php" class="btn btn-outline-primary">Daftar Anggota</a>
                        </div>
                    </div>
                </div>
                <div class="portal-footer">Sistem Informasi Perpustakaan Sekolah</div>
            </div>
        </div>
    </div>
</body>
</html>
