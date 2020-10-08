<h3>Insert User</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama User</label>
            <input type="text" name="User" required placeholder="Isi User" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Email</label>
            <input type="email" name="Email" required placeholder="Email" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Password</label>
            <input type="password" name="Password" required placeholder="Password" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Konfirmasi Password</label>
            <input type="password" name="Konfirmasi" required placeholder="Password" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Level</label><br>
            <select name="Level" id="">
                <option value="Admin">Admin</option>
                <option value="Koki">Koki</option>
                <option value="Kasir">Kasir</option>
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
            $SQL = "INSERT INTO tbluser VALUE ('', '$User', '$Email', '$Password', '$Level', 1)";
            $Db -> runSQL ($SQL);
            header ("location:?f=User&m=Select");
        }
        else {
            echo "<h3>Password Tidak Sama Dengan Konfirmasi</h3>";
        }
    }

?>