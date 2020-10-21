<?php

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];
    }

    $JumlahData = $Db -> rowCount ("SELECT idorderdetail FROM vorderdetail WHERE idorder = $Id");
    $Banyak = 2;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
        //   0 = (1 * 3) - 3
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM vorderdetail WHERE idorder = $Id ORDER BY idorderdetail ASC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>
<h3>Detail Pembelian</h3>
<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty ($Row)) { ?>
        <?php foreach ($Row as $r) : ?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['menu']?></td>
            <td><?php echo $r['harga']?></td>
            <td><?php echo $r['jumlah']?></td>
        </tr>
        <?php endforeach?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=Home&m=Detail&id=' . $r ['idorder'] . '&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>