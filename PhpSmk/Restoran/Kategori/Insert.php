<h3>Insert Kategori</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama Kategori</label>
            <input type="text" name="Kategori" required placeholder="Isi kategori" class="form-control">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset ($_POST ['Simpan'])) {
        $Kategori = $_POST ['Kategori'];

        $SQL = "INSERT INTO tblkategori VALUE ('', '$Kategori')";
        
        $Db -> runSQL ($SQL);

        header ("location:?f=Kategori&m=Select");
    }

?>