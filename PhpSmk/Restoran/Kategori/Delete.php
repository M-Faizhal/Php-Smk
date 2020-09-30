<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "DELETE FROM tblkategori WHERE idkategori=$Id";

        $Db -> runSQL ($SQL);

        header ("location:?f=Kategori&m=Select");
    }

?>