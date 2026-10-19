<?php
include_once "../src/koneksi.php";

if(isset($_POST['btnSimpan'])){
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level        = $_POST['level'];

    if (empty($username) || empty($password) || empty($nama_petugas) || empty($level)) {
        echo "<font color='red'>Semua data wajib diisi!</font><br/><br/>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO petugas (username, password, nama_petugas, level) 
                VALUES ('$username', '$password', '$nama_petugas', '$level')");
        if($sql){
            echo "<font color='green'><b>Data Petugas Berhasil Disimpan</b></font>";
            echo "<meta http-equiv='refresh' content='1; url=?open=data_petugas'>";
        } else {
            echo "<font color='red'>Data Gagal Disimpan!</font>";
        }
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>TAMBAH DATA PETUGAS</b></td>
    </tr>
    <tr>
        <td width="25%">Username</td>
        <td width="2%">:</td>
        <td><input type="text" name="username" size="30" /></td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="password" size="30" /></td>
    </tr>
    <tr>
        <td>Nama Petugas</td>
        <td>:</td>
        <td><input type="text" name="nama_petugas" size="30" /></td>
    </tr>
    <tr>
        <td>Level</td>
        <td>:</td>
        <td>
            <select name="level">
                <option value="">-- Pilih Level --</option>
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnSimpan" value="Simpan Data" /></td>
    </tr>
</table>
</form>