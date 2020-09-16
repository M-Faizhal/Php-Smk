<?php 

    require_once "../Function.php";

    $SQL = "DELETE FROM tblkategori WHERE idkategori = $Id";

    $Result = mysqli_query ($Koneksi, $SQL);

    header ("location:http://localhost/PhpSmk/Restoran/Kategori/Select.php");

?>