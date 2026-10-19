<?php
include_once "../src/koneksi.php";
?>

<h3>DATA AKUARIUM</h3>

<p>
    <a href="?open=tambah_akuarium" class="btn btn-primary">[ + Tambah Data Akuarium ]</a>
</p>

<table width="100%" border="1" cellspacing="0" cellpadding="8">
    <tr bgcolor="#2196F3" style="color: white; text-align: center;">
        <th width="5%">No</th>
        <th width="25%">No. Akuarium</th>
        <th width="25%">Jenis Habitat</th>
        <th width="30%">Lokasi Zona</th>
        <th width="15%">Tools</th>
    </tr>

    <?php
    // Query mengambil data akuarium
    $query = mysqli_query($koneksi, "SELECT * FROM akuarium ORDER BY nomor_akuarium ASC");
    $nomor = 1;
    
    if(mysqli_num_rows($query) > 0){
        while($data = mysqli_fetch_array($query)){
    ?>
    <tr align="center">
        <td><?php echo $nomor++; ?></td>
        <td><?php echo htmlspecialchars($data['nomor_akuarium']); ?></td>
        <td><?php echo htmlspecialchars($data['jenis_habitat']); ?></td>
        <td><?php echo htmlspecialchars($data['lokasi_zona']); ?></td>
        <td>
            <a href="?open=edit_akuarium&id=<?php echo $data['nomor_akuarium']; ?>" class="btn btn-sm btn-info">Edit</a> 
            <a href="?open=hapus_akuarium&id=<?php echo $data['nomor_akuarium']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
        </td>
    </tr>
    <?php 
        }
    } else {
        echo "<tr><td colspan='5' align='center'>Data akuarium belum ada.</td></tr>";
    }
    ?>
</table>