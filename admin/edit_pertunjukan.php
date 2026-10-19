<?php
include_once "../src/koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pertunjukan WHERE id_pertunjukan='$id'");
$data = mysqli_fetch_array($query);

if(isset($_POST['btnSimpan'])){
    $nama_acara   = $_POST['nama_acara'];
    $jadwal_jam   = $_POST['jadwal_jam'];
    $lokasi_kolam = $_POST['lokasi_kolam'];
    $id_hewan     = $_POST['id_hewan'];

    $update = mysqli_query($koneksi, "UPDATE pertunjukan SET 
                nama_acara='$nama_acara', 
                jadwal_jam='$jadwal_jam', 
                lokasi_kolam='$lokasi_kolam', 
                id_hewan='$id_hewan' 
                WHERE id_pertunjukan='$id'");

    if($update){
        echo "<script>alert('Data Pertunjukan Berhasil Diubah'); window.location.href='?open=data_pertunjukan';</script>";
    } else {
        echo "<font color='red'>Gagal Memperbarui Data!</font>";
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>EDIT JADWAL PERTUNJUKAN</b></td>
    </tr>
    <tr>
        <td width="25%">Nama Acara</td>
        <td width="2%">:</td>
        <td>
            <select name="nama_acara" required>
                <option value="">-- Pilih Nama Acara --</option>
                <?php
                $arrAcara = [
                    "Sesi Feeding Capybara",
                    "Pemberian Makan Pinguin",
                    "Atraksi Lumba-lumba",
                    "Pertunjukan Singa Laut",
                    "Atraksi Berang-Berang Pintar",
                    "Sesi Feeding Penyu Laut",
                    "Meet & Greet Satwa Air",
                    "Atraksi Anjing Laut",
                    "Edukasi Biota Laut & Terumbu Karang"
                ];
                foreach($arrAcara as $acara){
                    $selected = ($data['nama_acara'] == $acara) ? 'selected' : '';
                    echo "<option value='$acara' $selected>$acara</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jadwal Jam</td>
        <td>:</td>
        <td><input type="time" name="jadwal_jam" value="<?php echo $data['jadwal_jam']; ?>" required /></td>
    </tr>
    <tr>
        <td>Lokasi Kolam</td>
        <td>:</td>
        <td>
            <select name="lokasi_kolam" required>
                <option value="">-- Pilih Lokasi Kolam --</option>
                
                <optgroup label="Area Kolam Utama">
                    <option value="Kolam Utama 1" <?php echo ($data['lokasi_kolam']=='Kolam Utama 1')?'selected':''; ?>>Kolam Utama 1</option>
                    <option value="Kolam Utama 2" <?php echo ($data['lokasi_kolam']=='Kolam Utama 2')?'selected':''; ?>>Kolam Utama 2</option>
                    <option value="Kolam Utama 3" <?php echo ($data['lokasi_kolam']=='Kolam Utama 3')?'selected':''; ?>>Kolam Utama 3</option>
                </optgroup>

                <optgroup label="Area Panggung Pertunjukan">
                    <option value="Panggung Lumba-Lumba" <?php echo ($data['lokasi_kolam']=='Panggung Lumba-Lumba')?'selected':''; ?>>Panggung Lumba-Lumba</option>
                    <option value="Panggung Anjing Laut" <?php echo ($data['lokasi_kolam']=='Panggung Anjing Laut')?'selected':''; ?>>Panggung Anjing Laut</option>
                    <option value="Panggung Singa Laut" <?php echo ($data['lokasi_kolam']=='Panggung Singa Laut')?'selected':''; ?>>Panggung Singa Laut</option>
                    <option value="Panggung Atraksi Luar" <?php echo ($data['lokasi_kolam']=='Panggung Atraksi Luar')?'selected':''; ?>>Panggung Atraksi Luar</option>
                </optgroup>

                <optgroup label="Area Indoor & Akuarium">
                    <option value="Akuarium Raksasa Air Laut" <?php echo ($data['lokasi_kolam']=='Akuarium Raksasa Air Laut')?'selected':''; ?>>Akuarium Raksasa Air Laut</option>
                    <option value="Akuarium Utama Air Tawar" <?php echo ($data['lokasi_kolam']=='Akuarium Utama Air Tawar')?'selected':''; ?>>Akuarium Utama Air Tawar</option>
                    <option value="Tunnel Terowongan Akuarium" <?php echo ($data['lokasi_kolam']=='Tunnel Terowongan Akuarium')?'selected':''; ?>>Tunnel Terowongan Akuarium</option>
                    <option value="Zona Touchpool (Kolam Sentuh)" <?php echo ($data['lokasi_kolam']=='Zona Touchpool (Kolam Sentuh)')?'selected':''; ?>>Zona Touchpool (Kolam Sentuh)</option>
                </optgroup>
            </select>
        </td>
    </tr>
    <tr>
        <td>Hewan Tampil</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnSimpan" value="Simpan Perubahan" /></td>
    </tr>
</table>
</form>