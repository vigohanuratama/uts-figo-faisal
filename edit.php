<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='5' viewBox='0 0 8 5'%3E%3Cpath fill='%23777' d='M4 5L0 0h8z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position-x: calc(100% - 10px);
            background-position-y: center;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Edit Barang</h1>
    <?php
    include('koneksi.php');
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "select * from barang where id_barang = '$id'");
    $row = mysqli_fetch_assoc($query);
    ?>
    <form method="post">
        <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
        <label for="kode_barang">Kode Barang:</label>
        <input type="text" id="kode_barang" name="kode_barang" value="<?= $row['kode_barang']; ?>" required><br><br>
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?= $row['nama_barang']; ?>" required><br><br>
        <label for="jumlah_barang">Jumlah Barang:</label>
        <input type="number" id="jumlah_barang" name="jumlah_barang" value="<?= $row['jumlah_barang']; ?>" required><br><br>
        <label for="satuan_barang">Satuan Barang:</label>
        <select id="satuan_barang" name="satuan_barang" required>
            <option value="kg" <?= ($row['satuan_barang'] == 'kg') ? 'selected' : ''; ?>>Kilogram</option>
            <option value="pcs" <?= ($row['satuan_barang'] == 'pcs') ? 'selected' : ''; ?>>Piece</option>
            <option value="liter" <?= ($row['satuan_barang'] == 'liter') ? 'selected' : ''; ?>>Liter</option>
            <option value="meter" <?= ($row['satuan_barang'] == 'meter') ? 'selected' : ''; ?>>Meter</option>
        </select><br><br>
        <label for="harga_beli">Harga Beli:</label>
        <input type="number" id="harga_beli" name="harga_beli" value="<?= $row['harga_beli']; ?>" required><br><br>
        <label for="status_barang">Status Barang:</label>
        <select id="status_barang" name="status_barang" required>
            <option value="1" <?= ($row['status_barang'] == '1') ? 'selected' : ''; ?>>Available</option>
            <option value="0" <?= ($row['status_barang'] == '0') ? 'selected' : ''; ?>>Not Available</option>
        </select><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        include('koneksi.php');
        $id_barang = $_POST['id_barang'];
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $jumlah_barang = $_POST['jumlah_barang'];
        $satuan_barang = $_POST['satuan_barang'];
        $harga_beli= $_POST['harga_beli'];
        $status_barang= $_POST['status_barang'];

        $query = "UPDATE barang SET nama_barang='$nama_barang', status_barang='$status_barang', kode_barang='$kode_barang', jumlah_barang='$jumlah_barang', harga_beli='$harga_beli', satuan_barang='$satuan_barang' WHERE id_barang='$id_barang'";

        mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

        echo "<script>alert('Data berhasil disimpan.');window.location='index.php';</script>";
    }
    ?>
</div>
</body>

</html>
