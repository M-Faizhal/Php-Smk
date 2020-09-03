<?php 



    function Belajar () {
        echo "Saya belajar Php";
    }

    function LuasPersegi ($p =5, $l = 3) {
        $Luas = $p * $l;
    
        echo $Luas;
    }

    function Luas ($p =5, $l = 3) {
        $Luas = $p * $l;
    
        return $Luas;
    }

    function Output () {
        return "Belajar function";
    }

    echo Luas (100, 3) * 5;

?>