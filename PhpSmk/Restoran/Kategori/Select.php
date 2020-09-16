<div style="margin : auto; width : 900px;">

<h3><a href="http://localhost/PhpSmk/Restoran/Kategori/Insert.php">Tambah Data</a></h3>

<?php 

    require_once "../Function.php";

    if (isset ($_GET ['update'])) {
        $Id = $_GET ['update'];
        require_once "Update.php";
    }

    if (isset ($_GET ['hapus'])) {
        $Id = $_GET ['hapus'];
        require_once "Delete.php";
    }

    echo '<br>';

    $SQL = "SELECT idkategori FROM tblkategori";

    $Result = mysqli_query($Koneksi, $SQL);

    $JumlahData = mysqli_num_rows ($Result);

    $Banyak = 3;

    $Halaman = ceil ($JumlahData / $Banyak);

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

    echo '<br> <br>';

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
        //   0 = (1 * 3) - 3
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM tblkategori LIMIT $Mulai, $Banyak";

    $Result = mysqli_query($Koneksi, $SQL);

    // var_dump($Result);

    $Jumlah = mysqli_num_rows($Result);
    // echo '<br>';
    // echo $Jumlah;

    echo '
            <table border="1px">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Hapus</th>
                <th>Update</th>
            </tr>
        ';

        $No = $Mulai + 1;

    if ($Jumlah > 0) {
        while ($Row = mysqli_fetch_assoc ( $Result )) {
            echo '<tr>';
            echo '<td>' . $No++ . '</td>';
            echo '<td>' . $Row ['kategori'] . '</td>';
            echo '<td><a href="?hapus=' . $Row ['idkategori'] . '">' . 'Hapus' . '</a></td>';
            echo '<td><a href="?update=' . $Row ['idkategori'] . '">' . 'Update' . '</a></td>';
            echo '</tr>';
        }
    }

    echo '</table>';

?>

</div>