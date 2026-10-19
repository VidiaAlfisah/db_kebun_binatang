<?php
include_once "../src/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "DELETE FROM hewan_air WHERE id_hewan='$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='halaman_admin.php?open=data_hewan';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='halaman_admin.php?open=data_hewan';</script>";
    }
}
?>