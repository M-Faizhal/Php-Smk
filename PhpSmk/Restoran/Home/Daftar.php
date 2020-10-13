<h3>Registrasi Pelanggan</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Pelanggan :</label>
            <input type="text" name="Pelanggan" required placeholder="Isi Pelanggan" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Alamat :</label>
            <input type="text" name="Alamat" required placeholder="Isi Alamat" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">No. Telepon :</label>
            <input type="text" name="Telepon" required placeholder="Isi Telepon" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Email :</label>
            <input type="email" name="Email" required placeholder="Email" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Password :</label>
            <input type="password" name="Password" required placeholder="Password" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Konfirmasi Password :</label>
            <input type="password" name="Konfirmasi" required placeholder="Password" class="form-control">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset ($_POST ['Simpan'])) {
        $Pelanggan = $_POST ['Pelanggan'];
        $Alamat = $_POST ['Alamat'];
        $Telepon = $_POST ['Telepon'];
        $Email = $_POST ['Email'];
        $Password = $_POST ['Password'];
        $Konfirmasi = $_POST ['Konfirmasi'];

        if ($Password === $Konfirmasi) {
            $SQL = "INSERT INTO tblpelanggan VALUE ('', '$Pelanggan', '$Alamat', '$Telepon', '$Email', '$Password', 1)";
            $Db -> runSQL ($SQL);
            header ("location:?f=Home&m=Info");
        }
        else {
            echo "<h3>Password Tidak Sama Dengan Konfirmasi</h3>";
        }
    }

?>