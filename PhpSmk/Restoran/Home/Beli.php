<h1>Keranjang Belanja</h1>

<?php 

    if (isset ($_GET ['Hapus'])) {
        $Id = $_GET ['Hapus'];
        unset ($_SESSION ['_' . $Id]);
    }

    if (isset ($_GET ['Tambah'])) {
        $Id = $_GET ['Tambah'];
        $_SESSION ['_' . $Id] ++;
    }

    if (isset ($_GET ['Kurang'])) {
        $Id = $_GET ['Kurang'];
        $_SESSION ['_' . $Id] --;

        if ($_SESSION ['_' . $Id] == 0) {
            unset ($_SESSION ['_'  . $Id]);
        }
    }

    if (!isset ($_SESSION ['Pelanggan'])) {
        header ('location:?f=Home&m=Login');
    }
    else {
        if (isset ($_GET ['id'])) {
            $Id = $_GET ['id'];
            Isi ($Id);
            header ("location:?f=Home&m=Beli");
        }
        else {
            Keranjang ();
        }
    }

    function Isi ($Id) {
        if (isset ($_SESSION ['_' . $Id])) {
            $_SESSION ['_' . $Id] ++;
        }
        else {
            $_SESSION ['_' . $Id] = 1;
        }
    }
    

    function Keranjang () {

        global $Db;

        $Total = 0;

        echo '
        
        <table class="table table-bordered w-70">
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>        
        ';

        foreach ($_SESSION as $key => $value) {
            if ($key <> 'Pelanggan' && $key <> 'idpelanggan') {
                $Id = substr ($key , 1);

                $SQL = "SELECT * FROM tblmenu WHERE idmenu = $Id";

                $Row = $Db -> getAll ($SQL);

                foreach ($Row as $R) {
                    echo '<tr>';
                    echo '<td>' . $R ['menu'] . '</td>';
                    echo '<td>' . $R ['harga'] . '</td>';
                    echo '<td><a href="?f=Home&m=Beli&Tambah='. $R ['idmenu'] .'"> [+] &nbsp &nbsp </a>' . $value . '<a href="?f=Home&m=Beli&Kurang='. $R ['idmenu'] .'">&nbsp &nbsp [-] </a></td>';
                    echo '<td>' . $R ['harga'] * $value . '</td>';
                    echo '<td><a href="?f=Home&m=Beli&Hapus=' . $R ['idmenu'] . '">Hapus</a></td>';
                    echo '</tr>';
                    $Total = $Total + ($value * $R ['harga']);
                }
            }
        }

        echo '<tr>
                <td colspan=4><h3>GRAND TOTAL : </h3></td>
                <td><h3>'. $Total .'</h3></td>
            </tr>';

        echo '</table>';
    }

?>