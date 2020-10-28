<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "SELECT * FROM tblorder WHERE idorder=$Id";

        $Row = $Db -> getItem ($SQL);
    }

?>
<h1>Pembayaran Order</h1>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Total</label>
            <input type="number" name="Total" required value="<?php echo $Row['total']?>" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">Bayar</label>
            <input type="number" name="Bayar" required class="form-control">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Bayar" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

    if (isset ($_POST ['Simpan'])) {
        $Bayar = $_POST ['Bayar'];

        $Kembali = $Bayar - $Row['total'] ;

        $SQL = "UPDATE tblorder SET bayar = $Bayar, kembali = $Kembali, status=1 WHERE idorder = $Id";

        if ($Kembali < 0) {
            echo "<h3>Pembayaran Kurang</h3>";
        }
        else {
            $Db -> runSQL ($SQL);

            header ("location:?f=Order&m=Select");
        }
    }

?>