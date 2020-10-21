<?php

    $Email = $_SESSION ['Pelanggan'];
    $JumlahData = $Db -> rowCount ("SELECT idorder FROM vorder WHERE email = '$Email'");
    $Banyak = 2;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM vorder WHERE email = '$Email' ORDER BY tglorder DESC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>
<h3>Histori Pembelian</h3>
<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty ($Row)) { ?>
        <?php foreach ($Row as $r) : ?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['tglorder']?></td>
            <td><?php echo $r['total']?></td>
            <td><a href="?f=Home&m=Detail&id=<?php echo $r['idorder']?>">Detail</a></td>
        </tr>
        <?php endforeach?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=Home&m=Histori&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>