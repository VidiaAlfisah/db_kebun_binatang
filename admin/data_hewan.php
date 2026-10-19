<?php include_once "../src/koneksi.php"; ?>

<style>
/* CSS Khusus Layout Card Hewan */
.header-hewan-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header-hewan-container h3 {
    margin: 0;
    color: #0284c7;
    font-size: 22px;
}

.btn-tambah-data {
    display: inline-block;
    padding: 8px 16px;
    background: #0284c7;
    color: white !important;
    text-decoration: none;
    font-weight: bold;
    border-radius: 8px;
    transition: 0.2s;
}

.btn-tambah-data:hover {
    background: #0369a1;
}

/* Grid Kartu seperti Contoh Pahlawan */
.card-grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card-item {
    background: #ffffff;
    width: 240px;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    border: 1px solid #e0f2fe;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Gambar Besar Paling Atas di Kartu */
.card-item img.img-card-top {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 12px;
}

.card-item h4 {
    margin: 0 0 12px 0;
    font-size: 18px;
    color: #0f172a;
}

/* Tombol Merah/Biru Lihat Selengkapnya */
.btn-lihat-detail {
    background: #0284c7;
    color: #ffffff;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
    margin-bottom: 10px;
    transition: 0.2s;
}

.btn-lihat-detail:hover {
    background: #0369a1;
}

/* Tombol Edit & Hapus Kecil */
.card-tools {
    display: flex;
    gap: 10px;
    width: 100%;
    justify-content: center;
}

.card-tools a {
    font-size: 12px;
    text-decoration: none;
    padding: 4px 10px;
    border-radius: 6px;
    color: white !important;
    font-weight: bold;
}

.btn-edit-card { background: #f59e0b; }
.btn-hapus-card { background: #ef4444; }

/* MODAL POP-UP (Persis Contoh Gambar Pahlawan) */
.modal-overlay-bg {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
}

.modal-content-box {
    background: #ffffff;
    width: 360px;
    padding: 25px;
    border-radius: 16px;
    text-align: center;
    position: relative;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.modal-close-icon {
    position: absolute;
    top: 10px; right: 15px;
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
    color: #64748b;
}

/* Foto Lingkaran Besar di Modal */
.img-modal-circle {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px;
}

.modal-content-box h3 {
    margin: 0 0 12px 0;
    color: #0f172a;
    font-size: 20px;
}

.modal-desc-text {
    font-size: 13px;
    color: #334155;
    line-height: 1.6;
    text-align: center;
}
</style>

<div class="header-hewan-container">
    <h3>DATA HEWAN AIR</h3>
    <a href="?open=tambah_hewan" class="btn-tambah-data">+ Tambah Data Hewan</a>
</div>

<!-- CONTAINER KARTU HEWAN -->
<div class="card-grid-container">
    <?php
    $sql = mysqli_query($koneksi, "SELECT * FROM hewan_air 
            JOIN akuarium ON hewan_air.id_akuarium = akuarium.id_akuarium 
            ORDER BY id_hewan ASC");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
    <div class="card-item">
        <!-- 1. GAMBAR BESAR PALING ATAS -->
        <img src="images/<?php echo $data['gambar']; ?>" class="img-card-top" alt="<?php echo $data['nama_hewan']; ?>">
        
        <!-- 2. NAMA HEWAN DI TENGAH -->
        <h4><?php echo $data['nama_hewan']; ?></h4>
        
        <!-- 3. TOMBOL LIHAT SELENGKAPNYA -->
        <button class="btn-lihat-detail" onclick="bukaModal(
            '<?php echo addslashes($data['nama_hewan']); ?>', 
            'images/<?php echo $data['gambar']; ?>', 
            'Akuarium: <?php echo addslashes($data['nomor_akuarium']); ?> | Habitat: <?php echo addslashes($data['jenis_habitat']); ?> | Umur: <?php echo addslashes($data['umur']); ?> | Jumlah: <?php echo addslashes($data['jumlah']); ?> ekor'
        )">Lihat Selengkapnya</button>

        <!-- Tool Admin (Edit & Hapus) -->
        <div class="card-tools">
            <a href="?open=edit_hewan&id=<?php echo $data['id_hewan']; ?>" class="btn-edit-card">Edit</a>
            <a href="?open=hapus_hewan&id=<?php echo $data['id_hewan']; ?>" onclick="return confirm('Yakin ingin menghapus data <?php echo $data['nama_hewan']; ?>?')" class="btn-hapus-card">Hapus</a>
        </div>
    </div>
    <?php } ?>
</div>

<!-- MODAL POP-UP (Persis Tampilan Pahlawan) -->
<div id="modalDetail" class="modal-overlay-bg">
    <div class="modal-content-box">
        <span class="modal-close-icon" onclick="tutupModal()">&times;</span>
        
        <!-- Gambar Lingkaran di Modal -->
        <img id="modalImg" src="" class="img-modal-circle">
        
        <h3 id="modalNama"></h3>
        
        <p id="modalDesc" class="modal-desc-text"></p>
    </div>
</div>

<script>
function bukaModal(nama, gambar, deskripsi) {
    document.getElementById('modalNama').innerText = nama;
    document.getElementById('modalImg').src = gambar;
    document.getElementById('modalDesc').innerText = deskripsi;
    
    document.getElementById('modalDetail').style.display = 'flex';
}

function tutupModal() {
    document.getElementById('modalDetail').style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('modalDetail');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>