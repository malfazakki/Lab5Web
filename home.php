<?php
require_once 'data_barang.php';

$dataBarang = new DataBarang();
$data = $dataBarang->getAllData();

require 'header.php';
?>

<body>
    <div class="tabel-container">
        <h1>Data Barang</h1>
        <table class="tabel">
            <tr>
                <th class='id_barang'>ID</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td class="id_barang"><?php echo $row['id_barang']; ?></td>
                    <td><?php echo $row['gambar']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['harga_beli']; ?></td>
                    <td><?php echo $row['harga_jual']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id_barang']; ?>">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['id_barang']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="tambah.php" class="tambah">Tambah Data</a>
    </div>
    <?php require 'footer.php'; ?>