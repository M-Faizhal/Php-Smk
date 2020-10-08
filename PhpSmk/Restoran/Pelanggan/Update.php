<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $Row = $Db -> getItem ("SELECT * FROM tblpelanggan WHERE idpelanggan = $Id");

        if ($Row ['aktif'] == 0) {
            $Aktif = 1;
        }
        else {
            $Aktif = 0;
        }

        $SQL = "UPDATE tblpelanggan SET aktif = $Aktif WHERE idpelanggan = $Id";
        $Db -> runSQL ($SQL);

        header ("location:?f=Pelanggan&m=Select");
    }

?>