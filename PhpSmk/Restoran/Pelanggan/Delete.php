<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "DELETE FROM tblpelanggan WHERE idpelanggan=$Id";

        $Db -> runSQL ($SQL);

        header ("location:?f=Pelanggan&m=Select");
    }

?>