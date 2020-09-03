<?php 

    // $Nama = array ('Tejo', 'Budi', 'Siti', 100);

    // var_dump($Nama);

    // echo "<br>";

    // foreach ($Nama as $key) {
    //     echo $key . '<br>';
    // }

    $Nama = array (
        "Tejo" => "Surabaya",
        "Budi" => "Malang",
        "Siti" => "Sidoarjo"
    );

    var_dump($Nama);
    echo '<br>';
    foreach ($Nama as $A => $B) {
        echo $A . ' - ' . $B;
        echo '<br>';
    }

?>