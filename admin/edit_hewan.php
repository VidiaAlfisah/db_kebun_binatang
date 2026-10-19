<?php
include_once "../src/koneksi.php";

$id = $_GET['id'];
$queryData = mysqli_query($koneksi, "SELECT * FROM hewan_air WHERE id_hewan='$id'");
$data = mysqli_fetch_array($queryData);

if(isset($_POST['btnUpdate'])){
    $nama_hewan  = $_POST['nama_hewan'];
    $umur        = $_POST['umur'];
    $jumlah      = $_POST['jumlah'];
    $gambar      = $_POST['gambar'];
    $id_akuarium = $_POST['id_akuarium'];

    if (empty($nama_hewan) || empty($id_akuarium)) {
        echo "<font color='red'>Data utama wajib diisi!</font><br/><br/>";
    } else {
        $gambar_val = empty($gambar) ? $data['gambar'] : $gambar;
        $sql = mysqli_query($koneksi, "UPDATE hewan_air SET 
                nama_hewan='$nama_hewan', 
                umur='$umur', 
                jumlah='$jumlah', 
                gambar='$gambar_val', 
                id_akuarium='$id_akuarium' 
                WHERE id_hewan='$id'");
        if($sql){
            echo "<font color='green'><b>Data Hewan Berhasil Diubah</b></font>";
            echo "<meta http-equiv='refresh' content='1; url=?open=data_hewan'>";
        } else {
            echo "<font color='red'>Data Gagal Diubah!</font>";
        }
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>EDIT DATA HEWAN AIR</b></td>
    </tr>
    <tr>
        <td width="25%">Nama Hewan</td>
        <td width="2%">:</td>
        <td><input type="text" name="nama_hewan" value="<?php echo $data['nama_hewan']; ?>" size="30" required /></td>
    </tr>
    <tr>
        <td>Umur</td>
        <td>:</td>
        <td><input type="text" name="umur" value="<?php echo $data['umur']; ?>" size="15" /></td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>:</td>
        <td><input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>" size="10" /></td>
    </tr>
    <tr>
        <td>Nama File Gambar</td>
        <td>:</td>
        <td>
            <select name="gambar">
                <option value="<?php echo $data['gambar']; ?>">-- Tetap: <?php echo $data['gambar']; ?> --</option>
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
                    $selected = ($rowAk['id_akuarium'] == $data['id_akuarium']) ? "selected" : "";
                    echo "<option value='$rowAk[id_akuarium]' $selected>$rowAk[nomor_akuarium] - $rowAk[jenis_habitat]</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnUpdate" value="Simpan Perubahan" /></td>
    </tr>
</table>
</form>