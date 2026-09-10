<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Makassar');
$id = $_GET['id'];
$tgl = date('Y-m-d H:i:s');
$buku = $_GET['buku'];
$query = "UPDATE transaksi SET tgl_kembali='$tgl',status_transaksi='pengembalian' WHERE id_transaksi='$id'";
$data = mysqli_query($koneksi, $query);
if($data) {
    mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$buku'");
    echo"<script>alert('🛒 buku sudah dipinjam');window.location.assign('?halaman=history');</script>";
}