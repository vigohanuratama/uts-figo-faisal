<?php

$host = "localhost";
$dbname = "id22258690_product";
$user = "id22258690_figo_faisal";
$password = "iJYw863lhqC9r1e@";

$koneksi = mysqli_connect($host, $user, $password, $dbname);

if(!$koneksi){
    die("Koneksi gagal".mysqli_connect_error());
}

