<?php include_once "../src/koneksi.php"; ?>
<h3>JADWAL PERTUNJUKAN</h3>
<a href="?open=tambah_pertunjukan">[ + Tambah Pertunjukan ]</a><br/><br/>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr bgcolor="#CCCCCC">
        <th width="5%">No</th>
        <th width="25%">Nama Acara</th>
        <th width="15%">Jadwal Jam</th>
        <th width="25%">Lokasi Kolam</th>
        <th width="20%">Hewan yang Tampil</th>
        <th width="10%">Tools</th>
    </tr>
    <?php
    $sql = mysqli_query($koneksi, "SELECT pertunjukan.*, hewan_air.nama_hewan 
            FROM pertunjukan 
            LEFT JOIN hewan_air ON pertunjukan.id_hewan = hewan_air.id_hewan 
            ORDER BY id_pertunjukan DESC");
    $no = 0;
    while ($data = mysqli_fetch_array($sql)) {
        $no++;
        $hewan = !empty($data['nama_hewan']) ? $data['nama_hewan'] : '-';
        // Format jam menjadi AM / PM (contoh: 10:40 AM)
        $jam_formatted = !empty($data['jadwal_jam']) ? date('h:i A', strtotime($data['jadwal_jam'])) : '-';
    ?>
    <tr>
        <td align="center"><?php echo $no; ?></td>
        <td><?php echo $data['nama_acara']; ?></td>
        <td align="center"><?php echo $jam_formatted; ?></td>
        <td><?php echo $data['lokasi_kolam']; ?></td>
        <td><?php echo $hewan; ?></td>
        <td align="center">
            <a href="?open=edit_pertunjukan&id=<?php echo $data['id_pertunjukan']; ?>" class="btn-edit">Edit</a>
            <div style="margin-top: 5px;"></div>
            <a href="?open=hapus_pertunjukan&id=<?php echo $data['id_pertunjukan']; ?>" onclick="return confirm('Yakin mau hapus pertunjukan ini?')" class="btn-hapus">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>