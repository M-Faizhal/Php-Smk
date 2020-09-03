<?php 

    // Operator Matematika

    $a = 2;
    $b = 2;

    $c = $a + $b;

    echo $c . '<br>';

    $c = $a - $b;
    echo $c . '<br>';

    $c = $a * $b;
    echo $c . '<br>';

    $c = $a / $b;
    echo floor($c) . '<br>';

    $c = $a % $b;
    echo $c . '<br>';

    // Operator Logika

    $c = $a < $b;
    echo $c;

    $c = $a > $b;
    echo $c;

    $c = $a == $b;
    echo $c;

    $c = $a != $b;
    echo $c . '<br>';

    // Increment 
    $a++;
    echo $a . '<br>';

    // Operator String

    $Kata = 'Sura';
    $Kota = 'baya';

    $Hasil = $Kata . $Kota;

    $Hasil .= ' Kota Pahlawan';
    echo $Hasil;

?>