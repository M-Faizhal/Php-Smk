<?php 

    if (isset ($_GET ['Total'])) {
        $Total = $_GET ['Total'];
        $Idorder = idorder();
        $Idpelanggan = $_SESSION ['idpelanggan'];
        $Tgl = date('Y-m-d');

        $SQL = "SELECT * FROM tblorder WHERE idorder = $Idorder";
        
        $Count = $Db -> rowCount ($SQL);

        if ($Count == 0) {
            insertOrder ($Idorder, $Idpelanggan, $Tgl, $Total);
            insertOrderDetail ($Idorder);
        }
        else {
            insertOrderDetail ($Idorder);
        }

        kosongkanSession ();
        header("location:?f=Home&m=Checkout");
    }
    else {
        Info ();
    }

    function idorder () {
        global $Db;
        $SQL = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $Jumlah = $Db -> rowCount ($SQL);
        if ($Jumlah == 0) {
            $Id = 1;
        }
        else {
            $Item = $Db -> getItem ($SQL);
            $Id= $Item ['idorder'] + 1;
        }
        return $Id;
    }

    function insertOrder ($Idorder, $Idpelanggan, $Tgl, $Total) {
        global $Db;

        $SQL = "INSERT INTO tblorder VALUES ($Idorder, $Idpelanggan, '$Tgl', $Total, 0, 0, 0)";

        $Db -> runSQL($SQL);
    }

    function insertOrderDetail ($Idorder) {
        global $Db;
        foreach ($_SESSION as $key => $value) {
            if ($key <> 'Pelanggan' && $key <> 'idpelanggan'  && $key <> 'user'  && $key <> 'level' && $key <> 'iduser') {
                $Id = substr ($key , 1);

                $SQL = "SELECT * FROM tblmenu WHERE idmenu = $Id";

                $Row = $Db -> getAll ($SQL);

                foreach ($Row as $R) {
                    $Idmenu = $R ['idmenu'];
                    $Harga = $R ['harga'];
                    $SQL = "INSERT INTO tblorderdetail VALUES ('', $Idorder, $Idmenu, $value, $Harga)";
                    $Db -> runSQL($SQL);
                }
            }
        }
    }

    function kosongkanSession () {
        foreach ($_SESSION as $key => $value) {
            if ($key <> 'Pelanggan' && $key <> 'idpelanggan') {
                $Id = substr ($key , 1);

                unset ($_SESSION ['_' . $Id]);
            }
        }
    }

    function Info (){
        echo "<h3>Terima Kasih Sudah Berbelanja</h3>";
    }

?>