<?php
session_start();
if (empty($_SESSION['id_anggota'])) {
    header("Location:../login-anggota.php");
}
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota | Aplikasi Perpustakaan Sekolah Digital</title>
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
                    <div class="brand-subtitle">Portal Anggota</div>
                </div>
            </div>

            <div class="side-label">Menu</div>
            <nav class="side-nav">
                <a class="<?= $halaman === '' ? 'current' : '' ?>" href="dashboard.php">⌂ <span>Dashboard</span></a>
                <a class="<?= $halaman === 'history' ? 'current' : '' ?>" href="?halaman=history">◷ <span>History Peminjaman</span></a>
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
                    <h1 class="topbar-title">Portal Anggota</h1>
                    <p class="topbar-subtitle">Cari dan kelola peminjaman buku Anda.</p>
                </div>
                <div class="user-chip">
                    <div class="user-avatar"><?= strtoupper(substr($_SESSION['nama_anggota'], 0, 1)); ?></div>
                    <span><?= $_SESSION['nama_anggota']; ?></span>
                </div>
            </header>

            <div class="content-wrap">
                <div class="content-card">
                    <div class="p-3">
                        <?php
                        if (file_exists($halaman . ".php")) {
                            include $halaman . ".php";
                        } else { ?>
                            <h4>Selamat Datang <?= $_SESSION['nama_anggota']; ?> 👋</h4>
                            <form action="?halaman=cari" method="post">
                                <label class="text-muted">Cari Buku</label>
                                <input type="text" name="kunci" class="form-control mb-2" required placeholder="Masukkan judul buku">
                                <button type="submit" class="btn btn-primary">Cari Buku</button>
                            </form>
                            <h4 class="mt-4">🛒 Daftar Buku Yang Dipinjam</h4>
                            <table class="table table-bordered">
                                <tr class="fw-bold">
                                    <td>No</td>
                                    <td>Judul Buku</td>
                                    <td>Tanggal Pinjam</td>
                                    <td>Pengembalian</td>
                                </tr>
                                <?php
                                include '../koneksi.php';
                                $no=1;
                                $query = "SELECT*FROM transaksi,buku WHERE buku.id_buku=transaksi.id_buku 
                                AND transaksi.id_anggota='$_SESSION[id_anggota]' AND status_transaksi='peminjaman'";
                                $data = mysqli_query($koneksi, $query);
                                foreach($data as $peminjaman){ ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $peminjaman['judul_buku'] ?></td>
                                            <td><?= $peminjaman['tgl_pinjam'] ?></td>
                                            <td>
                                                <?php
                                                $link = "'Pengembalian Buku $peminjaman[judul_buku]', $peminjaman[id_transaksi], $peminjaman[id_buku]";
                                                ?>
                                                <a onclick="pengembalian(<?= $link ?>)" class="btn btn-success">Pengembalian</a>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </table>

                            <hr>
                            <h4>📚 Daftar Buku</h4>
                            <div class="row">
                            <?php
                            $data_buku = mysqli_query($koneksi, "SELECT*FROM buku ORDER BY id_buku DESC");
                            foreach($data_buku as $buku){
                            ?>
                            <div class="col-md-3">
                                <div class="card shadow-sm p-3 d-flex">
                                    <h5><?= $buku['judul_buku'] ?></h5>
                                    <p><strong>Pengarang:</strong> <?= $buku['pengarang'] ?></p>
                                    <p><strong>Penerbit:</strong> <?= $buku['penerbit'] ?></p>
                                    <p><strong>Diterbitkan Tahun:</strong> <?= $buku['tahun_terbit'] ?></p>
                                    <?php if($buku['status'] =="tersedia"){ ?>
                                    <span class="badge bg-success mb-1">Tersedia</span>
                                    <?php
                                    $link = "'Apakah anda yakin ingin meminjam buku $buku[judul_buku]',$buku[id_buku]";
                                    ?>
                                    <a onclick="pinjam(<?= $link ?>)" class="btn btn-primary text-white">Pinjam Buku</a>
                                    <?php }else{ ?>
                                    <span class="badge bg-danger mb-1">Tidak Tersedia</span>
                                    <a class="btn btn-primary text-white disabled">Pinjam Buku</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function pinjam(pesan,id_buku) {
            if (confirm(pesan)) {
                window.location.href = '?halaman=peminjaman&id='+id_buku;
            }
        }
        function pengembalian(pesan,id_transaksi,id_buku){
            if(confirm(pesan)){
                window.location.href = '?halaman=pengembalian&id='+id_transaksi+'&buku='+id_buku;
            }
        }
    </script>
</body>

</html>
