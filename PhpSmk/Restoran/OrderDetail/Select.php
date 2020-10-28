<h3>Detail Pembelian</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50 float-left">
            <label for="">Tanggal Awal</label>
            <input type="date" name="Tawal" required class="form-control">
        </div>
        <div class="form-group w-50 float-left">
            <label for="">Tanggal Akhir</label>
            <input type="date" name="Takhir" required class="form-control">
        </div>
        <div>
            <input type="submit" name="Simpan" value="Cari" class="btn btn-primary">
        </div>
    </form>
</div>

<?php

    $JumlahData = $Db -> rowCount ("SELECT idorderdetail FROM vorderdetail");
    $Banyak = 3;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $Mulai, $Banyak";
    
    if (isset ($_POST ['Simpan'])) {
        $Tawal = $_POST ['Tawal'];
        $Takhir = $_POST ['Takhir'];
        $SQL = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$Tawal' AND '$Takhir'";
    }

    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;

    $Total = 0;
?>

<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty ($Row)) { ?>
            <?php foreach ($Row as $r) : ?>
                <tr>
                    <td><?php echo $No++?></td>
                    <td><?php echo $r['pelanggan']?></td>
                    <td><?php echo $r['tglorder']?></td>
                    <td><?php echo $r['menu']?></td>
                    <td><?php echo $r['harga']?></td>
                    <td><?php echo $r['jumlah']?></td>
                    <td><?php echo $r['jumlah'] * $r['harga']?></td>
                    <td><?php echo $r['alamat']?></td>
                    <?php $Total = $Total + ($r['jumlah'] * $r['harga']);?>
                </tr>
            <?php endforeach?>
        <?php } ?>
        <tr>
            <td colspan="6"><h3>Grand Total</h3></td>
            <td><h4><?php echo $Total; ?></h4></td>
        </tr>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=OrderDetail&m=Select&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>