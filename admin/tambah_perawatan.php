<?php
include_once "../src/koneksi.php";

if(isset($_POST['btnSimpan'])){
    $tanggal         = isset($_POST['tanggal_perawatan']) ? $_POST['tanggal_perawatan'] : '';
    $id_hewan        = isset($_POST['id_hewan']) ? $_POST['id_hewan'] : '';
    $id_petugas      = isset($_POST['id_petugas']) ? $_POST['id_petugas'] : '';
    $jenis_perawatan = isset($_POST['jenis_perawatan']) ? $_POST['jenis_perawatan'] : '';

    // Query Simpan Data Perawatan
    $sql = mysqli_query($koneksi, "INSERT INTO perawatan (tanggal, id_hewan, id_petugas, jenis_perawatan) 
            VALUES ('$tanggal', '$id_hewan', '$id_petugas', '$jenis_perawatan')");
    
    if($sql){
        echo "<script>alert('Data Perawatan Berhasil Disimpan'); window.location.href='?open=data_perawatan';</script>";
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>TAMBAH DATA PERAWATAN</b></td>
    </tr>
    <tr>
        <td width="25%">Tanggal Perawatan</td>
        <td width="2%">:</td>
        <td><input type="date" name="tanggal_perawatan" required /></td>
    </tr>
    <tr>
        <td>Pilih Hewan</td>
        <td>:</td>
        <td>
            <select name="id_hewan" required>
                <option value="">-- Pilih Hewan --</option>
                <?php
                $queryHw = mysqli_query($koneksi, "SELECT id_hewan, nama_hewan FROM hewan_air ORDER BY nama_hewan ASC");
                while($hw = mysqli_fetch_array($queryHw)){
                    echo "<option value='".$hw['id_hewan']."'>".$hw['nama_hewan']."</option>";
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
                <option value="">-- Pilih Petugas --</option>
                <?php
                $queryPt = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas FROM petugas ORDER BY nama_petugas ASC");
                while($pt = mysqli_fetch_array($queryPt)){
                    echo "<option value='".$pt['id_petugas']."'>".$pt['nama_petugas']."</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jenis Perawatan</td>
        <td>:</td>
        <td>
            <input type="text" name="jenis_perawatan" size="50" placeholder="Contoh: Pembersihan Filter / Pengurasan Air" required />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnSimpan" value="Simpan Data" class="btn btn-primary" /></td>
    </tr>
</table>
</form>