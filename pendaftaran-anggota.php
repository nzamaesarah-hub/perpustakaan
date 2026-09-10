<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>

<body class="library-auth">
    <div class="auth-grid row justify-content-center align-items-center">
        <form method="post" action="#" class="col-md-3 border p-4 bg-white rounded-4">
            <img src="logo.jpg" width="100px" class="mx-auto d-block">
            <h4 class="text-center">Pendaftaran Anggota</h4>
            <h5 class="text-center mb-3">Aplikasi Perpustakaan Digital Sekolah</h5>
            <input  type="number" name="nis" class="form-control mb-3" placeholder="Masukan NIS" required>
            <input type="text" name="nama_anggota" class="form-control mb-3" placeholder="Masukan Nama Anggota" required>
            <input type="text" name="username" class="form-control mb-3" placeholder="Masukan Username" required>
            <input type="text" name="password" class="form-control mb-3" placeholder="Masukan Password" required>
            <input type="text" name="kelas" class="form-control mb-3" placeholder="Masukan Kelas" required>
            <button type="submit" name="tombol" class="btn btn-success w-100 mb-2">Daftar</button>
            <a href="login-anggota.php" class="text-decoration-none">Login Sebagai Anggota</a><br>
            <a href="login-admin.php" class="text-decoration-none">Login Sebagai Admin</a>
        </form>
    </div>
</body>

</html>
<?php
if(isset($_POST['tombol'])){
    include 'koneksi.php';
    $nis = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $kelas = $_POST['kelas'];

    $query = "INSERT INTO anggota(nis,nama_anggota,username,password,kelas) VALUES('$nis','$nama_anggota','$username','$pass','$kelas')";
    $data = mysqli_query($koneksi, $query);
    if($data){
        session_start();
        $_SESSION['id_anggota'] = mysqli_insert_id($koneksi);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $pass;
        $_SESSION['nama_anggota'] =$nama_anggota;
        header("Location:anggota/dashboard.php");
    }else{
        echo "<script>alert('❌ Maaf Login Gagal'); window.location.assign('login-anggota.php');</script>";
    }
}