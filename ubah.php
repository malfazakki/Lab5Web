<?php
require_once 'data_barang.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $dataBarang = new DataBarang();
    $result = $dataBarang->updateData($id, $gambar, $nama, $kategori, $harga_beli, $harga_jual, $stok);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Gagal mengedit data';
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $dataBarang = new DataBarang();
        $data = $dataBarang->getDataById($id);
    } else {
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Barang</title>
</head>

<body>
    <h1>Edit Data Barang</h1>
    <a href="index.php">Kembali</a>
    <br><br>
    <form method="post">
        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" id="gambar" value="<?php echo $data['gambar']; ?>">
        <br><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>">
        <br><br>
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" id="kategori" value="<?php echo $data['kategori']; ?>">
        <br><br>
        <label for="harga_beli">Harga Beli</label>
        <input type="number" name="harga_beli" id="harga_beli" value="<?php echo $data['harga_beli']; ?>">
        <br><br>
        <label for="harga_jual">Harga Jual</label>
        <input type="number" name="harga_jual" id="harga_jual" value="<?php echo $data['harga_jual']; ?>">
        <br><br>
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="<?php echo $data['stok']; ?>">
        <br><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>