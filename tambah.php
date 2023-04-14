<?php
require_once 'data_barang.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gambar = $_POST['gambar'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $dataBarang = new DataBarang();
    $result = $dataBarang->insertData($gambar, $nama, $kategori, $harga_beli, $harga_jual, $stok);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Gagal menambahkan data';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
</head>
<body>
    <h1>Tambah Data Barang</h1>
    <a href="index.php">Kembali</a>
    <br><br>
    <form method="post">
        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" id="gambar">
        <br><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <br><br>
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" id="kategori">
        <br><br>
        <label for="harga_beli">Harga Beli</label>
        <input type="number" name="harga_beli" id="harga_beli">
        <br><br>
        <label for="harga_jual">Harga Jual</label>
        <input type="number" name="harga_jual" id="harga_jual">
        <br><br>
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok">
        <br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
