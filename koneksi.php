<?php
$servername = "localhost";
$pengguna = "root";
$password = "";
$database = "perpustakaan";
$koneksi = mysqli_connect($servername, $pengguna, $password, $database);
if (!$koneksi) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
}
