<?php
include_once "../src/koneksi.php";

if(isset($_POST['btnSimpan'])){
    $nomor_akuarium = $_POST['nomor_akuarium'];
    $jenis_habitat  = $_POST['jenis_habitat'];
    $lokasi_zona    = $_POST['lokasi_zona'];

    if (empty($nomor_akuarium) || empty($jenis_habitat) || empty($lokasi_zona)) {
        echo "<font color='red'>Nomor Akuarium, Jenis Habitat, dan Lokasi Zona wajib diisi!</font><br/><br/>";
    } else {
        // Query Simpan Data Akuarium (Mencocokkan kolom asli di database)
        $sql = mysqli_query($koneksi, "INSERT INTO akuarium (nomor_akuarium, jenis_habitat, lokasi_zona) 
                VALUES ('$nomor_akuarium', '$jenis_habitat', '$lokasi_zona')");
        
        if($sql){
            echo "<script>alert('Data Akuarium/Kolam Berhasil Disimpan'); window.location.href='?open=data_akuarium';</script>";
        } else {
            echo "<font color='red'>Gagal Menyimpan Data Akuarium!</font>";
        }
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>TAMBAH DATA AKUARIUM / KOLAM</b></td>
    </tr>
    <tr>
        <td width="25%">Nomor Akuarium / Kolam</td>
        <td width="2%">:</td>
        <td>
            <select name="nomor_akuarium" required>
                <option value="">-- Pilih Kode Akuarium --</option>
                <option value="AK-LAUT-01">AK-LAUT-01</option>
                <option value="AK-LAUT-02">AK-LAUT-02</option>
                <option value="AK-TAWAR-01">AK-TAWAR-01</option>
                <option value="AK-TAWAR-02">AK-TAWAR-02</option>
                <option value="KLM-SHOW-01">KLM-SHOW-01</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jenis Habitat</td>
        <td>:</td>
        <td>
            <select name="jenis_habitat" required>
                <option value="">-- Pilih Jenis Habitat --</option>
                <option value="Air Tawar">Air Tawar</option>
                <option value="Air Laut">Air Laut</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Lokasi Zona</td>
        <td>:</td>
        <td>
            <select name="lokasi_zona" required>
                <option value="">-- Pilih Lokasi Zona --</option>
                
                <optgroup label="River World (Air Tawar)">
                    <option value="Zona Air Tawar & Sungai">Zona Air Tawar & Sungai</option>
                </optgroup>

                <optgroup label="Ocean World (Air Laut)">
                    <option value="Zona Laut Dangkal & Karang">Zona Laut Dangkal & Terumbu Karang</option>
                    <option value="Zona Laut Dalam & Hiu">Zona Laut Dalam (Ocean Tunnel / Hiu)</option>
                </optgroup>

                <optgroup label="Safari & Arena Pertunjukan">
                    <option value="Zona Panggung Utama / Atraksi">Zona Panggung Utama / Atraksi</option>
                </optgroup>
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