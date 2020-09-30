<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "SELECT * FROM tblkategori WHERE idkategori=$Id";

        $Row = $Db -> getItem ($SQL);
    }

?>
<h1>Update Kategori</h1>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama Kategori</label>
            <input type="text" name="Kategori" required value="<?php echo $Row['kategori']?>" class="form-control">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset ($_POST ['Simpan'])) {
        $Kategori = $_POST ['Kategori'];

        $SQL = "UPDATE tblkategori SET kategori = '$Kategori' WHERE idkategori = $Id";
        
        $Db -> runSQL ($SQL);

        header ("location:?f=Kategori&m=Select");
    }

?>