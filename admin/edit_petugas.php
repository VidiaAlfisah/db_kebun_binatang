<?php
include_once "../src/koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
$data = mysqli_fetch_array($query);

if(isset($_POST['btnSimpan'])){
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level        = $_POST['level'];

    $update = mysqli_query($koneksi, "UPDATE petugas SET 
                username='$username',
                password='$password',
                nama_petugas='$nama_petugas', 
                level='$level' 
                WHERE id_petugas='$id'");

    if($update){
        echo "<script>alert('Data Petugas Berhasil Diubah'); window.location.href='?open=data_petugas';</script>";
    } else {
        echo "<font color='red'>Gagal Memperbarui Data!</font>";
    }
}
?>

<form action="" method="post" autocomplete="on">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>EDIT DATA PETUGAS</b></td>
    </tr>
    <tr>
        <td width="25%">Username</td>
        <td width="2%">:</td>
        <td><input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" autocomplete="username" required /></td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" autocomplete="current-password" required /></td>
    </tr>
    <tr>
        <td>Nama Petugas</td>
        <td>:</td>
        <td><input type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" required /></td>
    </tr>
    <tr>
        <td>Level</td>
        <td>:</td>
        <td>
            <select name="level" required>
                <option value="admin" <?php if($data['level'] == 'admin') echo 'selected'; ?>>admin</option>
                <option value="petugas" <?php if($data['level'] == 'petugas') echo 'selected'; ?>>petugas</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnSimpan" value="Simpan Perubahan" /></td>
    </tr>
</table>
</form>