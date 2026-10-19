<?php
include_once "../src/koneksi.php";

if(isset($_POST['btnSimpan'])){
    $nama_hewan  = $_POST['nama_hewan'];
    $umur        = $_POST['umur'];
    $jumlah      = $_POST['jumlah'];
    $gambar      = $_POST['gambar'];
    $id_akuarium = $_POST['id_akuarium'];

    if (empty($nama_hewan) || empty($id_akuarium)) {
        echo "<font color='red'>Data utama wajib diisi!</font><br/><br/>";
    } else {
        $gambar_val = empty($gambar) ? 'default.png' : $gambar;
        $sql = mysqli_query($koneksi, "INSERT INTO hewan_air (nama_hewan, umur, jumlah, gambar, id_akuarium) 
                VALUES ('$nama_hewan', '$umur', '$jumlah', '$gambar_val', '$id_akuarium')");
        if($sql){
            echo "<font color='green'><b>Data Hewan Berhasil Disimpan</b></font>";
            echo "<meta http-equiv='refresh' content='1; url=?open=data_hewan'>";
        } else {
            echo "<font color='red'>Data Gagal Disimpan!</font>";
        }
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>TAMBAH DATA HEWAN AIR</b></td>
    </tr>
    <tr>
        <td width="25%">Nama Hewan</td>
        <td width="2%">:</td>
        <td><input type="text" name="nama_hewan" size="30" required /></td>
    </tr>
    <tr>
        <td>Umur</td>
        <td>:</td>
        <td><input type="text" name="umur" size="15" placeholder="contoh: 2 tahun" /></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><input type="number" name="jumlah" size="10" /></td>
    </tr>
    <tr>
        <td>Nama File Gambar</td>
        <td>:</td>
        <td>
            <select name="gambar">
                <option value="">-- Pilih Foto dari Folder --</option>
                <?php
                $folder = "images/";
                if (is_dir($folder)) {
                    if ($dh = opendir($folder)) {
                        while (($file = readdir($dh)) !== false) {
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                                echo "<option value='$file'>$file</option>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Akuarium</td>
        <td>:</td>
        <td>
            <select name="id_akuarium" required>
                <option value="">-- Pilih Akuarium --</option>
                <?php
                $sqlAk = mysqli_query($koneksi, "SELECT * FROM akuarium ORDER BY nomor_akuarium ASC");
                while($rowAk = mysqli_fetch_array($sqlAk)){
                    echo "<option value='$rowAk[id_akuarium]'>$rowAk[nomor_akuarium] - $rowAk[jenis_habitat]</option>";
                }
                ?>
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