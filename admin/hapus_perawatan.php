<?php
include_once "../src/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM perawatan WHERE id_perawatan='$id'");

    if ($hapus) {
        echo "<script>alert('Data Perawatan Berhasil Dihapus'); window.location.href='halaman_admin.php?open=data_perawatan';</script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data!'); window.location.href='halaman_admin.php?open=data_perawatan';</script>";
    }
}
?>