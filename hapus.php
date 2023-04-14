<?php
require_once 'data_barang.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dataBarang = new DataBarang();
    $result = $dataBarang->deleteData($id);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Gagal menghapus data';
    }
} else {
    header('Location: index.php');
    exit();
}
?>
