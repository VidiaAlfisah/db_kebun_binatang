<?php
include_once "../src/koneksi.php";

if(isset($_POST['btnSimpan'])){
    $nama_acara   = $_POST['nama_acara'];
    $jadwal_jam   = $_POST['jadwal_jam'];
    $lokasi_kolam = $_POST['lokasi_kolam'];
    $id_hewan     = $_POST['id_hewan'];

    if (empty($nama_acara) || empty($jadwal_jam) || empty($lokasi_kolam) || empty($id_hewan)) {
        echo "<font color='red'>Semua data wajib diisi!</font><br/><br/>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO pertunjukan (nama_acara, jadwal_jam, lokasi_kolam, id_hewan) 
                VALUES ('$nama_acara', '$jadwal_jam', '$lokasi_kolam', '$id_hewan')");
        if($sql){
            echo "<script>alert('Data Pertunjukan Berhasil Disimpan'); window.location.href='?open=data_pertunjukan';</script>";
        } else {
            echo "<font color='red'>Data Gagal Disimpan!</font>";
        }
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>TAMBAH JADWAL PERTUNJUKAN</b></td>
    </tr>
    <tr>
        <td width="25%">Nama Acara</td>
        <td width="2%">:</td>
        <td>
            <select name="nama_acara" required>
                <option value="">-- Pilih Nama Acara --</option>
                <option value="Sesi Feeding Capybara">Sesi Feeding Capybara</option>
                <option value="Pemberian Makan Pinguin">Pemberian Makan Pinguin</option>
                <option value="Atraksi Lumba-lumba">Atraksi Lumba-lumba</option>
                <option value="Pertunjukan Singa Laut">Pertunjukan Singa Laut</option>
                <option value="Atraksi Berang-Berang Pintar">Atraksi Berang-Berang Pintar</option>
                <option value="Sesi Feeding Penyu Laut">Sesi Feeding Penyu Laut</option>
                <option value="Meet & Greet Satwa Air">Meet & Greet Satwa Air</option>
                <option value="Atraksi Anjing Laut">Atraksi Anjing Laut</option>
                <option value="Edukasi Biota Laut & Terumbu Karang">Edukasi Biota Laut & Terumbu Karang</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jadwal Jam</td>
        <td>:</td>
        <td><input type="time" name="jadwal_jam" required /></td>
    </tr>
    <tr>
        <td>Lokasi Kolam</td>
        <td>:</td>
        <td>
            <select name="lokasi_kolam" required>
                <option value="">-- Pilih Lokasi Kolam --</option>
                
                <optgroup label="Area Kolam Utama">
                    <option value="Kolam Utama 1">Kolam Utama 1</option>
                    <option value="Kolam Utama 2">Kolam Utama 2</option>
                    <option value="Kolam Utama 3">Kolam Utama 3</option>
                </optgroup>

                <optgroup label="Area Panggung Pertunjukan">
                    <option value="Panggung Lumba-Lumba">Panggung Lumba-Lumba</option>
                    <option value="Panggung Anjing Laut">Panggung Anjing Laut</option>
                    <option value="Panggung Singa Laut">Panggung Singa Laut</option>
                    <option value="Panggung Atraksi Luar">Panggung Atraksi Luar</option>
                </optgroup>

                <optgroup label="Area Indoor & Akuarium">
                    <option value="Akuarium Raksasa Air Laut">Akuarium Raksasa Air Laut</option>
                    <option value="Akuarium Utama Air Tawar">Akuarium Utama Air Tawar</option>
                    <option value="Tunnel Terowongan Akuarium">Tunnel Terowongan Akuarium</option>
                    <option value="Zona Touchpool (Kolam Sentuh)">Zona Touchpool (Kolam Sentuh)</option>
                </optgroup>
            </select>
        </td>
    </tr>
    <tr>
        <td>Hewan Tampil</td>
        <td>:</td>
        <td>
            <select name="id_hewan" required>
                <option value="">-- Pilih Hewan --</option>
                <?php
                $sqlHw = mysqli_query($koneksi, "SELECT * FROM hewan_air ORDER BY nama_hewan ASC");
                while($rowHw = mysqli_fetch_array($sqlHw)){
                    echo "<option value='$rowHw[id_hewan]'>$rowHw[nama_hewan]</option>";
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