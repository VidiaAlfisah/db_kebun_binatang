<?php
include_once "../src/koneksi.php";

// Tangkap ID/Nomor Akuarium dari URL (?open=hapus_akuarium&id=...)
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {
    // Jalankan query hapus berdasarkan nomor_akuarium
    $hapus = mysqli_query($koneksi, "DELETE FROM akuarium WHERE nomor_akuarium = '$id'");

    if ($hapus) {
        echo "<script>
                alert('Data Akuarium Berhasil Dihapus');
                window.location.href='?open=data_akuarium';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Menghapus Data Akuarium!');
                window.location.href='?open=data_akuarium';
              </script>";
    }
} else {
    // Jika ID tidak ditemukan di URL
    echo "<script>
            alert('ID Akuarium Tidak Ditemukan!');
            window.location.href='?open=data_akuarium';
          </script>";
}
?>