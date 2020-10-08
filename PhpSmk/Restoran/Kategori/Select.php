<?php

    $JumlahData = $Db -> rowCount ("SELECT idkategori FROM tblkategori");
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

    $SQL = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>
<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=Kategori&m=Insert" role="button">TAMBAH DATA</a>
</div>
<h3>Kategori</h3>
<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty ($Row)) { ?>
        <?php foreach ($Row as $r) : ?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['kategori']?></td>
            <td><a href="?f=Kategori&m=Delete&id=<?php echo $r['idkategori']?>">Delete</a></td>
            <td><a href="?f=Kategori&m=Update&id=<?php echo $r['idkategori']?>">Update</a></td>
        </tr>
        <?php endforeach?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=Kategori&m=Select&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>