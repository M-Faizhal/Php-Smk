<?php

    $JumlahData = $Db -> rowCount ("SELECT idpelanggan FROM tblpelanggan");
    $Banyak = 4;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
        //   0 = (1 * 3) - 3
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM tblpelanggan ORDER BY pelanggan ASC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>

<h3>Pelanggan</h3>
<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Row as $r) : ?>
        <tr>
            <?php 
            
                if ($r ['aktif'] == 1) {
                    $Status = 'Aktif';
                }else {
                    $Status = 'Tidak Aktif';
                }
            
            ?>
            <td><?php echo $No++?></td>
            <td><?php echo $r['pelanggan']?></td>
            <td><?php echo $r['alamat']?></td>
            <td><?php echo $r['telp']?></td>
            <td><?php echo $r['email']?></td>
            <td><a href="?f=Pelanggan&m=Delete&id=<?php echo $r['idpelanggan']?>">Delete</a></td>
            <td><a href="?f=Pelanggan&m=Update&id=<?php echo $r['idpelanggan']?>"><?php echo $Status ?></a></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=Pelanggan&m=Select&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>