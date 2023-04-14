<?php
require_once 'koneksi.php';

class DataBarang
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllData()
    {
        $query = "SELECT * FROM data_barang";
        $result = $this->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // Method untuk mengambil data berdasarkan ID
    public function getDataById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM data_barang WHERE id_barang = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function insertData($gambar, $nama, $kategori, $harga_beli, $harga_jual, $stok)
    {
        $query = "INSERT INTO data_barang (gambar, nama, kategori, harga_beli, harga_jual, stok) VALUES ('$gambar', '$nama', '$kategori', '$harga_beli', '$harga_jual', '$stok')";
        return $this->conn->query($query);
    }

    public function updateData($id, $gambar, $nama, $kategori, $harga_beli, $harga_jual, $stok)
    {
        $query = "UPDATE data_barang SET gambar='$gambar', nama='$nama', kategori='$kategori', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok' WHERE id='$id'";
        return $this->conn->query($query);
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM data_barang WHERE id_barang='$id'";
        return $this->conn->query($query);
    }
}
