<h3>Menu</h3>

<div class="mt-4 mb-4">
    <?php 

        if (isset ($_GET ['id'])) {
            $Id = $_GET ['id'];

            $Where = "WHERE idkategori = $Id";

            $Id = "&id=" . $Id;
        }
        else {
            $Where = "";
            $Id = "";
        }
    
    ?>
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

<?php if (!empty ($Row)) { ?>
    <?php foreach ($Row as $r) : ?>
        <div class="card" style="width: 15rem; float: left; margin: 10px;">
            <img src="Upload/<?php echo $r['gambar']?>" class="card-img-top" style="height: 150px;" alt="">
            <div class="card-body">
                <h5 class="card-title"><?php echo $r['menu'] ?></h5>
                <p class="card-text"><?php echo $r['harga'] ?></p>
                <a class="btn btn-primary" href="?f=Home&m=Beli&id=<?php echo $r ['idmenu'] ?>" role="button">Beli</a>
            </div>
        </div>
    <?php endforeach?>
<?php } ?>

<div style="clear: both;">

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=Home&m=Produk&p=' . $i . $Id . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>

</div>