<?php 

    $Row =$Db -> getAll ("SELECT * FROM tblkategori ORDER BY kategori ASC");

?>

<h3>Insert Menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            <label for="">Kategori</label><br>
            <select name="idkategori" id="">
                <?php foreach ($Row as $R): ?>
                <option value="<?php echo $R ['idkategori'] ?>"><?php echo $R ['kategori'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group w-50">
            <label for="">Nama Menu</label>
            <input type="text" name="Menu" required placeholder="Isi Menu" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Harga</label>
            <input type="text" name="Harga" number required placeholder="Isi Harga" class="form-control">
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
        $Gambar = $_FILES ['Gambar']['name'];
        $Tmp = $_FILES ['Gambar']['tmp_name'];

        if (empty ($Gambar)) {
            echo "<h3>Gambar Kosong</h3>";
        }
        else {
            $SQL = "INSERT INTO tblmenu VALUES ('', $idkategori , '$Menu' , '$Gambar' , '$Harga')";
            move_uploaded_file ($Tmp,'../Upload/' . $Gambar);
            $Db -> runSQL ($SQL);
            header ("location:?f=Menu&m=Select");
        }
    
    }

?>