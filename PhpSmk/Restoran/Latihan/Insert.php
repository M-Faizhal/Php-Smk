<form action="" method="post">
    Kategori :
    <input type="text" name="Kategori">
    <br>
    <input type="submit" name="Simpan" value="Simpan">
</form>

<?php 

    require_once "../Function.php";

    if (isset ($_POST ['Simpan'])) {
        $Kategori = $_POST ['Kategori'];

        $SQL = "INSERT INTO tblkategori VALUES ('', '$Kategori')";

        $Result = mysqli_query($Koneksi, $SQL);

        header ("location:http://localhost/PhpSmk/Restoran/Kategori/Select.php");
    }

?>