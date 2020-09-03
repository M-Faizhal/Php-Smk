<?php 

    $Hari = 4;

    // switch ($Hari) {
    //     case 1:
    //         echo 'Minggu';
    //         break;
    //     case 2:
    //         echo 'Senin';
    //         break;
    //     case 3:
    //         echo 'Selasa';
    //         break;
        
    //     default:
    //         echo 'Hari belum dibuat';
    //         break;
    // }

    $Pilihan = 'Tambah';

    switch ($Pilihan) {
        case 'Tambah':
            echo 'Anda memilih tambah';
            break;
        case 'Ubah':
            echo 'Anda memilih ubah';
            break;
        case 'Hapus':
            echo 'Anda memilih hapus';
            break;
        
        default:
            echo 'Pilihan belum ada';
            break;
    }

?>