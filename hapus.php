<?php
include ('koneksi.php');

$id = $_GET ['id'];

$query = "DELETE FROM barang WHERE id_barang='$id'";

if (mysqli_query($koneksi, $query)){
    header("location:index.php");
}
