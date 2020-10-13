<div class="container">
    <div class="row">
        <div class="col-4 mx-auto mt-4">
            <div>
                <h3>LOGIN PELANGGAN</h3>
            </div>
            <div class="form-group">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="email" name="Email" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input type="password" name="Password" required class="form-control">
                    </div>
                    <div>
                    <input type="submit" name="Login" value="Login" class="btn btn-primary">
                    </div>
                </form>
        </div>
    </div>
</div>
<?php 

    if (isset ($_POST ['Login'])) {
        $Email = $_POST ['Email'];
        $Password = $_POST ['Password'];

        $SQL = "SELECT * FROM tblpelanggan WHERE email='$Email' AND password='$Password' AND aktif = 1";

        $Count = $Db -> rowCount ($SQL);

        if ($Count == 0) {
            echo "<center><h3>Email atau Password Salah</h3></center>";
        }
        else {
            $SQL = "SELECT * FROM tblpelanggan WHERE email='$Email' AND password='$Password' AND aktif = 1";
            $Row = $Db -> getItem ($SQL);

            $_SESSION ['Pelanggan'] = $Row ['email'];
            $_SESSION ['idpelanggan'] = $Row ['idpelanggan'];

            header ("location:Index.php");
        }
    }

?>