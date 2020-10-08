<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "SELECT * FROM tblmenu WHERE idmenu = $Id";

        $Item = $Db -> getItem ($SQL);

        $idkategori = $Item ['idkategori'];
    }

    $Row =$Db -> getAll ("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>

<h3>Insert Menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">Kategori</label><br>
            <select name="idkategori" id="">
                <?php foreach ($Row as $R): ?>
                <option <?php if ($idkategori == $R ['idkategori']) echo "selected"?> value="<?php echo $R ['idkategori'] ?>"><?php echo $R ['kategori'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group w-50">
            <label for="">Nama Menu</label>
            <input type="text" name="Menu" required value="<?php echo $Item ['menu']?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Harga</label>
            <input type="text" name="Harga" number required value="<?php echo $Item ['harga']?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Gambar</label><br>
            <input type="file" name="Gambar">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset ($_POST ['Simpan'])) {
        $idkategori = $_POST ['idkategori'];
        $Menu = $_POST ['Menu'];
        $Harga = $_POST ['Harga'];
        $Gambar = $Item ['gambar'];
        $Tmp = $_FILES ['Gambar']['tmp_name'];

        if (!empty ($Tmp)) {
            $Gambar = $_FILES ['Gambar']['name'];
            move_uploaded_file ($Tmp,'../Upload/' . $Gambar);
        }

        $SQL = "UPDATE tblmenu SET idkategori = $idkategori, menu = '$Menu', gambar = '$Gambar', harga = $Harga WHERE idmenu = $Id";

        $Db -> runSQL ($SQL);
        header ("location:?f=Menu&m=Select");
    }

?>