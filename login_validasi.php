<?php
session_start();

// Menghubungkan dengan koneksi database
include 'src/koneksi.php';

// Menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password']; // Tanpa md5()

$login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password'") 
        or die(mysqli_error($koneksi));
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        $_SESSION['id_petugas'] = $data['id_petugas'];

        echo "<script language='javascript'>
                alert('Anda berhasil Login sebagai Admin Kebun Binatang Air!'); 
                document.location='admin/halaman_admin.php';
              </script>";

    } else if ($data['level'] == "petugas") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        $_SESSION['id_petugas'] = $data['id_petugas'];

        echo "<script language='javascript'>
                alert('Anda berhasil Login sebagai Petugas!'); 
                document.location='petugas/halaman_petugas.php';
              </script>";

    } else {
        header("Location: index.php?pesan=gagal");
    }
} else {
    header("Location: index.php?pesan=gagal");
}
?>