<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 9999;
        }

        form {
            margin-bottom: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button[type="button"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-left: 10px;
        }

        input[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Data Product</h1>
    <button onclick="openPopup()">Tambah Barang</button>
    <div class="popup" id="popup">
        <h2>Tambah Barang</h2>
        <form action="tambah.php" method="post">
            <label for="kode_barang">Kode Barang:</label>
            <input type="text" id="kode_barang" name="kode_barang" required><br>
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required><br>
            <label for="jumlah_barang">Jumlah Barang:</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" required><br>
            <label for="satuan_barang">Satuan Barang:</label>
            <select id="satuan_barang" name="satuan_barang" required>
                <option value="kg">Kilogram</option>
                <option value="pcs">Piece</option>
                <option value="liter">Liter</option>
                <option value="meter">Meter</option>
            </select><br>
            <label for="harga_beli">Harga Beli:</label>
            <input type="number" id="harga_beli" name="harga_beli" required><br>
            <label for="status_barang">Status Barang:</label>
            <select id="status_barang" name="status_barang" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select><br>
            <input type="submit" value="Tambah Barang">
            <button type="button" onclick="closePopup()">Cancel</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Satuan Barang</th>
                <th>Harga Beli</th>
                <th>Status Barang</th>
                <th>Hapus Barang</th>
                <th>Edit Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM barang");
                $no = 1;

                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['kode_barang'] . "</td>";
                    echo "<td>" . $row['nama_barang'] . "</td>";
                    echo "<td>" . $row['jumlah_barang'] . "</td>";
                    echo "<td>" . $row['satuan_barang'] . "</td>";
                    echo "<td>" . $row['harga_beli'] . "</td>";
                    echo "<td>" . ($row['status_barang'] == 1 ? 'Available' : 'Not Available') . "</td>";
                    echo "<td><a href='hapus.php?id=" . $row['id_barang'] . "'>Delete</a></td>";
                    echo "<td><a href='edit.php?id=" . $row['id_barang'] . "'>Edit</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>
</body>
</html>
