<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "SELECT * FROM tbluser WHERE iduser=$Id";
        $Row = $Db -> getItem ($SQL);
    }

?>

<h3>Update User</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama User</label>
            <input type="text" name="User" required value="<?php echo $Row ['user'] ?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="Email" required value="<?php echo $Row ['email'] ?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="Password" required value="<?php echo $Row ['password'] ?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="Konfirmasi" required value="<?php echo $Row ['password'] ?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Level</label><br>
            <select name="Level" id="">
                <option value="Admin" <?php if ($Row ['level'] == "Admin") echo "Selected"?>>Admin</option>
                <option value="Koki" <?php if ($Row ['level'] == "Koki") echo "Selected"?>>Koki</option>
                <option value="Kasir" <?php if ($Row ['level'] == "Kasir") echo "Selected"?>>Kasir</option>
            </select>
        </div>
        <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset ($_POST ['Simpan'])) {
        $User = $_POST ['User'];
        $Email = $_POST ['Email'];
        $Password = $_POST ['Password'];
        $Konfirmasi = $_POST ['Konfirmasi'];
        $Level = $_POST ['Level'];

        if ($Password === $Konfirmasi) {
            $SQL = "UPDATE tbluser SET user='$User', email='$Email', password='$Password', level='$Level' WHERE iduser=$Id";

            $Db -> runSQL ($SQL);
            header ("location:?f=User&m=Select");
        }
        else {
            echo "<h3>Password Tidak Sama Dengan Konfirmasi</h3>";
        }
    }

?>