<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $Row = $Db -> getItem ("SELECT * FROM tbluser WHERE iduser = $Id");

        if ($Row ['aktif'] == 0) {
            $Aktif = 1;
        }
        else {
            $Aktif = 0;
        }

        $SQL = "UPDATE tbluser SET aktif = $Aktif WHERE iduser = $Id";
        $Db -> runSQL ($SQL);

        header ("location:?f=User&m=Select");
    }

?>