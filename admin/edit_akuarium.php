<?php
include_once "../src/koneksi.php";

// Tangkap ID/Nomor Akuarium yang dikirim dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Ambil data akuarium berdasarkan nomor_akuarium
$queryData = mysqli_query($koneksi, "SELECT * FROM akuarium WHERE nomor_akuarium = '$id'");
$data = mysqli_fetch_array($queryData);

// Jika tombol Simpan Perubahan diklik
if (isset($_POST['btnUpdate'])) {
    $jenis_habitat = $_POST['jenis_habitat'];
    $lokasi_zona   = $_POST['lokasi_zona'];

    if (empty($jenis_habitat) || empty($lokasi_zona)) {
        echo "<font color='red'>Jenis Habitat dan Lokasi Zona wajib diisi!</font><br/><br/>";
    } else {
        // Query Update Data
        $update = mysqli_query($koneksi, "UPDATE akuarium SET 
                    jenis_habitat = '$jenis_habitat',
                    lokasi_zona   = '$lokasi_zona'
                    WHERE nomor_akuarium = '$id'");

        if ($update) {
            echo "<script>alert('Data Akuarium Berhasil Diubah'); window.location.href='?open=data_akuarium';</script>";
        } else {
            echo "<font color='red'>Gagal Memperbarui Data Akuarium!</font>";
        }
    }
}
?>

<form action="" method="post">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="3" bgcolor="#CCCCCC"><b>EDIT DATA AKUARIUM / KOLAM</b></td>
    </tr>
    <tr>
        <td width="25%">Nomor Akuarium / Kolam</td>
        <td width="2%">:</td>
        <td>
            <!-- Nomor Akuarium dibuat readonly agar tidak bisa diubah (Primary Key) -->
            <input type="text" name="nomor_akuarium" value="<?php echo htmlspecialchars($data['nomor_akuarium'] ?? ''); ?>" readonly style="background-color: #eee;" />
        </td>
    </tr>
    <tr>
        <td>Jenis Habitat</td>
        <td>:</td>
        <td>
            <select name="jenis_habitat" required>
                <option value="">-- Pilih Jenis Habitat --</option>
                <option value="Air Tawar" <?php if(($data['jenis_habitat'] ?? '') == 'Air Tawar') echo 'selected'; ?>>Air Tawar</option>
                <option value="Air Laut" <?php if(($data['jenis_habitat'] ?? '') == 'Air Laut') echo 'selected'; ?>>Air Laut</option>
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
                    <option value="Zona Air Tawar & Sungai" <?php if(($data['lokasi_zona'] ?? '') == 'Zona Air Tawar & Sungai') echo 'selected'; ?>>Zona Air Tawar & Sungai</option>
                </optgroup>

                <optgroup label="Ocean World (Air Laut)">
                    <option value="Zona Laut Dangkal & Karang" <?php if(($data['lokasi_zona'] ?? '') == 'Zona Laut Dangkal & Terumbu Karang') echo 'selected'; ?>>Zona Laut Dangkal & Terumbu Karang</option>
                    <option value="Zona Laut Dalam & Hiu" <?php if(($data['lokasi_zona'] ?? '') == 'Zona Laut Dalam & Hiu') echo 'selected'; ?>>Zona Laut Dalam (Ocean Tunnel / Hiu)</option>
                </optgroup>

                <optgroup label="Safari & Arena Pertunjukan">
                    <option value="Zona Panggung Utama / Atraksi" <?php if(($data['lokasi_zona'] ?? '') == 'Zona Panggung Utama / Atraksi') echo 'selected'; ?>>Zona Panggung Utama / Atraksi</option>
                </optgroup>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>
            <input type="submit" name="btnUpdate" value="Simpan Perubahan" class="btn btn-primary" />
            <a href="?open=data_akuarium" class="btn btn-secondary">Batal</a>
        </td>
    </tr>
</table>
</form>