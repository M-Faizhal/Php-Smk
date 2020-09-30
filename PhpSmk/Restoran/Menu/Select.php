<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=menu&m=Insert" role="button">TAMBAH DATA</a>
</div>
<h3>Menu</h3>

<?php 

    if (isset ($_POST ['Opsi'])) {
        $Opsi = $_POST ['Opsi'];

        $Where = "WHERE idkategori = $Opsi";
    }
    else {
        $Opsi = 0;
        $Where = "";
    }

?>

<div class="mt-4 mb-4">
    <?php 

        $Row =$Db -> getAll ("SELECT * FROM tblkategori ORDER BY kategori ASC");
    
    ?>
    <form action="" method="post">
        <select name="Opsi" id="" onchange="this.form.submit ()">
            <?php foreach ($Row as $r) : ?>
            <option <?php if ($r ['idkategori'] == $Opsi) echo "Selected"; ?> value="<?php echo $r ['idkategori'] ?>">
                <?php echo $r ['kategori'] ?>
            </option>
            <?php endforeach ?>
        </select>
    </form>
</div>

<?php

    $JumlahData = $Db -> rowCount ("SELECT idmenu FROM tblmenu $Where");
    $Banyak = 3;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
        //   0 = (1 * 3) - 3
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM tblmenu $Where ORDER BY menu ASC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>

<table class="table table-bordered w-80">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty ($Row)) { ?>
            <?php foreach ($Row as $r) : ?>
            <tr>
                <td><?php echo $No++?></td>
                <td><?php echo $r['menu']?></td>
                <td><?php echo $r['harga']?></td>
                <td><img style="width : 100px;" src="../Upload/<?php echo $r['gambar']?>" alt=""></td>
                <td><a href="?f=menu&m=Delete&id=<?php echo $r['idmenu']?>">Delete</a></td>
                <td><a href="?f=menu&m=Update&id=<?php echo $r['idmenu']?>">Update</a></td>
            </tr>
            <?php endforeach?>
        <?php } ?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=menu&m=Select&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>