
<?php 

    require_once "../Function.php";

    $SQL = "SELECT * FROM tblkategori WHERE idkategori = $Id";
    $Result = mysqli_query ($Koneksi, $SQL);

    $Row = mysqli_fetch_assoc ($Result);

    // $Kategori = 'Jelly Bean';
    // $Id = 13;
    // $SQL = "UPDATE tblkategori SET kategori = '$Kategori' WHERE idkategori = $Id";

    // $Result = mysqli_query ($Koneksi, $SQL);

    // echo $SQL;

?>

<form action="" method="post">
    Kategori : 
    <input type="text" name="Kategori" value="<?Php echo $Row ['kategori']?>">
    <br>
    <input type="submit" name="Simpan" value="Simpan">
</form>

<?php 

    if (isset ($_POST ['Simpan'])) {
        
        $Kategori = $_POST ['Kategori'];
        
        $SQL = "UPDATE tblkategori SET kategori = '$Kategori' WHERE idkategori = $Id";

        $Result = mysqli_query ($Koneksi, $SQL);

        echo $SQL;

        header ("location:http://localhost/PhpSmk/Restoran/Kategori/Select.php");
    }

?>