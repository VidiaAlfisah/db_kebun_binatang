<?php include_once "../src/koneksi.php"; ?>
<h3>DATA PETUGAS</h3>
<a href="?open=tambah_petugas" class="btn btn-primary">[ + Tambah Data Petugas ]</a><br/><br/>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr bgcolor="#CCCCCC">
        <th width="5%">No</th>
        <th width="20%">Username</th>
        <th width="35%">Nama Petugas</th>
        <th width="20%">Level</th>
        <th width="20%">Tools</th>
    </tr>
    <?php
    $sql = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY id_petugas DESC");
    $no = 0;
    while ($data = mysqli_fetch_array($sql)) {
        $no++;
    ?>
    <tr>
        <td align="center"><?php echo $no; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['nama_petugas']; ?></td>
        <td align="center"><?php echo $data['level']; ?></td>
        <td align="center">
            <a href="?open=edit_petugas&id=<?php echo $data['id_petugas']; ?>" class="btn btn-edit">Edit</a>
            <a href="hapus_petugas.php?id=<?php echo $data['id_petugas']; ?>" onclick="return confirm('Yakin mau hapus petugas ini?')" class="btn btn-hapus">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>