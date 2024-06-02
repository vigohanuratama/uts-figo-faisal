<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = $_POST['status_barang'];
    $sql = "INSERT INTO barang (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang) VALUES ('$kode_barang', '$nama_barang', $jumlah_barang, '$satuan_barang', $harga_beli, $status_barang)";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit;
    }
    mysqli_close($koneksi);
}