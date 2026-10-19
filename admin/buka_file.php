<?php
# KONTROL MENU PROGRAM KEBUN BINATANG AIR
if(isset($_GET['open'])) {
    // Jika mendapatkan variabel URL ?open
    switch($_GET['open']) {
        case '':
            if(!file_exists ("informasi_utama.php")) die ("File tidak ada !");
            include "informasi_utama.php"; 
            break;

        case 'data_hewan' :
            if(!file_exists ("data_hewan.php")) die ("File tidak ada !");
            include "data_hewan.php"; break;
        case 'tambah_hewan' :
            if(!file_exists ("tambah_hewan.php")) die ("File tidak ada !");
            include "tambah_hewan.php"; break;
        case 'hapus_hewan' :
            if(!file_exists ("hapus_hewan.php")) die ("File tidak ada !");
            include "hapus_hewan.php"; break;
        case 'edit_hewan' :
            if(!file_exists ("edit_hewan.php")) die ("File tidak ada !");
            include "edit_hewan.php"; break;

        case 'data_akuarium' :
            if(!file_exists ("data_akuarium.php")) die ("File tidak ada !");
            include "data_akuarium.php"; break;
        case 'tambah_akuarium':
            if(!file_exists ("tambah_akuarium.php")) die ("File tidak ada !");
            include "tambah_akuarium.php"; break;
        case 'hapus_akuarium':
            if(!file_exists ("hapus_akuarium.php")) die ("File tidak ada !");
            include "hapus_akuarium.php"; break;
        case 'edit_akuarium':
            if(!file_exists ("edit_akuarium.php")) die ("File tidak ada !");
            include "edit_akuarium.php"; break;

        case 'data_perawatan':
            if(!file_exists("data_perawatan.php")) die("File tidak ada !");
            include "data_perawatan.php"; break;
        case 'tambah_perawatan':
            if(!file_exists("tambah_perawatan.php")) die("File tidak ada !");
            include "tambah_perawatan.php"; break;
        case 'hapus_perawatan':
            if(!file_exists("hapus_perawatan.php")) die("File tidak ada !");
            include "hapus_perawatan.php"; break;
        case 'edit_perawatan':
            if(!file_exists("edit_perawatan.php")) die("File tidak ada !");
            include "edit_perawatan.php"; break;

        case 'data_pertunjukan':
            include "data_pertunjukan.php";
            break;
        case 'tambah_pertunjukan':
            include "tambah_pertunjukan.php";
            break;
        case 'edit_pertunjukan':
            include "edit_pertunjukan.php";
            break; 
        
        case 'hapus_pertunjukan':
            include "hapus_pertunjukan.php";
            break; 

        case 'data_petugas' :
            if(!file_exists ("data_petugas.php")) die ("File tidak ada !");
            include "data_petugas.php"; break;
        case 'tambah_petugas' :
            if(!file_exists ("tambah_petugas.php")) die ("File tidak ada !");
            include "tambah_petugas.php"; break;
        case 'hapus_petugas' :
            if(!file_exists ("hapus_petugas.php")) die ("File tidak ada !");
            include "hapus_petugas.php"; break;
        case 'edit_petugas':
            if(!file_exists ("edit_petugas.php")) die ("File tidak ada !");
            include "edit_petugas.php"; break;

        case 'logout' :
            if(!file_exists ("logout.php")) die ("File tidak ada !");
            include "logout.php"; break;

        default:
            if(!file_exists ("informasi_utama.php")) die ("File tidak ada !");
            include "informasi_utama.php";
            break;
    }
}
else {
    // Jika tidak mendapatkan variabel URL: ?open
    if(!file_exists ("informasi_utama.php")) die ("File tidak ada !");
    include "informasi_utama.php";
}
?>