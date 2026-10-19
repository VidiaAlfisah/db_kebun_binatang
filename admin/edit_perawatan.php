<?php
include_once "../src/koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM perawatan WHERE id_perawatan='$id'");
$data = mysqli_fetch_array($query);

if(isset($_POST['btnSimpan'])){
    $tanggal         = $_POST['tanggal_perawatan'];
    $id_hewan        = $_POST['id_hewan'];
    $id_petugas      = $_POST['id_petugas'];
    $jenis_perawatan = $_POST['jenis_perawatan'];

    $update = mysqli_query($koneksi, "UPDATE perawatan SET 
                tanggal='$tanggal', 
                id_hewan='$id_hewan', 
                id_petugas='$id_petugas', 
                jenis_perawatan='$jenis_perawatan' 
                WHERE id_perawatan='$id'");

    if($update){
        echo "<script>alert('Data Perawatan Berhasil Diubah'); window.location.href='?open=data_perawatan';</script>";
    } else {
        echo "<font color='red'>Gagal Memperbarui Data!</font>";
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>EDIT DATA PERAWATAN</b></td>
    </tr>
    <tr>
        <td width="25%">Tanggal Perawatan</td>
        <td width="2%">:</td>
        <td><input type="date" name="tanggal_perawatan" value="<?php echo $data['tanggal']; ?>" required /></td>
    </tr>
    <tr>
        <td>Pilih Hewan</td>
        <td>:</td>
        <td>
            <select name="id_hewan" required>
                <?php
                $sqlHw = mysqli_query($koneksi, "SELECT * FROM hewan_air ORDER BY nama_hewan ASC");
                while($rowHw = mysqli_fetch_array($sqlHw)){
                    $selected = ($rowHw['id_hewan'] == $data['id_hewan']) ? 'selected' : '';
                    echo "<option value='$rowHw[id_hewan]' $selected>$rowHw[nama_hewan]</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Pilih Petugas</td>
        <td>:</td>
        <td>
            <select name="id_petugas" required>
                <?php
                $sqlPt = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY nama_petugas ASC");
                while($rowPt = mysqli_fetch_array($sqlPt)){
                    $selected = ($rowPt['id_petugas'] == $data['id_petugas']) ? 'selected' : '';
                    echo "<option value='$rowPt[id_petugas]' $selected>$rowPt[nama_petugas]</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jenis Perawatan</td>
        <td>:</td>
        <td><input type="text" name="jenis_perawatan" value="<?php echo $data['jenis_perawatan']; ?>" size="50" required /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnSimpan" value="Simpan Perubahan" class="btn btn-primary" /></td>
    </tr>
</table>
</form>