<?php include_once "../src/koneksi.php"; ?>
<h3>DATA PERAWATAN</h3>
<a href="?open=tambah_perawatan">[ + Tambah Data Perawatan ]</a><br/><br/>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr bgcolor="#CCCCCC">
        <th width="5%">No</th>
        <th width="15%">Tanggal</th>
        <th width="20%">Nama Hewan</th>
        <th width="20%">Nama Petugas</th>
        <th width="25%">Jenis Perawatan</th>
        <th width="15%">Tools</th>
    </tr>
    <?php
    $sql = mysqli_query($koneksi, "SELECT perawatan.*, hewan_air.nama_hewan, petugas.nama_petugas 
            FROM perawatan 
            LEFT JOIN hewan_air ON perawatan.id_hewan = hewan_air.id_hewan 
            LEFT JOIN petugas ON perawatan.id_petugas = petugas.id_petugas 
            ORDER BY id_perawatan DESC");
    $no = 0;
    while ($data = mysqli_fetch_array($sql)) {
        $no++;
    ?>
    <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo $data['tanggal']; ?></td>
        <td><?php echo !empty($data['nama_hewan']) ? $data['nama_hewan'] : '-'; ?></td>
        <td><?php echo !empty($data['nama_petugas']) ? $data['nama_petugas'] : '-'; ?></td>
        <td><?php echo $data['jenis_perawatan']; ?></td>
        <td align="center">
            <a href="?open=edit_perawatan&id=<?php echo $data['id_perawatan']; ?>" class="btn-edit">Edit</a>
            <div style="margin-top: 5px;"></div>
            <a href="?open=hapus_perawatan&id=<?php echo $data['id_perawatan']; ?>" onclick="return confirm('Yakin ingin menghapus data perawatan ini?')" class="btn-hapus">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>