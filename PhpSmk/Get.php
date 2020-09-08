<form action="" method="get">
    
    Nama :
    <input type="text" name="Nama">
    Alamat :
    <input type="text" name="Alamat">

    <input type="submit" name="Kirim" value="Simpan">

</form>

<?php 

    if ( isset ($_GET ['Kirim']) ) {
        $Nama = $_GET ['Nama'];
        $Alamat = $_GET ['Alamat'];
    
        echo $Nama;
        echo "<br>";
        echo $Alamat;
    }

?>