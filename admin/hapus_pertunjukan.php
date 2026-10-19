<?php
include_once "../src/koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM pertunjukan WHERE id_pertunjukan='$id'");
    
    if($hapus){
        echo "<script>alert('Data pertunjukan berhasil dihapus!'); window.location.href='halaman_admin.php?open=data_pertunjukan';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location.href='halaman_admin.php?open=data_pertunjukan';</script>";
    }
}
?>