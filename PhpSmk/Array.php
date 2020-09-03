<?php 

    // Array Dimensi

    // $Nama = array ("Joni", "Tejo", "Budi", "Siti", 100, 2.5);

    // var_dump($Nama);

    // echo '<br>';

    // echo $Nama[5];

    // echo '<br>';

    // for ($i = 0; $i < 6; $i++) { 
    //     // echo $i;
    //     echo $Nama[$i] . '<br>';
    // }

    // foreach ($Nama as $K) {
    //     echo $K . '<br>';
    // }

    // Array Assosiatif

    // $Nama = array (
    //     "Joni" => "Surabaya",
    //     "Budi" => "Malang Raya",
    //     "Tejo" => "Jakarta",
    //     "Siti" => "Sidoarjo"
    // );

    $Nama['Joni'] = "Surabaya";
    $Nama['Budi'] = "Malang Raya";
    $Nama['Tejo'] = "Jakarta";
    $Nama['Siti'] = "Sidoarjo";
    $Nama['Edi'] = "Semarang";

    var_dump($Nama);

    echo '<br>';

    // echo $Nama['Budi'];

    foreach ($Nama as $K => $V) {
        echo $K . " => " . $V;

        echo "<br>";
    }


?>