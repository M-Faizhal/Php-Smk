<?php

    $JumlahData = $Db -> rowCount ("SELECT idorder FROM vorder ");
    $Banyak = 2;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM vorder ORDER BY Status,idorder ASC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>
<h3>Order Pembelian</h3>
<table class="table table-bordered w-60">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty ($Row)) { ?>
            <?php foreach ($Row as $r) : ?>
                <?php 
                    if ($r ['status'] == 0) {
                        $Status = '<td><a href="?f=Order&m=Bayar&id= ' . $r['idorder'] . '">Bayar</a></td>';
                    }
                    else {
                        $Status = '<td>Lunas</td>';
                    }
                ?>
                <tr>
                    <td><?php echo $No++?></td>
                    <td><?php echo $r['pelanggan']?></td>
                    <td><?php echo $r['tglorder']?></td>
                    <td><?php echo $r['total']?></td>
                    <td><?php echo $r['bayar']?></td>
                    <td><?php echo $r['kembali']?></td>
                    <?php echo $Status; ?>
                </tr>
            <?php endforeach?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=Order&m=Select&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>